<?php
require_once __DIR__ . '/../src/services/DatabaseService.php';
require_once __DIR__ . '/../src/controllers/ProdutoController.php';
require_once __DIR__ . '/../src/classes/Cesta.php';
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit;
}
if (!isset($_SESSION['cesta'])) {
    $_SESSION['cesta'] = [];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produtos'])) {
    $_SESSION['cesta'] = $_POST['produtos'];
}
$produtoController = new ProdutoController(DatabaseService::getConnection());
$todosProdutos = $produtoController->listar();
$cestaIds = $_SESSION['cesta'];
$cesta = new Cesta();
foreach ($todosProdutos as $p) {
    if (in_array($p->id, $cestaIds)) {
        $cesta->adicionarProduto($p);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta</title>
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
            <h2 class="text-2xl font-semibold mb-4 text-indigo-600 text-center">Selecionar Produtos</h2>
            <form method="POST" class="mb-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <?php foreach ($todosProdutos as $p): ?>
                        <label class="flex items-center bg-gray-50 p-3 rounded border border-gray-200">
                            <input type="checkbox" name="produtos[]" value="<?php echo $p->id; ?>" <?php echo in_array($p->id, $cestaIds) ? 'checked' : ''; ?>>
                            <span class="ml-2"> <?php echo $p->nome; ?> - R$ <?php echo $p->preco; ?> </span>
                        </label>
                    <?php endforeach; ?>
                </div>
                <button type="submit" class="w-full bg-indigo-500 text-white p-2 rounded font-medium hover:bg-indigo-600 transition" onclick="return validarSelecao()">Incluir na Cesta</button>
            </form>
        </div>
        <div class="bg-white rounded-lg p-6 border border-gray-200">
            <h2 class="text-xl font-semibold mb-3 text-indigo-600 text-center">Cesta de Compras</h2>
            <table class="min-w-full bg-gray-50 rounded mb-4">
                <tr>
                    <th class="p-2">Produto</th>
                    <th class="p-2">Preço</th>
                </tr>
                <?php foreach ($cesta->produtos as $p): ?>
                    <tr>
                        <td class="p-2"><?php echo $p->nome; ?></td>
                        <td class="p-2">R$ <?php echo $p->preco; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="font-bold text-center">Total: R$ <?php echo number_format($cesta->getTotal(), 2, ',', '.'); ?> | Quantidade: <?php echo $cesta->getQuantidade(); ?></div>
        </div>
    </div>
    <script>
        function validarSelecao() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            if (checkboxes.length === 0) {
                alert('Selecione pelo menos um produto!');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>