<?php
require_once __DIR__ . '/_artist_header.php';
$pdo = DB::conn();
$uid = $me['id'];
$err=null;$ok=null;
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (!csrf_check($_POST['csrf'] ?? '')) $err='Invalid CSRF';
    else {
        if (isset($_POST['create'])) {
            $title=$_POST['title'] ?? '';
            $desc=$_POST['description'] ?? '';
            $price=(float)($_POST['price'] ?? 0);
            $cap=(int)($_POST['capacity'] ?? 1);
            $pdo->prepare("INSERT INTO experiences (artisan_id,title,description,price,capacity,status) VALUES (?,?,?,?,?,'active')")
                ->execute([$uid,$title,$desc,$price,$cap]);
            $ok='Experience created.';
        } elseif (isset($_POST['update'])) {
            $id=(int)$_POST['id'];
            $title=$_POST['title'] ?? '';
            $desc=$_POST['description'] ?? '';
            $price=(float)($_POST['price'] ?? 0);
            $cap=(int)($_POST['capacity'] ?? 1);
            $pdo->prepare("UPDATE experiences SET title=?, description=?, price=?, capacity=? WHERE id=? AND artisan_id=?")
                ->execute([$title,$desc,$price,$cap,$id,$uid]);
            $ok='Experience updated.';
        } elseif (isset($_POST['delete'])) {
            $id=(int)$_POST['id'];
            $pdo->prepare("DELETE FROM experiences WHERE id=? AND artisan_id=?")->execute([$id,$uid]);
            $ok='Experience deleted.';
        }
    }
}
$exps = $pdo->prepare("SELECT * FROM experiences WHERE artisan_id=? ORDER BY id DESC");
$exps->execute([$uid]); $exps = $exps->fetchAll();
$token = csrf_token();
?>
<h1 style="margin-top:0">Experiences</h1>
<?php if ($err): ?><div class="card" style="border-color:
<?php if ($ok): ?><div class="card" style="border-color:
<div class="card">
  <h3 style="margin-top:0">Add Experience</h3>
  <form method="post">
    <input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>">
    <input type="hidden" name="create" value="1">
    <label>Title</label><input name="title" required>
    <label>Price</label><input name="price" type="number" step="0.01" required>
    <label>Capacity</label><input name="capacity" type="number" min="1" required>
    <label>Description</label><textarea name="description" rows="6"></textarea>
    <button class="btn btn-primary">Create</button>
  </form>
</div>
<div class="card">
  <h3 style="margin-top:0">Your Experiences</h3>
  <table>
    <thead><tr><th>Title</th><th>Price</th><th>Capacity</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
      <?php foreach($exps as $e): ?>
      <tr>
        <td><?= htmlspecialchars($e['title']) ?></td>
        <td>LKR <?= number_format($e['price'],2) ?></td>
        <td><?= (int)$e['capacity'] ?></td>
        <td><span class="badge"><?= htmlspecialchars($e['status']) ?></span></td>
        <td>
          <details>
            <summary class="btn">Edit</summary>
            <form method="post" style="margin-top:8px">
              <input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>">
              <input type="hidden" name="update" value="1"><input type="hidden" name="id" value="<?= (int)$e['id'] ?>">
              <label>Title</label><input name="title" value="<?= htmlspecialchars($e['title']) ?>">
              <label>Price</label><input name="price" type="number" step="0.01" value="<?= htmlspecialchars($e['price']) ?>">
              <label>Capacity</label><input name="capacity" type="number" min="1" value="<?= (int)$e['capacity'] ?>">
              <label>Description</label><textarea name="description" rows="6"><?= htmlspecialchars($e['description']) ?></textarea>
              <button class="btn btn-primary">Update</button>
            </form>
          </details>
          <form method="post" onsubmit="return confirm('Delete experience?')" style="margin-top:6px">
            <input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>">
            <input type="hidden" name="delete" value="1"><input type="hidden" name="id" value="<?= (int)$e['id'] ?>">
            <button class="btn">Delete</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php require_once __DIR__ . '/_artist_footer.php'; ?>
