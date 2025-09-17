<?php
if (session_status() === PHP_SESSION_NONE) { session_name('HERITAGE_SESSID'); session_start(); }
date_default_timezone_set('Asia/Colombo');

$cfgDefault = require __DIR__ . '/../config/config.php';
$cfgLocalPath = __DIR__ . '/../config/config.local.php';
if (file_exists($cfgLocalPath)) {
  $cfg = array_replace_recursive($cfgDefault, require $cfgLocalPath);
} else { $cfg = $cfgDefault; }

if (!empty($cfg['app']['debug'])) { ini_set('display_errors',1); error_reporting(E_ALL); }

require __DIR__ . '/support.php';
require __DIR__ . '/database.php';
require __DIR__ . '/auth.php';

$GLOBALS['heritage_config'] = $cfg;
