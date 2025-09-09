<?php
require_once __DIR__ . '/../classes/Usuario.php';
class UsuarioController
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function cadastrar($nome, $email, $senha)
    {
        $senha_hash = hash('sha256', $senha);
        $stmt = $this->pdo->prepare('INSERT INTO usuarios (nome, email, senha_hash) VALUES (?, ?, ?)');
        return $stmt->execute([$nome, $email, $senha_hash]);
    }
    public function autenticar($email, $senha)
    {
        $senha_hash = hash('sha256', $senha);
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = ? AND senha_hash = ?');
        $stmt->execute([$email, $senha_hash]);
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($dados) {
            return new Usuario($dados['id'], $dados['nome'], $dados['email'], $dados['senha_hash']);
        }
        return null;
    }
}
