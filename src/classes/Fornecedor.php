<?php
class Fornecedor
{
    public $id;
    public $nome;
    public $contato;

    public function __construct($id, $nome, $contato)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->contato = $contato;
    }
}
