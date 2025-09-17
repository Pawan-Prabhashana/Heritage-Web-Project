<?php  ?>
<?php if (!isset($page)) $page = ''; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= htmlspecialchars($title ?? 'Heritage') ?></title>
    <link rel="preconnect" href="https:
    <link href="https:
    <link rel="stylesheet" href="assets/css/heritage.css" />
    <style>
        
        .header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(11, 11, 11, .9);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 215, 0, .12);
        }

        .nav {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
        }

        
        .brand {
            display: inline-flex;
            gap: 12px;
            align-items: center;
            font-weight: 900;
        }

        
        .brand i.logo {
            display: none !important;
        }

        .brand img.logo {
            display: block;
            height: 52px;
            
            width: auto;
            object-fit: contain;
        }

        .brand span {
            font-size: 1.7rem;
            
            line-height: 1;
            letter-spacing: .3px;
        }

        .links {
            display: flex;
            gap: 14px;
            justify-content: center;
        }

        .links a {
            padding: 8px 10px;
            font-weight: 700;
        }

        .cta {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
            align-items: center;
        }

        
        body[data-page="home"] .links a[data-page="home"],
        body[data-page="shop"] .links a[data-page="shop"],
        body[data-page="experiences"] .links a[data-page="experiences"],
        body[data-page="about"] .links a[data-page="about"],
        body[data-page="faq"] .links a[data-page="faq"],
        body[data-page="contact"] .links a[data-page="contact"] {
            color: var(--gold);
            border-bottom: 2px solid var(--gold);
        }

        
        .menu-btn {
            display: none;
        }

        .overlay {
            display: none;
        }

        @media (max-width:980px) {
            .links {
                display: none;
            }

            
            .menu-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 42px;
                height: 42px;
                border-radius: 10px;
                border: 1px solid rgba(255, 255, 255, .14);
                background: rgba(255, 255, 255, .06);
                font-weight: 900;
            }

            .overlay {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, .86);
                display: flex;
                flex-direction: column;
                gap: 16px;
                padding: 18px;
                opacity: 0;
                pointer-events: none;
                transition: opacity .18s ease;
            }

            .overlay.open {
                opacity: 1;
                pointer-events: auto;
            }

            .ov-head {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 8px;
            }

            .ov-links {
                display: grid;
                gap: 10px;
                margin-top: 6px;
            }

            .ov-links a {
                padding: 14px;
                border: 1px solid rgba(255, 255, 255, .12);
                border-radius: 12px;
                font-weight: 700;
            }

            .close-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 10px 14px;
                border-radius: 10px;
                border: 1px solid rgba(255, 255, 255, .14);
                background: rgba(255, 255, 255, .06);
                font-weight: 800;
            }

            
            .brand img.logo {
                height: 44px;
            }

            .brand span {
                font-size: 1.5rem;
            }
        }
    </style>
    <script src="assets/js/heritage-api.js"></script>
    <script src="assets/js/heritage-catalog.js"></script>
</head>

<body data-page="<?= htmlspecialchars($page) ?>">
    <header class="header">
        <div class="container nav">
            
            <div class="brand">
                <img class="logo" src="assets/logo.png" alt="Heritage logo">
                <span>Heritage</span>
            </div>

            
            <nav class="links" aria-label="Primary">
                <a data-page="home" href="/index.php">Home</a>
                <a data-page="shop" href="/products">Shop</a>
                <a data-page="experiences" href="/experiences">Experiences</a>
                <a data-page="about" href="/about">About</a>
                <a data-page="faq" href="/faq">FAQ</a>
                <a data-page="contact" href="/contact">Contact</a>
            </nav>

            
            <div class="cta">
                <a class="btn btn-ghost" href="/auth.php
                <a class="btn btn-gold" href="/auth.php
                <button class="menu-btn" id="openMenu" aria-label="Open menu" aria-controls="mobileMenu" aria-expanded="false">☰</button>
            </div>
        </div>

        
        <div class="overlay" id="mobileMenu" aria-hidden="true">
            <div class="ov-head">
                <div class="brand">
                    <img class="logo" src="assets/logo.png" alt="Heritage logo">
                    <span>Heritage</span>
                </div>
                <button class="close-btn" id="closeMenu" aria-label="Close menu">Close ✕</button>
            </div>
            <nav class="ov-links" aria-label="Mobile">
                <a data-page="home" href="/index.php">Home</a>
                <a data-page="shop" href="/products">Shop</a>
                <a data-page="experiences" href="/experiences">Experiences</a>
                <a data-page="about" href="/about">About</a>
                <a data-page="faq" href="/faq">FAQ</a>
                <a data-page="contact" href="/contact">Contact</a>
                <a href="/auth.php
                <a href="/auth.php
            </nav>
        </div>
    </header>

    <main class="container">
        <script>
            
            (function() {
                const body = document.body;
                const openBtn = document.getElementById('openMenu');
                const closeBtn = document.getElementById('closeMenu');
                const menu = document.getElementById('mobileMenu');

                function open() {
                    menu.classList.add('open');
                    menu.setAttribute('aria-hidden', 'false');
                    openBtn.setAttribute('aria-expanded', 'true');
                    body.style.overflow = 'hidden'; 
                }

                function closeAll() {
                    menu.classList.remove('open');
                    menu.setAttribute('aria-hidden', 'true');
                    openBtn.setAttribute('aria-expanded', 'false');
                    body.style.overflow = ''; 
                }

                openBtn?.addEventListener('click', open);
                closeBtn?.addEventListener('click', closeAll);
                window.addEventListener('keydown', e => {
                    if (e.key === 'Escape') closeAll();
                });

                
                menu?.addEventListener('click', (e) => {
                    if (e.target === menu) closeAll();
                });

                
                const mq = matchMedia('(min-width: 981px)');
                mq.addEventListener?.('change', e => {
                    if (e.matches) closeAll();
                });
            })();
        </script>