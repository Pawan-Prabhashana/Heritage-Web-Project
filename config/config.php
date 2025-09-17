<?php


return [
  'db' => [
    'host' => getenv('DB_HOST') ?: '127.0.0.1',
    'port' => getenv('DB_PORT') ?: '3306',
    'database' => getenv('DB_NAME') ?: 'heritage',
    'username' => getenv('DB_USER') ?: 'root',
    'password' => getenv('DB_PASS') ?: '',
    'charset'  => 'utf8mb4',
  ],
  'app' => [
    'base_url' => '',
    'env' => 'local',
    'debug' => true,
    'session_name' => 'HERITAGE_SESSID',
  ],
  'uploads' => [
    'dir' => __DIR__ . '/../storage/uploads',
    'base_url' => 'assets/uploads' 
  ]
];
