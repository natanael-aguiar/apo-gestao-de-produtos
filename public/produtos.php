<?php
require_once __DIR__ . '/../src/services/DatabaseService.php';
require_once __DIR__ . '/../src/controllers/ProdutoController.php';
require_once __DIR__ . '/../src/controllers/FornecedorController.php';
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit;
}
$fornecedorController = new FornecedorController(DatabaseService::getConnection());
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background: #f3f4f6;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">
    <nav class="bg-indigo-500 p-3 text-white flex justify-between">
        <div class="font-bold text-lg">Gestão de Produtos</div>
        <div class="space-x-3">
            <a href="dashboard.php" class="hover:text-indigo-100 transition">Dashboard</a>
            <a href="produtos.php" class="hover:text-indigo-100 transition">Produtos</a>
            <a href="fornecedores.php" class="hover:text-indigo-100 transition">Fornecedores</a>
            <a href="cesta.php" class="hover:text-indigo-100 transition">Cesta</a>
            <a href="logout.php" class="hover:text-indigo-100 transition">Sair</a>
        </div>
    </nav>
    <div class="container mx-auto mt-10 max-w-xl">
        <div class="bg-white rounded-lg p-8 border border-gray-200 shadow-sm mb-6">
            <h2 class="text-2xl font-bold mb-6 text-indigo-600 text-center">Cadastro de Produto</h2>
            <form id="form-produto" class="space-y-4 mb-2">
                <input type="text" name="nome" placeholder="Nome do produto" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-indigo-300">
                <input type="number" step="0.01" name="preco" placeholder="Preço" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-indigo-300">
                <select name="fornecedor_id" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-indigo-300">
                    <option value="">Selecione o fornecedor</option>
                    <?php
                    $fornecedores = $fornecedorController->listar();
                    foreach ($fornecedores as $f) {
                        echo "<option value='{$f->id}'>{$f->nome}</option>";
                    }
                    ?>
                </select>
                <button type="submit" class="w-full bg-indigo-500 text-white p-2 rounded font-medium hover:bg-indigo-600 transition">Cadastrar</button>
            </form>
        </div>
        <div class="bg-white rounded-lg p-8 border border-gray-200 shadow-sm">
            <h2 class="text-xl font-bold mb-4 text-indigo-600 text-center">Lista de Produtos</h2>
            <div id="lista-produtos"></div>
        </div>
    </div>
    <script>
        function carregarProdutos() {
            $.get('ajax_produtos.php', function(data) {
                $('#lista-produtos').html(data);
            });
        }
        $('#form-produto').submit(function(e) {
            e.preventDefault();
            $.post('ajax_produtos.php', $(this).serialize(), function() {
                carregarProdutos();
                $('#form-produto')[0].reset();
            });
        });
        $(document).ready(function() {
            carregarProdutos();
        });
    </script>
</body>

</html>