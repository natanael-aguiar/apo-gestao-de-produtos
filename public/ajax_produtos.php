<?php
require_once __DIR__ . '/../src/services/DatabaseService.php';
require_once __DIR__ . '/../src/controllers/ProdutoController.php';
session_start();
if (!isset($_SESSION['usuario_id'])) exit;
$produtoController = new ProdutoController(DatabaseService::getConnection());
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $fornecedor_id = $_POST['fornecedor_id'];
    $produtoController->cadastrar($nome, $preco, $fornecedor_id);
    exit;
}
$produtos = $produtoController->listar();
echo '<table class="min-w-full bg-white rounded shadow"><tr><th class="p-2">Nome</th><th class="p-2">Preço</th><th class="p-2">Fornecedor</th></tr>';
foreach ($produtos as $p) {
    // Buscar nome do fornecedor
    $fornecedorNome = '';
    if ($p->fornecedor_id) {
        $stmt = DatabaseService::getConnection()->prepare('SELECT nome FROM fornecedores WHERE id = ?');
        $stmt->execute([$p->fornecedor_id]);
        $fornecedor = $stmt->fetch(PDO::FETCH_ASSOC);
        $fornecedorNome = $fornecedor ? $fornecedor['nome'] : '';
    }
    echo "<tr><td class='p-2'>{$p->nome}</td><td class='p-2'>R$ {$p->preco}</td><td class='p-2'>{$fornecedorNome}</td></tr>";
}
echo '</table>';
