<?php
require_once __DIR__ . '/../includes/helpers.php';
require_admin();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= e(APP_NAME) ?> • Admin</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="/heritage/assets/admin.css">
  <link rel="stylesheet" href="https:
  <style>
    body{font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, sans-serif;background:
    .layout{display:grid;grid-template-columns:260px 1fr;min-height:100vh}
    aside{background:
    main{padding:24px 28px}
    a,button{color:
    .nav a{display:flex;gap:10px;padding:10px 12px;border-radius:10px;text-decoration:none;color:
    .nav a:hover,.nav a.active{background:
    .card{background:
    table{width:100%;border-collapse:collapse}
    th,td{padding:10px;border-bottom:1px solid 
    .btn{padding:8px 12px;border-radius:10px;border:1px solid 
    .btn-primary{background:
    .grid{display:grid;gap:16px}
    .grid-3{grid-template-columns:repeat(3,minmax(0,1fr))}
    .badge{display:inline-flex;align-items:center;gap:6px;padding:4px 8px;border-radius:999px;background:
    .table-tools{display:flex;justify-content:space-between;gap:12px;margin-bottom:10px;flex-wrap:wrap}
    input,select{background:
    .kpi{font-size:22px;font-weight:700}
    .muted{color:
  </style>
</head>
<body>
<div class="layout">
  <aside>
    <h2 style="margin-top:4px"><?= e(APP_NAME) ?> • Admin</h2>
    <div class="nav">
      <a href="/heritage/admin/dashboard.php" class="<?= basename($_SERVER['PHP_SELF'])==='dashboard.php'?'active':'' ?>"><i class="ti ti-home"></i>Dashboard</a>
      <a href="/heritage/admin/users.php" class="<?= basename($_SERVER['PHP_SELF'])==='users.php'?'active':'' ?>"><i class="ti ti-users"></i>Users</a>
      <a href="/heritage/admin/categories.php" class="<?= basename($_SERVER['PHP_SELF'])==='categories.php'?'active':'' ?>"><i class="ti ti-category"></i>Categories</a>
      <a href="/heritage/admin/products.php" class="<?= basename($_SERVER['PHP_SELF'])==='products.php'?'active':'' ?>"><i class="ti ti-package"></i>Products</a>
      <a href="/heritage/admin/orders.php" class="<?= basename($_SERVER['PHP_SELF'])==='orders.php'?'active':'' ?>"><i class="ti ti-shopping-cart"></i>Orders</a>
      <a href="/heritage/admin/experiences.php" class="<?= basename($_SERVER['PHP_SELF'])==='experiences.php'?'active':'' ?>"><i class="ti ti-school"></i>Experiences</a>
      <a href="/heritage/admin/bookings.php" class="<?= basename($_SERVER['PHP_SELF'])==='bookings.php'?'active':'' ?>"><i class="ti ti-calendar-event"></i>Bookings</a>
      <a href="/heritage/admin/disputes.php" class="<?= basename($_SERVER['PHP_SELF'])==='disputes.php'?'active':'' ?>"><i class="ti ti-alert-triangle"></i>Disputes</a>
      <a href="/heritage/admin/analytics.php" class="<?= basename($_SERVER['PHP_SELF'])==='analytics.php'?'active':'' ?>"><i class="ti ti-chart-line"></i>Analytics</a>
      <a href="/heritage/admin/logout.php"><i class="ti ti-logout"></i>Logout</a>
    </div>
  </aside>
  <main>
