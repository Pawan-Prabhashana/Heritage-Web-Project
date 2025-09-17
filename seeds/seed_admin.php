<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
$pdo = DB::conn();
$email = 'admin@heritage.local';
$name = 'Heritage Admin';
$pwd = 'admin123';
$hash = password_hash_heritage($pwd);
$pdo->exec("CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(180) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin','artisan','customer') NOT NULL DEFAULT 'customer',
  status ENUM('active','pending','banned') NOT NULL DEFAULT 'active',
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
$stmt = $pdo->prepare("SELECT id FROM users WHERE email=? LIMIT 1");
$stmt->execute([$email]);
if (!$stmt->fetch()) {
  $ins = $pdo->prepare("INSERT INTO users (name,email,password_hash,role,status) VALUES (?,?,?,?,?)");
  $ins->execute([$name,$email,$hash,'admin','active']);
  echo "Created admin user: $email / $pwd\n";
} else {
  echo "Admin user already exists: $email\n";
}
