<?php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/db.php';
require_admin();
$pdo = DB::conn();
$per_page = 20;
$page = max(1, (int)($_GET['page'] ?? 1));
$offset = ($page-1)*$per_page;
$q = trim($_GET['q'] ?? '');
$where = "WHERE 1=1 ";
$params = [];
if ($q !== '') {
  $where .= " AND (name LIKE :q OR status LIKE :q)";
  $params[':q'] = "%".$q."%";
}
$total = $pdo->prepare("SELECT COUNT(*) FROM products " . $where);
$total->execute($params);
$total = (int)$total->fetchColumn();
$sql = "SELECT id, name, artisan_id, category_id, price, stock, status FROM products " . $where . " ORDER BY id DESC LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($sql);
foreach($params as $k=>$v) $stmt->bindValue($k, $v, PDO::PARAM_STR);
$stmt->bindValue(':limit', $per_page, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll();

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $pdo->prepare("DELETE FROM products WHERE id = ?")->execute([$id]);
    redirect($_SERVER['PHP_SELF']);
}
include __DIR__ . '/_header.php';
?>
<h1 style="margin-top:0">Products</h1>
<div class="table-tools">
  <form method="get">
    <input name="q" value="<?= e($q) ?>" placeholder="Search...">
    <button class="btn">Search</button>
  </form>
  <div>
    <a class="btn btn-primary" href="<?= e($_SERVER['PHP_SELF']) ?>?create=1">Create</a>
  </div>
</div>
<div class="card">
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th><th>ArtisanID</th><th>CategoryID</th><th>Price</th><th>Stock</th><th>Status</th><th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row): ?>
    <tr>
      <td><?= (int)$row['id'] ?></td>
      <td><?= e($row['name']) ?></td><td><?= e($row['artisan_id']) ?></td><td><?= e($row['category_id']) ?></td><td><?= e($row['price']) ?></td><td><?= e($row['stock']) ?></td><td><?= e($row['status']) ?></td>
      <td>
  <a class="btn" href="<?= e($_SERVER['PHP_SELF']) ?>?edit=<?= (int)$row['id'] ?>">Edit</a>
  <a class="btn" onclick="return confirm('Delete this record?')" href="<?= e($_SERVER['PHP_SELF']) ?>?delete=<?= (int)$row['id'] ?>">Delete</a>
</td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</div>
<?php include __DIR__ . '/_footer.php'; ?>
