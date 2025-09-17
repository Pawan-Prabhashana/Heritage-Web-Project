<?php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/db.php';
require_artisan();
$me = current_user();
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Artisan • Heritage</title>
<link rel="stylesheet" href="https:
<style>
body{font-family:system-ui;background:
.layout{display:grid;grid-template-columns:240px 1fr;min-height:100vh}
aside{background:
main{padding:24px 28px}
a{color:
.nav a{display:flex;gap:10px;padding:10px 12px;border-radius:10px;margin-bottom:4px}
.nav a:hover,.nav a.active{background:
.card{background:
.grid{display:grid;gap:16px}
.grid-3{grid-template-columns:repeat(3,minmax(0,1fr))}
table{width:100%;border-collapse:collapse}
th,td{padding:10px;border-bottom:1px solid 
input,select,textarea{background:
.btn{padding:8px 12px;border-radius:10px;border:1px solid 
.btn-primary{background:
.badge{display:inline-flex;align-items:center;gap:6px;padding:4px 8px;border-radius:999px;background:
.table-tools{display:flex;justify-content:space-between;gap:12px;margin-bottom:10px;flex-wrap:wrap}
</style></head><body>
<div class="layout">
<aside>
  <h2 style="margin-top:0">Heritage • Artisan</h2>
  <div class="nav">
    <a href="/heritage/pages/artist_dashboard.php" class="<?= basename($_SERVER['PHP_SELF'])==='artist_dashboard.php'?'active':'' ?>"><i class="ti ti-home"></i>Dashboard</a>
    <a href="/heritage/pages/artist_profile.php" class="<?= basename($_SERVER['PHP_SELF'])==='artist_profile.php'?'active':'' ?>"><i class="ti ti-user-cog"></i>Profile</a>
    <a href="/heritage/pages/artist_products.php" class="<?= basename($_SERVER['PHP_SELF'])==='artist_products.php'?'active':'' ?>"><i class="ti ti-package"></i>Products</a>
    <a href="/heritage/pages/artist_orders.php" class="<?= basename($_SERVER['PHP_SELF'])==='artist_orders.php'?'active':'' ?>"><i class="ti ti-shopping-cart"></i>Orders</a>
    <a href="/heritage/pages/artist_experiences.php" class="<?= basename($_SERVER['PHP_SELF'])==='artist_experiences.php'?'active':'' ?>"><i class="ti ti-school"></i>Experiences</a>
    <a href="/heritage/pages/artist_bookings.php" class="<?= basename($_SERVER['PHP_SELF'])==='artist_bookings.php'?'active':'' ?>"><i class="ti ti-calendar-event"></i>Bookings</a>
    <a href="/heritage/pages/logout.php"><i class="ti ti-logout"></i>Logout</a>
  </div>
</aside>
<main>
