<?php

use Modelo\Produto;
use Repositorio\ProdutoRepositorio;

require "src/conexao.php";
require "src/Modelo/Produto.php";
require "src/Repositorio/ProdutoRepositorio.php";

$produtoRepositorio = new ProdutoRepositorio($pdo);
$produtoRepositorio->removerProduto($_POST['id']);

header('Location: admin.php');