<?php

require_once './model/ProdutoModel.php';

$ProdutoModel= new ProdutoModel();

echo "<pre>"
print_r($ProdutoModel ->buscar_id)
echo "</pre>"