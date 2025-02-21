<?php

require_once './model/ProdutoModel.php';

$ProdutoModel= new Produto();

$id= "1";

echo "<pre>";
print_r($ProdutoModel ->buscarPorId($id));
echo "</pre>";