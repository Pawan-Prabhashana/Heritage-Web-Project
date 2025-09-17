<?php


define('HERITAGE_ADMIN', true);


header('Location: /admin/analytics.php', true, 302);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Heritage • Admin</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <meta http-equiv="refresh" content="1; url=/admin/analytics.php">
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

        html,
        body {
            height: 100%
        }

        body {
            margin: 0;
            color: 
            background:
                radial-gradient(900px 380px at -10% -20%, rgba(198, 163, 79, .12), transparent 60%),
                
            display: grid;
            place-items: center;
            font: 14px/1.5 system-ui, -apple-system, Segoe UI, Roboto, Arial;
        }

        .card {
            width: min(560px, 92%);
            border: var(--outline);
            border-radius: 18px;
            box-shadow: var(--shadow);
            background: linear-gradient(180deg, rgba(255, 255, 255, .05), rgba(255, 255, 255, .02));
            padding: 18px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .logo {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            margin: 0 auto 10px;
            background: linear-gradient(180deg, rgba(198, 163, 79, .35), rgba(198, 163, 79, .18));
            border: 1px solid rgba(198, 163, 79, .45);
            font-weight: 900
        }

        h1 {
            margin: 6px 0 2px;
            font-size: 22px
        }

        .muted {
            color: var(--muted)
        }

        .btn {
            display: inline-flex;
            gap: 8px;
            align-items: center;
            justify-content: center;
            padding: 10px 12px;
            border-radius: 12px;
            border: var(--outline);
            color: 
            background: transparent;
            text-decoration: none
        }

        .btn-gold {
            background: linear-gradient(180deg, rgba(198, 163, 79, .30), rgba(198, 163, 79, .14));
            border: 1px solid rgba(198, 163, 79, .5)
        }

        .row {
            display: flex;
            gap: 8px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 12px
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
</head>

<body>
    <div class="card">
        <div class="logo">H</div>
        <h1>Heritage Admin</h1>
        <div class="muted">Taking you to Analytics…</div>
        <div class="row" style="margin-top:14px">
            <a class="btn btn-gold" href="/admin/analytics.php">Go now</a>
            <a class="btn" href="/index.php" target="_blank" rel="noopener">View site ↗</a>
        </div>
    </div>

    <script>
        
        setTimeout(function() {
            location.replace('/admin/analytics.php');
        }, 600);
    </script>
</body>

</html>