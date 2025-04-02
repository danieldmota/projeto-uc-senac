<?php
 require_once __DIR__ . '/../../model/CategoriaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    var_dump($_POST);
    $categoriaModel = new CategoriaModel();

    if (empty($_POST['id'])){
        $categoria->nome = $_POST['nome'];
        $categoria->descricao = $_POST['descricao'];
        // $sucesso = $categoriaModel->criar([
        //     'nome' => $nome,
        // ]);
        if ($categoria->create()) {
            echo "Usuário criado com sucesso!";
        } else {
            echo "Erro ao criar o usuário.";
        }
    }// else{
    //     $id = $_POST['id'];
    //     $nome = $_POST['nome'];
    //     $sucesso = $categoriaModel->editar([
    //         'id' => $id,
    //         'nome' => $nome,
    //     ]);
    // }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="/site-adm/view/css/style.css">

</head>
<body>
    <section class="container">
        <form action="categorias.php" method="post">
            <input type="hidden" name="id"> 
            <div>
                <p>Nome</p><input type="text" id="nome" name="nome">
            </div>
            <div>
                <p>Descrição</p><input type="text" id="descricao" name="descricao">
            </div>
            <br>
            <button type="submit">Salvar</button>
        </form>
    </section>
</body>
</html>