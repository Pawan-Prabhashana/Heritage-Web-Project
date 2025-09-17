<?php
session_start();
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
<!doctype html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Heritage • Login & Register</title>
    <link rel="preconnect" href="https:
    <link href="https:
    <style>
        
        :root {
            --bg: 
            --panel: 
            --text: 
            --muted: 
            
            --gold: 
            --gold-2: 
            --gold-3: 
            --stroke: rgba(255, 215, 0, .20);
            --outline: 1px solid var(--stroke);
            --brand-gradient: linear-gradient(135deg, var(--gold), var(--gold-2));
            --shadow: 0 20px 40px rgba(0, 0, 0, .5), inset 0 1px 0 rgba(255, 255, 255, .04);
            --radius: 22px;
        }

        
        * {
            box-sizing: border-box
        }

        html,
        body {
            height: 100%
        }

        body {
            margin: 0;
            background:
                radial-gradient(1100px 600px at 15% -10%, rgba(198, 163, 79, .12), transparent 60%),
                radial-gradient(900px 520px at 110% 0%, rgba(179, 139, 47, .10), transparent 60%),
                var(--bg);
            color: var(--text);
            font: 16px/1.6 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        }

        
        .nav {
            position: fixed;
            inset: 18px 18px auto 18px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 14px;
            border-radius: 16px;
            background: rgba(255, 215, 0, .06);
            backdrop-filter: blur(16px);
            border: var(--outline);
            box-shadow: var(--shadow);
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 800;
        }

        .brand-logo {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: var(--brand-gradient)
        }

        .brand strong {
            font-size: 20px
        }

        .nav a {
            color: 
            text-decoration: none;
            margin: 0 10px;
            font-weight: 700
        }

        .nav a.active {
            color: var(--text)
        }

        
        .wrapper {
            min-height: 100dvh;
            padding: 110px 22px 22px;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 26px;
            align-items: stretch;
        }

        @media (max-width:1100px) {
            .wrapper {
                grid-template-columns: 1fr
            }
        }

        
        .showcase {
            position: relative;
            border-radius: 28px;
            overflow: hidden;
            border: var(--outline);
            box-shadow: var(--shadow);
            background: 
            isolation: isolate;
        }

        .showcase::after {
            
            content: "";
            position: absolute;
            inset: 0;
            background: url('assets/gold-art-bg.jpg') center/contain no-repeat;
            opacity: .18;
            pointer-events: none;
            filter: contrast(110%) saturate(105%);
        }

        .copy {
            position: relative;
            padding: 40px;
            max-width: 560px;
            z-index: 1
        }

        .kicker {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(255, 255, 255, .12);
            font-weight: 700;
            color: 
        }

        .headline {
            font-size: clamp(30px, 4.6vw, 58px);
            font-weight: 900;
            margin: 14px 0 10px
        }

        .sub {
            color: 
        }

        

        
        .card {
            position: relative;
            border-radius: 28px;
            background: var(--panel);
            border: var(--outline);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .tabs {
            display: flex;
            padding: 20px;
            border-bottom: var(--outline)
        }

        .tab {
            flex: 1;
            text-align: center;
            font-weight: 800
        }

        .tab button {
            all: unset;
            cursor: pointer;
            padding: 12px 16px 18px;
            display: inline-block
        }

        .tab[aria-selected="true"] {
            color: var(--text)
        }

        .tab[aria-selected="false"] {
            color: 
        }

        .tab-indicator {
            position: absolute;
            bottom: -2px;
            height: 3px;
            background: var(--brand-gradient);
            border-radius: 6px;
            transition: .3s;
            left: 0;
            width: 50%
        }

        .card-body {
            padding: 22px;
            display: grid;
            gap: 18px
        }

        
        form {
            display: grid;
            gap: 16px
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px
        }

        @media (max-width:720px) {
            .row {
                grid-template-columns: 1fr
            }
        }

        .field {
            position: relative
        }

        
        .field input,
        .field select {
            width: 100%;
            font-size: 16px;
            padding: 18px 16px;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, .14);
            background: rgba(0, 0, 0, .60);
            color: var(--text);
            outline: none;
        }

        .field input::placeholder {
            color: var(--muted)
        }

        
        
        .field label {
            display: none
        }

        .field input:focus,
        .field select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 4px rgba(198, 163, 79, .20);
            background: rgba(0, 0, 0, .70);
        }

        
        .field select {
            appearance: none;
            background-image:
                linear-gradient(45deg, transparent 50%, 
                linear-gradient(135deg, 
            background-position: calc(100% - 20px) calc(50% - 3px), calc(100% - 14px) calc(50% - 3px);
            background-size: 6px 6px, 6px 6px;
            background-repeat: no-repeat;
        }

        .actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px
        }

        .check {
            display: flex;
            align-items: center;
            gap: 8px
        }

        .check input {
            accent-color: var(--gold)
        }

        .muted {
            color: 
        }

        .btn {
            border: none;
            border-radius: 14px;
            padding: 14px 18px;
            font-weight: 800;
            cursor: pointer;
            display: inline-flex;
            justify-content: center;
        }

        .btn-primary {
            background: var(--brand-gradient);
            color: 
            font-size: 16px
        }

        .btn-secondary {
            background: rgba(255, 255, 255, .08);
            color: var(--text)
        }

        .btn-ghost {
            background: transparent;
            color: 
        }

        
        .meter {
            height: 10px;
            background: rgba(255, 255, 255, .08);
            border-radius: 8px;
            overflow: hidden
        }

        .meter>i {
            display: block;
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, 
            transition: width .3s
        }

        .footer {
            display: flex;
            justify-content: center;
            gap: 10px;
            color: 
            padding: 22px
        }

        .hide {
            display: none
        }
    </style>
</head>

<body>
    
    <header class="nav">
        <div class="brand">
            <i class="brand-logo"></i>
            <strong>Heritage</strong>
        </div>
        <nav>
            <a href="
            <a href="
            <a href="
            <a href="
        </nav>
    </header>

    <main class="wrapper" data-view="login">
        
        <section class="showcase">
            <div class="copy">
                <span class="kicker">Crafted in Sri Lanka</span>
                <h1 class="headline">Where tradition meets modern commerce.</h1>
                <p class="sub">Sell unique handlooms & masks, host workshops, and reach buyers worldwide. Heritage is your digital storefront and booking desk in one.</p>
            </div>
        </section>

        
        <section class="card" aria-label="Authentication">
            <div class="tabs" role="tablist">
                <div class="tab" role="tab" aria-selected="true" aria-controls="loginPanel" id="tabLogin"><button>Log in</button></div>
                <div class="tab" role="tab" aria-selected="false" aria-controls="registerPanel" id="tabRegister"><button>Sign up</button></div>
                <i class="tab-indicator" aria-hidden="true"></i>
            </div>

            <div class="card-body">
                
                <form id="loginPanel" role="tabpanel" aria-labelledby="tabLogin">
                    <div class="field">
                        <input id="login-username" name="username" type="text" placeholder="Username or email" autocomplete="username" required>
                        
                    </div>
                    <div class="field">
                        <input id="login-password" name="password" type="password" placeholder="Password" autocomplete="current-password" required>
                    </div>
                    <div class="actions">
                        <label class="check"><input type="checkbox" name="remember" value="1"> Remember me</label>
                        <button class="btn btn-ghost" type="button">Forgot password?</button>
                    </div>
                    <button class="btn btn-primary" type="submit">Log in</button>

                    <p class="muted" style="margin:8px 0 0">New to Heritage? <a id="toRegister" href="
                </form>

                
                <form id="registerPanel" class="hide" role="tabpanel" aria-labelledby="tabRegister">
                    <div class="row">
                        <div class="field">
                            <input id="reg-name" name="name" type="text" placeholder="Full name" autocomplete="name" required>
                        </div>
                        <div class="field">
                            <select id="reg-type" name="type" required aria-label="Account type">
                                <option value="" disabled selected>Account type</option>
                                <option value="customer">Customer</option>
                                <option value="artisan">Artisan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="field">
                            <input id="reg-email" name="email" type="email" placeholder="Email" autocomplete="email" required>
                        </div>
                        <div class="field">
                            <input id="reg-phone" name="phone" type="tel" placeholder="Phone" autocomplete="tel" pattern="[0-9 +()-]{7,}" required>
                        </div>
                    </div>

                    
                    <div class="row artisan-only hide">
                        <div class="field">
                            <select id="reg-district" name="district" aria-label="District">
                                <option value="" selected disabled>District (for artisans)</option>
                                <option>Ampara</option>
                                <option>Anuradhapura</option>
                                <option>Badulla</option>
                                <option>Batticaloa</option>
                                <option>Colombo</option>
                                <option>Galle</option>
                                <option>Gampaha</option>
                                <option>Hambantota</option>
                                <option>Jaffna</option>
                                <option>Kalutara</option>
                                <option>Kandy</option>
                                <option>Kegalle</option>
                                <option>Kilinochchi</option>
                                <option>Kurunegala</option>
                                <option>Mannar</option>
                                <option>Matale</option>
                                <option>Matara</option>
                                <option>Monaragala</option>
                                <option>Mullaitivu</option>
                                <option>Nuwara Eliya</option>
                                <option>Polonnaruwa</option>
                                <option>Puttalam</option>
                                <option>Ratnapura</option>
                                <option>Trincomalee</option>
                                <option>Vavuniya</option>
                            </select>
                        </div>
                        <div class="field">
                            <select id="reg-category" name="category" aria-label="Craft category">
                                <option value="" selected disabled>Craft category</option>
                                <option>Handloom</option>
                                <option>Wooden Masks</option>
                                <option>Brass & Metal</option>
                                <option>Pottery</option>
                                <option>Lace & Beeralu</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="field">
                            <input id="reg-password" name="password" type="password" placeholder="Create a password" autocomplete="new-password" minlength="8" required>
                        </div>
                        <div class="field">
                            <input id="reg-password-2" name="password2" type="password" placeholder="Confirm password" autocomplete="new-password" required>
                        </div>
                    </div>

                    <div class="meter" aria-hidden="true"><i></i></div>
                    <div class="actions">
                        <label class="check"><input type="checkbox" id="terms" required> I agree to the <a href="
                        <span class="muted">Already have an account? <a id="toLogin" href="
                    </div>

                    <button class="btn btn-primary" type="submit">Create account</button>
                </form>
            </div>

            <footer class="footer">© <span id="year"></span> Heritage • Built in Sri Lanka 🇱🇰</footer>
        </section>
    </main>

    <script>
        
        const view = document.querySelector('main.wrapper');
        const tabLogin = document.getElementById('tabLogin');
        const tabRegister = document.getElementById('tabRegister');
        const loginPanel = document.getElementById('loginPanel');
        const registerPanel = document.getElementById('registerPanel');
        const indicator = document.querySelector('.tab-indicator');

        function setTab(which) {
            const loginActive = which === 'login';
            tabLogin.setAttribute('aria-selected', loginActive);
            tabRegister.setAttribute('aria-selected', !loginActive);
            loginPanel.classList.toggle('hide', !loginActive);
            registerPanel.classList.toggle('hide', loginActive);
            view.dataset.view = which;

            
            const el = loginActive ? tabLogin : tabRegister;
            const rect = el.getBoundingClientRect();
            const tabsRect = el.parentElement.getBoundingClientRect();
            indicator.style.left = (rect.left - tabsRect.left) + 'px';
            indicator.style.width = rect.width + 'px';
            history.replaceState(null, '', '
        }
        window.addEventListener('resize', () => setTab(view.dataset.view || 'login'));
        tabLogin.addEventListener('click', () => setTab('login'));
        tabRegister.addEventListener('click', () => setTab('register'));
        document.getElementById('toRegister').addEventListener('click', e => {
            e.preventDefault();
            setTab('register');
        });
        document.getElementById('toLogin').addEventListener('click', e => {
            e.preventDefault();
            setTab('login');
        });
        setTab(location.hash.replace('

        
        const typeSelect = document.getElementById('reg-type');
        const artisanRows = document.querySelectorAll('.artisan-only');
        typeSelect.addEventListener('change', () => {
            const isArtisan = typeSelect.value === 'artisan';
            artisanRows.forEach(r => r.classList.toggle('hide', !isArtisan));
        });

        
        const pw = document.getElementById('reg-password');
        const pw2 = document.getElementById('reg-password-2');
        const meter = document.querySelector('.meter > i');

        function scorePassword(p) {
            let s = 0;
            if (!p) return 0;
            const hasLower = /[a-z]/.test(p),
                hasUpper = /[A-Z]/.test(p),
                hasNum = /\d/.test(p),
                hasSym = /[^\w\s]/.test(p);
            s += Math.min(6, Math.floor(p.length / 2));
            s += hasLower + hasUpper + hasNum + hasSym;
            if (hasLower && hasUpper && hasNum && hasSym && p.length >= 12) s += 2;
            return Math.min(12, s);
        }

        function updateMeter() {
            const s = scorePassword(pw.value);
            meter.style.width = ((s / 12) * 100) + '%';
            const match = pw.value && pw.value === pw2.value;
            pw2.setCustomValidity(match ? '' : 'Passwords do not match');
        }
        pw.addEventListener('input', updateMeter);
        pw2.addEventListener('input', updateMeter);

        
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>

</html>