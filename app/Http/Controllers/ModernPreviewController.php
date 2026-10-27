<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EnsureModernPreviewAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ModernPreviewController extends Controller
{
    public function show(Request $request)
    {
        if (! config('modern-preview.enabled')) {
            return redirect()->route('home.show');
        }

        if ((int) $request->session()->get(EnsureModernPreviewAccess::SESSION_KEY, 0) > now()->timestamp) {
            return redirect()->intended(route('home.show'));
        }

        return view('pages.modern-preview-login');
    }

    public function authenticate(Request $request)
    {
        abort_unless(config('modern-preview.enabled'), 404);

        $request->validate([
            'password' => ['required', 'string', 'max:255'],
        ]);

        $passwordHash = (string) config('modern-preview.password_hash');

        if ($passwordHash === '' || ! Hash::check((string) $request->input('password'), $passwordHash)) {
            return back()
                ->withErrors(['password' => 'The preview password is incorrect.'])
                ->withInput();
        }

        $request->session()->regenerate();
        $request->session()->put(
            EnsureModernPreviewAccess::SESSION_KEY,
            now()->addMinutes(config('modern-preview.duration'))->timestamp
        );

        return redirect()->intended(route('home.show'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget(EnsureModernPreviewAccess::SESSION_KEY);
        $request->session()->regenerateToken();

        return redirect()->route('modern-preview.login');
    }
}
