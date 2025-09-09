<?php
require_once __DIR__ . '/../controllers/UsuarioController.php';
require_once __DIR__ . '/DatabaseService.php';
class AutenticacaoService
{
    public static function login($email, $senha)
    {
        $pdo = DatabaseService::getConnection();
        $usuarioController = new UsuarioController($pdo);
        return $usuarioController->autenticar($email, $senha);
    }
    public static function registrar($nome, $email, $senha)
    {
        $pdo = DatabaseService::getConnection();
        $usuarioController = new UsuarioController($pdo);
        return $usuarioController->cadastrar($nome, $email, $senha);
    }
}
