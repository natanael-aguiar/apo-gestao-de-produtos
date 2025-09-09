<?php
require_once __DIR__ . '/../src/services/DatabaseService.php';
require_once __DIR__ . '/../src/controllers/FornecedorController.php';
session_start();
if (!isset($_SESSION['usuario_id'])) exit;
$fornecedorController = new FornecedorController(DatabaseService::getConnection());
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $fornecedorController->cadastrar($nome, $contato);
    exit;
}
$fornecedores = $fornecedorController->listar();
echo '<table class="min-w-full bg-white rounded shadow"><tr><th class="p-2">Nome</th><th class="p-2">Contato</th></tr>';
foreach ($fornecedores as $f) {
    echo "<tr><td class='p-2'>{$f->nome}</td><td class='p-2'>{$f->contato}</td></tr>";
}
echo '</table>';
