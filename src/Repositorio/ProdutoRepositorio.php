<?php

namespace Repositorio;

use Modelo\Produto;
use PDO;

class ProdutoRepositorio
{
    private PDO $pdo;

    //Na construção do objeto passa o PDO para a conexão com o banco de dados
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function opcoesCafe(): array
    {
        $sql1 = "SELECT * FROM produtos WHERE tipo = 'Café'";
        $statement1 = $this->pdo->query($sql1);
        $produtosCafe = $statement1->fetchAll(PDO::FETCH_ASSOC);

        $dadosCafe = array_map(function ($cafe)
        {
            return new Produto($cafe['id'],
                $cafe['tipo'],
                $cafe['nome'],
                $cafe['descricao'],
                $cafe['preco'],
                $cafe['imagem']);
        },$produtosCafe);

        return $dadosCafe;
    }

    public function opcoesAlmoco(): array
    {
        $sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço'";
        $statement2 = $this->pdo->query($sql2);
        $produtosAlmoco = $statement2->fetchAll(PDO::FETCH_ASSOC);

        $dadosAlmoco = array_map(function ($almoco)
        {
            return new Produto($almoco['id'],
                $almoco['tipo'],
                $almoco['nome'],
                $almoco['descricao'],
                $almoco['preco'],
                $almoco['imagem']);
        },$produtosAlmoco);

        return $dadosAlmoco;
    }

    public function todosProdutos(): array
    {
        $sql ="SELECT * FROM produtos";
        $statement = $this->pdo->query($sql);
        $todosProdutos = $statement->fetchAll(PDO::FETCH_ASSOC); // Aqui é apenas um array


        $todosDados = array_map(function ($produto)
        {
            return new Produto($produto['id'],
                $produto['tipo'],
                $produto['nome'],
                $produto['descricao'],
                $produto['preco'],
                $produto['imagem']);
        },$todosProdutos);

        return $todosDados;
    }

    public function removerProduto(int $id)
    {
        $slq = "DELETE FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($slq);
        $statement->bindValue(1,$id);

        $statement->execute();
    }

    public function adicionarProduto(Produto $produto)
    {
        $sql = "INSERT INTO produtos (tipo, nome, descricao, preco, imagem) VALUES(?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$produto->getTipo());
        $statement->bindValue(2,$produto->getNome());
        $statement->bindValue(3,$produto->getDescricao());
        $statement->bindValue(4,$produto->getPreco());
        $statement->bindValue(5,$produto->getImagem());
        $statement->execute();
    }
}