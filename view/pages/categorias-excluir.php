<?php
require_once __DIR__ . '/../../model/CategoriaModel.php';

if (isset($_POST['excluir_categoria'])){
    $id = $_POST["id"];

    if (!empty($id)){
        $categoriaModel = new CategoriaModel();
        $resultado = $categoriaModel->excluirPorId($id);

        if ($resultado > 0) {
            return header("Location: categorias.php?mensagem=sucesso");
        } else {
            return header("Location: categorias.php?mensagem=erro");
        }
    }
}

return header("Location: categorias.php");
?>