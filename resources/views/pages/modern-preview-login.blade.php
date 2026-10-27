<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <title>Private Preview | Mohni Nail and Spa</title>
    <style>
        :root { color-scheme: light; --ink: #292a25; --sage: #59645c; --ivory: #f5efe6; --paper: #fffdf9; --stone: #d9cec0; --champagne: #9a815f; }
        * { box-sizing: border-box; }
        body { min-height: 100vh; margin: 0; display: grid; place-items: center; padding: 38px; color: var(--ink); background: #e7dfd3; font-family: Arial, sans-serif; }
        main { width: min(100%, 1120px); min-height: 680px; display: grid; grid-template-columns: 1.08fr .92fr; overflow: hidden; background: var(--paper); border: 1px solid rgba(85, 76, 67, .14); box-shadow: 0 28px 80px rgba(60, 51, 43, .14); }
        .visual { position: relative; min-height: 680px; overflow: hidden; background: #d8ccbc; }
        .visual img { width: 100%; height: 100%; object-fit: cover; object-position: 58% center; }
        .visual::after { position: absolute; inset: 0; content: ""; background: linear-gradient(180deg, rgba(25, 27, 23, .02) 45%, rgba(25, 27, 23, .7) 100%); }
        .brand { position: absolute; z-index: 1; left: 46px; right: 46px; bottom: 42px; color: #fff; }
        .brand span { display: block; margin-bottom: 12px; font-size: 10px; font-weight: 700; letter-spacing: .22em; text-transform: uppercase; }
        .brand strong { display: block; max-width: 470px; font: 400 38px/1.14 Georgia, serif; }
        .panel { display: flex; align-items: center; padding: 70px 64px; }
        .panel-inner { width: 100%; max-width: 390px; margin: auto; }
        .eyebrow { margin: 0 0 20px; color: var(--champagne); font-size: 10px; font-weight: 700; letter-spacing: .22em; text-transform: uppercase; }
        h1 { margin: 0 0 19px; font: 400 49px/1.04 Georgia, serif; letter-spacing: -.025em; }
        .intro { margin: 0 0 34px; color: #65625d; font-size: 15px; line-height: 1.75; }
        label { display: block; margin-bottom: 9px; font-size: 12px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; }
        input { width: 100%; height: 54px; padding: 0 16px; color: var(--ink); background: #fff; border: 1px solid var(--stone); border-radius: 0; font-size: 16px; }
        input:focus { outline: 2px solid rgba(89, 100, 92, .25); border-color: var(--sage); }
        button { width: 100%; height: 54px; margin-top: 18px; color: #fff; background: var(--sage); border: 0; cursor: pointer; font-size: 11px; font-weight: 700; letter-spacing: .15em; text-transform: uppercase; }
        button:hover, button:focus { background: #465048; }
        .error { margin: 10px 0 0; color: #8a3e35; font-size: 13px; }
        .note { margin: 25px 0 0; color: #817b73; font-size: 12px; line-height: 1.6; }
        @media (max-width: 850px) {
            body { padding: 20px; }
            main { grid-template-columns: 1fr; }
            .visual { min-height: 330px; }
            .brand { left: 28px; right: 28px; bottom: 27px; }
            .brand strong { font-size: 31px; }
            .panel { padding: 50px 36px; }
        }
        @media (max-width: 520px) {
            body { padding: 0; }
            main { min-height: 100vh; border: 0; }
            .visual { min-height: 260px; }
            .panel { padding: 42px 26px 50px; }
            h1 { font-size: 40px; }
        }
    </style>
</head>
<body>
    <main>
        <section class="visual" aria-label="Mohni Nail and Spa laser treatment">
            <img src="/images/hero/laser-luxury-hero.webp" alt="Laser hair removal treatment at Mohni Nail and Spa">
            <div class="brand">
                <span>Laser, skin &amp; beauty</span>
                <strong>Thoughtful care in a calm, elegant setting.</strong>
            </div>
        </section>
        <section class="panel">
            <div class="panel-inner">
                <p class="eyebrow">Mohni Nail and Spa</p>
                <h1>Private website preview.</h1>
                <p class="intro">Enter the preview password to review the new Mohni Nail and Spa website.</p>

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
            </div>
        </section>
    </main>
</body>
</html>
