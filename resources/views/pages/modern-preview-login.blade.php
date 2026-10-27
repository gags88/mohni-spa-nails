<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <title>Private Preview | Mohni Nail and Spa</title>
    <link rel="stylesheet" href="/css/modern-preview.css?v=1.0">
</head>
<body>
    <main class="preview-shell">
        <section class="preview-card" aria-labelledby="preview-title">
            <div class="monogram" aria-hidden="true">M</div>
            <p class="eyebrow">Private preview</p>
            <p class="brand">Mohni Nail and Spa</p>
            <div class="ornament" aria-hidden="true"><span></span></div>

            <h1 id="preview-title">A private first look.</h1>
            <p class="intro">Enter the password to view the private Mohni Nail and Spa website preview.</p>

            <form method="POST" action="{{ route('modern-preview.authenticate') }}">
                @csrf
                <label for="password">Preview password</label>
                <input id="password" name="password" type="password" required autofocus autocomplete="current-password" aria-describedby="password-help">
                @error('password')
                    <p class="error" role="alert">{{ $message }}</p>
                @enderror
                <button type="submit">Enter preview <span aria-hidden="true">&rarr;</span></button>
            </form>

            <p id="password-help" class="note">Access remains active in this browser for two hours.</p>
        </section>
    </main>
</body>
</html>
