<?php

namespace Modelo;

class Produto
{
    private int $id;
    private string $tipo;
    private string $nome;
    private string $descricao;
    private string $imagem;
    private string $preco;

    public function __construct(int $id, string $tipo, string $nome, string $descricao, string $imagem, string $preco)
    {
        $this->id = $id;
        $this->preco = $preco;
        $this->imagem = $imagem;
        $this->descricao = $descricao;
        $this->nome = $nome;
        $this->tipo = $tipo;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function getPreco(): string
    {
        return $this->preco;
    }


}