<?php
require_once __DIR__ . '/../classes/Produto.php';
class ProdutoController
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function cadastrar($nome, $preco, $fornecedor_id)
    {
        $stmt = $this->pdo->prepare('INSERT INTO produtos (nome, preco, fornecedor_id) VALUES (?, ?, ?)');
        return $stmt->execute([$nome, $preco, $fornecedor_id]);
    }
    public function listar()
    {
        $stmt = $this->pdo->query('SELECT * FROM produtos');
        $produtos = [];
        while ($p = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $produtos[] = new Produto($p['id'], $p['nome'], $p['preco'], $p['fornecedor_id']);
        }
        return $produtos;
    }
}
