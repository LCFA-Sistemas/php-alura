<?php

namespace Modelo;

class Produto
{
    private ?int $id;
    private string $tipo;
    private string $nome;
    private string $descricao;
    private string $preco;
    private string $imagem;

    public function __construct(?int $id, string $nome, string $tipo, string $descricao,  string $preco, string $imagem = "logo-seranto.png")
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->imagem = $imagem;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getNome(): string
    {
        return $this->nome;
    }
    public function getTipo(): string
    {
        return $this->tipo;
    }
    public function getDescricao(): string
    {
        return $this->descricao;
    }
    public function getPreco(): string
    {
        return $this->preco;
    }
    public function getImagem(): string
    {
        return $this->imagem;
    }
}