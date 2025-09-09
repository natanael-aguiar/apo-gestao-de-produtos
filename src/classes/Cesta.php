<?php
class Cesta
{
    public $produtos = [];

    public function adicionarProduto($produto)
    {
        $this->produtos[] = $produto;
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->produtos as $p) {
            $total += $p->preco;
        }
        return $total;
    }

    public function getQuantidade()
    {
        return count($this->produtos);
    }
}
