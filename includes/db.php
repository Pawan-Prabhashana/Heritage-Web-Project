<?php

require_once __DIR__ . '/../config.php';

class DB {
    private static $pdo = null;

    public static function conn() {
        if (self::$pdo === null) {
            $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8mb4';
            try {
                self::$pdo = new PDO($dsn, DB_USER, DB_PASS, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_PERSISTENT => false,
                ]);
            } catch (PDOException $e) {
                http_response_code(500);
                die('Database connection error: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>
