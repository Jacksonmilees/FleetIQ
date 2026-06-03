@extends ('layouts.out')

@section ('body')

<style>
    :root{ --almak-navy: #08306b; --almak-navy-2: #06264f; }

    .login-shell {
        min-height: 100vh;
        background:
            radial-gradient(circle at 50% 18%, rgba(255,255,255,0.18), transparent 24%),
            radial-gradient(circle at 20% 20%, rgba(120, 180, 255, 0.06), transparent 20%),
            linear-gradient(180deg, #eef2f7 0%, #f6f9fb 100%);
        position: relative;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 36px 18px 48px;
        font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    /* subtle background only; decorative header circles removed for a cleaner look */
    .login-shell::before,
    .login-shell::after { display: none }

    .login-hero {
        width: 100%;
        max-width: 900px;
        display: grid;
        grid-template-columns: 1fr;
        gap: 22px;
        align-items: center;
        margin: 8px auto 0;
        padding: 12px 18px;
        min-height: 56vh;
        justify-items: center;
        text-align: center;
    }

    /* brand moved into the card header */

    .login-logo {
        width: 84px;
        height: 84px;
        margin: 0 0 6px;
        display: grid;
        place-items: center;
        border-radius: 16px;
        background: #ffffff;
        border: 1px solid rgba(2,6,23,0.06);
        box-shadow: 0 18px 40px rgba(2,6,23,0.12);
        transform: translateY(-14px);
    }

    .login-logo img { width: 48px; height: 48px; display:block }

    .card-header { display:flex; flex-direction:column; align-items:center; gap:6px; margin-bottom:6px }
    .brand-name { margin:0; font-size:16px; font-weight:800; letter-spacing:0.12em; color:var(--almak-navy); text-transform:uppercase }

    .login-card {
        position: relative;
        z-index: 1;
        width: 100%;
        max-width: 520px;
        background: rgba(255,255,255,0.97);
        border: 1px solid rgba(15, 23, 42, 0.06);
        border-radius: 18px;
        padding: 36px 22px 26px;
        box-shadow: 0 18px 42px rgba(15, 23, 42, 0.16), 0 2px 8px rgba(15, 23, 42, 0.06);
        backdrop-filter: blur(14px);
    }

    /* footer removed per user preference */

    @media (max-width: 880px) {
        .login-hero {
            grid-template-columns: 1fr;
            gap: 18px;
            padding: 18px;
            margin-top: 8px;
            justify-items: center;
        }

        .login-brand { text-align: center; padding-left: 0 }

        .login-card { margin: 0 auto; width: 92%; max-width: 420px }
    }

    @media (max-width: 480px) {
        .login-logo { width: 64px; height: 64px; transform: translateY(-10px) }
        .login-logo img { width: 36px; height: 36px }
        .login-brand h1 { font-size: 16px; letter-spacing: 0.10em }
        .login-brand p { font-size: 14px; max-width: 320px }
        .login-card { padding: 28px 14px; border-radius: 12px; width: 92% }
        .login-field { padding: 12px 0 10px }
        .login-button { padding: 12px 14px; font-size: 13px }
        .login-shell::before, .login-shell::after { display: none }
    }

    .login-field {
        width: 100%;
        border: 0;
        border-bottom: 1px solid #d7deea;
        background: transparent;
        padding: 15px 0 12px;
        font-size: 15px;
        color: #0f172a;
        outline: none;
        transition: border-color .18s ease, box-shadow .18s ease;
    }

    .login-field::placeholder {
        color: #9aa7bb;
    }

    .login-field:focus {
        border-bottom-color: var(--almak-navy);
        box-shadow: 0 1px 0 var(--almak-navy);
    }

    .login-button {
        width: 100%;
        margin-top: 6px;
        border: 0;
        border-radius: 12px;
        background: linear-gradient(180deg, var(--almak-navy) 0%, var(--almak-navy-2) 100%);
        color: #fff;
        padding: 14px 18px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        box-shadow: 0 12px 22px rgba(3, 26, 75, 0.28);
        cursor: pointer;
        transition: transform .15s ease, box-shadow .15s ease, filter .15s ease;
    }

    .login-button:hover {
        transform: translateY(-1px);
        box-shadow: 0 15px 26px rgba(11, 90, 217, 0.34);
        filter: brightness(1.02);
    }

    .login-foot strong {
        display: block;
        color: #1f2a37;
        font-size: 12px;
        letter-spacing: 0.08em;
        margin-bottom: 8px;
    }

    .login-error {
        margin-bottom: 18px;
    }
</style>

    <div class="login-hero">
        <div class="login-card">
        <div class="card-header">
            <div class="login-logo" aria-hidden="true">
                <img src="{{ asset('build/images/logo.svg') }}" alt="ALMAK logo" />
            </div>
            <h1 class="brand-name">ALMAK</h1>
        </div>
        <form method="post">
            
            @if(session('error') || (isset($errors) && $errors->any()))
                <div class="login-error">
                    <x-message type="error" />
                </div>
            @endif

            <input type="hidden" name="_action" value="authCredentials">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div>
                <label for="email" style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden;">Email</label>
                <input id="email" class="login-field" type="email" name="email" placeholder="Email" autofocus required>
            </div>

            <div>
                <label for="password" style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden;">Password</label>
                <input id="password" class="login-field" type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="login-button">Login</button>
        </form>
        </div>
    </div>
</div>

@stop
