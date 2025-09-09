<?php
require_once __DIR__ . '/../src/services/DatabaseService.php';
require_once __DIR__ . '/../src/controllers/FornecedorController.php';
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
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
        <div class="bg-white rounded-lg p-6 mb-6 border border-gray-200">
            <h2 class="text-2xl font-semibold mb-4 text-indigo-600 text-center">Cadastro de Fornecedor</h2>
            <form id="form-fornecedor" class="space-y-3">
                <input type="text" name="nome" placeholder="Nome do fornecedor" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-indigo-300">
                <input type="text" name="contato" placeholder="Contato" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-indigo-300">
                <button type="submit" class="w-full bg-indigo-500 text-white p-2 rounded font-medium hover:bg-indigo-600 transition">Cadastrar</button>
            </form>
        </div>
        <div class="bg-white rounded-lg p-6 border border-gray-200">
            <h2 class="text-xl font-semibold mb-3 text-indigo-600 text-center">Lista de Fornecedores</h2>
            <div id="lista-fornecedores"></div>
        </div>
    </div>
    <script>
        function carregarFornecedores() {
            $.get('ajax_fornecedores.php', function(data) {
                $('#lista-fornecedores').html(data);
            });
        }
        $('#form-fornecedor').submit(function(e) {
            e.preventDefault();
            $.post('ajax_fornecedores.php', $(this).serialize(), function() {
                carregarFornecedores();
                $('#form-fornecedor')[0].reset();
            });
        });
        $(document).ready(function() {
            carregarFornecedores();
        });
    </script>
</body>

</html>