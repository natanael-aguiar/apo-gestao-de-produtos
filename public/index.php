<?php
require_once __DIR__ . '/../config/database.php';
session_start();
if (isset($_SESSION['usuario_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestão de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: #f3f4f6;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg p-8 border border-gray-200 shadow-sm w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-indigo-600 text-center">Login</h2>
        <form action="login.php" method="POST" class="space-y-4">
            <input type="email" name="email" placeholder="E-mail" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-indigo-300">
            <input type="password" name="senha" placeholder="Senha" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-indigo-300">
            <button type="submit" class="w-full bg-indigo-500 text-white p-2 rounded font-medium hover:bg-indigo-600 transition">Entrar</button>
        </form>
        <div class="mt-4 text-center">
            <a href="cadastro.php" class="text-indigo-500 hover:underline">Criar conta</a>
        </div>
    </div>
</body>

</html>