<?php
require_once __DIR__ . '/../config/database.php';
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
    <title>Dashboard - Gestão de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
    <div class="container mx-auto mt-16 max-w-xl">
        <div class="bg-white rounded-lg p-8 border border-gray-200 shadow-sm text-center">
            <h1 class="text-3xl font-bold mb-4 text-indigo-600">Bem-vindo ao sistema!</h1>
            <p class="text-gray-700 text-lg">Utilize o menu acima para navegar entre as funções do sistema.</p>
        </div>
    </div>
</body>

</html>