<?php
class DatabaseService
{
    private static $pdo = null;
    public static function getConnection()
    {
        if (self::$pdo === null) {
            $env = parse_ini_file(__DIR__ . '/../../.env');
            $host = $env['DB_HOST'];
            $db = $env['DB_NAME'];
            $user = $env['DB_USER'];
            $pass = $env['DB_PASS'];
            self::$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }
}
