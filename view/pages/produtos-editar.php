<?php

require_once __DIR__ . '/../../model/ProdutoModel.php';

$produtoModel = new ProdutoModel();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    $sucesso = false;
    if (isset($id)) {
        $sucesso = $produtoModel->editar($_POST);
    }

    if ($sucesso) {
        header("location: produtos.php?mensagem=sucesso");
        exit();
    } else {
        header("location: produtos.php?mensagem=erro");
        exit();
    }
} else if ($_SERVER['REQUEST_METHOD'] === "GET") {

    if (isset($_GET["id"])) {
        $produto = $produtoModel->buscarPorId($_GET["id"]);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto</title>

</head>
<body>
    <section class="container">
        <form action="produtos-editar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $produto["id"] ?>"> 
            <div>
                <p>Nome do produto</p><input type="text" name="nome" value="<?php echo $produto["nome"] ?>">
            </div>
            <div>
                <p>Descrição</p><input type="text" name="descricao" value="<?php echo $produto["Descricao"] ?>">
            </div>
            <div>
                <p>Preço</p><input type="text" name="descricao" value="<?php echo $produto["Preco"] ?>">
            </div>
            <br>
            <button>Salvar</button>
        </form>
    </section>
</body>
</html>