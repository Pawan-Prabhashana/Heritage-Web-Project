<?php


if (!defined('HERITAGE_ADMIN')) define('HERITAGE_ADMIN', true);
$admin_title = isset($admin_title) ? $admin_title : 'Heritage • Admin';
$active      = isset($active) ? $active : 'analytics';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= htmlspecialchars($admin_title) ?></title>
    <link rel="preconnect" href="https:
    <link rel="stylesheet" href="/admin/assets/admin.css">
    <style>
        
        :root {
            --bg: 
            --panel: 
            --gold: 
            --muted: 
            --outline: 1px solid rgba(255, 255, 255, .10);
            --shadow: 0 10px 30px rgba(0, 0, 0, .35);
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            background: var(--bg);
            color: 
            font: 14px/1.5 system-ui, -apple-system, Segoe UI, Roboto, Arial
        }

        .admin-header {
            position: sticky;
            top: 0;
            z-index: 50;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 16px;
            border-bottom: var(--outline);
            background: linear-gradient(180deg, rgba(0, 0, 0, .55), rgba(0, 0, 0, .35));
            backdrop-filter: blur(8px);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .brand .logo {
            width: 30px;
            height: 30px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            background: linear-gradient(180deg, rgba(198, 163, 79, .35), rgba(198, 163, 79, .18));
            border: 1px solid rgba(198, 163, 79, .5);
            font-weight: 900
        }

        .brand .sep {
            opacity: .5
        }

        .spacer {
            flex: 1
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 8px;
            border: var(--outline);
            border-radius: 999px;
            padding: 6px 8px;
            background: rgba(255, 255, 255, .04)
        }

        .user-chip .avatar {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: 
            display: grid;
            place-items: center;
            border: 1px solid rgba(255, 255, 255, .08)
        }

        .btn {
            cursor: pointer;
            border: var(--outline);
            background: transparent;
            color: 
            padding: 8px 10px;
            border-radius: 10px
        }

        .btn-ghost {
            border: none
        }

        
        .admin-shell {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: calc(100vh - 58px)
        }

        @media(max-width:980px) {
            .admin-shell {
                grid-template-columns: 1fr
            }
        }

        .admin-main {
            padding: 16px
        }

        
        .mini-cart,
        
        .cart-trigger,
        .header-cart,
        [data-role="mini-cart"],
        .mini-cart-backdrop,
        .cart-fab,
        .cart-float,
        .cart-bubble,
        .fab-cart,
        .floating-cart {
            display: none !important
        }
    </style>
    <script src="assets/js/heritage-api.js"></script>
</head>

<body class="admin no-mini-cart">
    <header class="admin-header">
        <div class="brand">
            <span class="logo">H</span>
            <b>Heritage</b>
            <span class="sep">•</span>
            <span class="muted">Admin</span>
        </div>

        <div class="spacer"></div>

        
        <form id="adminQuickSearch" onsubmit="event.preventDefault();" style="display:flex;gap:8px;align-items:center;border:var(--outline);border-radius:12px;padding:6px 8px;background:rgba(255,255,255,.04)">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M21 21l-3.8-3.8" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.6" />
            </svg>
            <input placeholder="Search users, products…" aria-label="Search" style="background:transparent;border:0;outline:none;color:
        </form>

        <nav class="top-actions">
            <button id="themeToggle" class="btn btn-ghost" title="Toggle theme">🌓</button>
            <button class="btn" title="Create new" onclick="document.dispatchEvent(new CustomEvent('admin:new'))">＋ New</button>
            <div class="user-chip">
                <div class="avatar">A</div>
                <div class="meta">
                    <b>Admin</b><br>
                    <small class="muted" id="adminRole">Super</small>
                </div>
            </div>
        </nav>
    </header>

    
    <div class="admin-shell">
        <?php include __DIR__ . '/admin-sidebar.php'; ?>
        <main class="admin-main">
            
            <script>
                
                (function() {
                    const SELECTORS = ['.mini-cart', '
                    const nuke = (root = document) => SELECTORS.forEach(s => root.querySelectorAll(s).forEach(el => el.remove()));
                    nuke();
                    const mo = new MutationObserver(ms => ms.forEach(m => m.addedNodes && m.addedNodes.forEach(n => {
                        if (n.nodeType === 1) nuke(n);
                    })));
                    mo.observe(document.documentElement, {
                        childList: true,
                        subtree: true
                    });
                    window.addEventListener('click', (e) => {
                        const t = e.target.closest('[data-open="mini-cart"],.open-mini-cart,.cart-trigger,.header-cart');
                        if (t) {
                            e.preventDefault();
                            e.stopPropagation();
                        }
                    }, true);
                })();
            </script>