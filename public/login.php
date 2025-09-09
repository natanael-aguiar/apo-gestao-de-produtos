<?php
require_once __DIR__ . '/../src/services/AutenticacaoService.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario = AutenticacaoService::login($email, $senha);
    if ($usuario) {
        $_SESSION['usuario_id'] = $usuario->id;
        header('Location: dashboard.php');
        exit;
    } else {
        $erro = 'E-mail ou senha inválidos.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestão de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        <?php if (isset($erro)): ?>
            <div class="text-red-500 mb-4 text-center"><?php echo $erro; ?></div>
        <?php endif; ?>
        <form action="" method="POST" class="space-y-4">
            <input type="email" name="email" placeholder="E-mail" required class="w-full p-2 border rounded">
            <input type="password" name="senha" placeholder="Senha" required class="w-full p-2 border rounded">
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Entrar</button>
        </form>
        <div class="mt-4 text-center">
            <a href="cadastro.php" class="text-blue-500 hover:underline">Criar conta</a>
        </div>
    </div>
</body>

</html>