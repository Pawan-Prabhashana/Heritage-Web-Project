<?php
$DB_HOST='127.0.0.1';
$DB_PORT=3306;
$DB_NAME='heritage';
$DB_USER='root';
$DB_PASS='';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);
if ($mysqli->connect_errno) {
  die('Database connection failed: ' . $mysqli->connect_error);
}
