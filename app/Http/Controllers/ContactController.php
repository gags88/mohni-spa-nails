<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30', 'regex:/^[0-9+()\-.\s]+$/'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ], [
            'phone.regex' => 'Please enter a valid phone number.',
        ]);

        $validated['phone'] = $validated['phone'] ?? null;

        try {
            Mail::to(config('mail.contact_to'))->send(new ContactMessage($validated));
        } catch (\Throwable $exception) {
            report($exception);

            return back()
                ->withInput()
                ->with('contact_error', 'We could not send your message right now. Please try again or call us at +1 204 219 4071.');
        }

        return redirect()
            ->route('contact.show')
            ->with('contact_success', 'Thank you! Your message has been sent. We will get back to you soon.');
    }
}
