<?php

require_once __DIR__ . '/../../model/CategoriaModel.php';

$categoriaModel = new CategoriaModel();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    $sucesso = false;
    if (isset($id)) {
        $sucesso = $categoriaModel->editar($_POST);
    }

    if ($sucesso) {
        header("location: categorias.php?mensagem=sucesso");
        exit();
    } else {
        header("location: categorias.php?mensagem=erro");
        exit();
    }
} else if ($_SERVER['REQUEST_METHOD'] === "GET") {

    if (isset($_GET["id"])) {
        $categoria = $categoriaModel->buscarPorId($_GET["id"]);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar categoria</title>

</head>
<body>
    <section class="container">
        <form action="categorias-editar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $categoria["id"] ?>"> 
            <div>
                <p>Nome do produto</p><input type="text" name="nome" value="<?php echo $categoria['nome'] ?>">
            </div>
            <div>
                <p>Descrição</p><input type="text" name="descricao" value="<?php echo $categoria['descricao'] ?>">
            </div>
            <br>
            <button>Salvar</button>
        </form>
    </section>
</body>
</html>