<?php
class Usuario
{
    public $id;
    public $nome;
    public $email;
    public $senha_hash;

    public function __construct($id, $nome, $email, $senha_hash)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha_hash = $senha_hash;
    }
}
