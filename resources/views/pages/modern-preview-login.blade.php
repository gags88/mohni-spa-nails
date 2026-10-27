<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <title>Private Preview | {{ app_name() }}</title>
    <style>
        :root { color-scheme: light; --ink: #292a25; --sage: #59645c; --ivory: #f5efe6; --paper: #fffdf9; --stone: #d9cec0; }
        * { box-sizing: border-box; }
        body { min-height: 100vh; margin: 0; display: grid; place-items: center; padding: 28px; color: var(--ink); background: radial-gradient(circle at top right, #ded5c8, transparent 42%), var(--ivory); font-family: Arial, sans-serif; }
        main { width: min(100%, 470px); padding: 52px 48px; background: rgba(255, 253, 249, .94); border: 1px solid var(--stone); box-shadow: 0 24px 70px rgba(60, 51, 43, .12); }
        .eyebrow { margin: 0 0 18px; color: #8b7455; font-size: 11px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; }
        h1 { margin: 0 0 16px; font: 400 46px/1.04 Georgia, serif; }
        .intro { margin: 0 0 32px; color: #65625d; line-height: 1.7; }
        label { display: block; margin-bottom: 9px; font-size: 12px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; }
        input { width: 100%; height: 52px; padding: 0 15px; color: var(--ink); background: #fff; border: 1px solid var(--stone); font-size: 16px; }
        input:focus { outline: 2px solid rgba(89, 100, 92, .25); border-color: var(--sage); }
        button { width: 100%; height: 52px; margin-top: 18px; color: #fff; background: var(--sage); border: 0; cursor: pointer; font-size: 12px; font-weight: 700; letter-spacing: .13em; text-transform: uppercase; }
        button:hover, button:focus { background: #465048; }
        .error { margin: 10px 0 0; color: #8a3e35; font-size: 13px; }
        .note { margin: 24px 0 0; color: #817b73; font-size: 12px; line-height: 1.6; }
        @media (max-width: 520px) { main { padding: 40px 28px; } h1 { font-size: 39px; } }
    </style>
</head>
<body>
    <main>
        <p class="eyebrow">Mohni Spa &amp; Nails</p>
        <h1>Private website preview.</h1>
        <p class="intro">Enter the preview password to review the new Mohni experience.</p>

        <form method="POST" action="{{ route('modern-preview.authenticate') }}">
            @csrf
            <label for="password">Preview password</label>
            <input id="password" name="password" type="password" required autofocus autocomplete="current-password" aria-describedby="password-help">
            @error('password')
                <p class="error" role="alert">{{ $message }}</p>
            @enderror
            <button type="submit">Enter preview</button>
        </form>

        <p id="password-help" class="note">Access remains active in this browser for two hours.</p>
    </main>
</body>
</html>
