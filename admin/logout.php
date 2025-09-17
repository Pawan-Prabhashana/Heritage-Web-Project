<?php
require_once __DIR__ . '/../includes/auth.php';
auth_logout();
header('Location: /heritage/admin/login.php');
exit;
