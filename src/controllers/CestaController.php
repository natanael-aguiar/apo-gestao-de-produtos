<?php
require_once __DIR__ . '/../classes/Cesta.php';
require_once __DIR__ . '/../classes/Produto.php';
class CestaController
{
    public function criarCesta($produtos)
    {
        $cesta = new Cesta();
        foreach ($produtos as $p) {
            $cesta->adicionarProduto($p);
        }
        return $cesta;
    }
}
