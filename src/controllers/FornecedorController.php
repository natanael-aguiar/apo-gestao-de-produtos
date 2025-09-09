<?php
require_once __DIR__ . '/../classes/Fornecedor.php';
class FornecedorController
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function cadastrar($nome, $contato)
    {
        $stmt = $this->pdo->prepare('INSERT INTO fornecedores (nome, contato) VALUES (?, ?)');
        return $stmt->execute([$nome, $contato]);
    }
    public function listar()
    {
        $stmt = $this->pdo->query('SELECT * FROM fornecedores');
        $fornecedores = [];
        while ($f = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $fornecedores[] = new Fornecedor($f['id'], $f['nome'], $f['contato']);
        }
        return $fornecedores;
    }
}
