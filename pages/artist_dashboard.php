<?php
require_once __DIR__ . '/_artist_header.php';
$pdo = DB::conn();
$uid = $me['id'];
$k1 = $pdo->prepare("SELECT COUNT(*) FROM products WHERE artisan_id = ?");
$k1->execute([$uid]); $prodCount = (int)$k1->fetchColumn();
$k2 = $pdo->prepare("SELECT COUNT(*) FROM orders o JOIN order_items oi ON oi.order_id=o.id JOIN products p ON p.id=oi.product_id WHERE p.artisan_id=?");
$k2->execute([$uid]); $orderCount = (int)$k2->fetchColumn();
$k3 = $pdo->prepare("SELECT COUNT(*) FROM experiences WHERE artisan_id=?");
$k3->execute([$uid]); $expCount = (int)$k3->fetchColumn();
$k4 = $pdo->prepare("SELECT COUNT(*) FROM bookings b JOIN experiences e ON e.id=b.experience_id WHERE e.artisan_id=?");
$k4->execute([$uid]); $bookCount = (int)$k4->fetchColumn();
?>
<h1 style="margin-top:0">Dashboard</h1>
<div class="grid grid-3">
  <div class="card"><div class="badge">Products</div><div style="font-size:24px;font-weight:700"><?= $prodCount ?></div></div>
  <div class="card"><div class="badge">Orders</div><div style="font-size:24px;font-weight:700"><?= $orderCount ?></div></div>
  <div class="card"><div class="badge">Experiences</div><div style="font-size:24px;font-weight:700"><?= $expCount ?></div></div>
</div>
<div class="card"><div class="badge">Bookings</div><div style="font-size:24px;font-weight:700"><?= $bookCount ?></div></div>
<?php require_once __DIR__ . '/_artist_footer.php'; ?>
