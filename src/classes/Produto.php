<?php
class Produto
{
    public $id;
    public $nome;
    public $preco;
    public $fornecedor_id;

    public function __construct($id, $nome, $preco, $fornecedor_id)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->fornecedor_id = $fornecedor_id;
    }
}
