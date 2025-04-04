<?php

require_once __DIR__ . "\..\..\model\ProdutoModel.php";

$ProdutoModel = new Produto();
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $id= $_POST["id"];

    $sucesso= false;
    if (empty($id)) {
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $categoria = $_POST["categoria"];
        $preco = $_POST["preco"];
        $imagem = $_POST["imagem"];
        $sucesso = $ProdutoModel->inserir($nome, $descricao, $categoria, $preco, $imagem);


    } else {
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $categoria = $_POST["categoria"];
        $preco = $_POST["preco"];
        $imagem = $_POST["imagem"];
        $sucesso = $ProdutoModel->editar($nome, $descricao, $categoria, $preco, $imagem);
        
    }

    if ($sucesso) {
        return header ("location: listar.php?mensagem=sucesso");
    } else {
        return header ("location: listar.php?mensagem=erro");
    }
}else if ($_SERVER['REQUEST_METHOD'] === "GET"){
    $produto= null;

    // $filme= !empty($_GET["id"]) ? $filmeModel->buscarPorId($_GET["id"]) : new Filme();

    if (empty($_GET["id"])) {
        $produto = new Produto();
    
    print_r($filme);
    } else {
        $produto= $ProdutoModel->buscarPorId($_GET["id"]);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
    <link rel="stylesheet" href="/catalogo-filmes/public/css/style.css">

</head>
<body>
    <section class="container">
        <form action="cadastro.php" method="post">
            <input type="hidden" name="id" value="<?php echo $produto->id?>"> 
            <div>
                <p>Nome do produto</p><input type="text" name="nome" value="<?php echo $produto->nome ?>">
            </div>
            <div>
                <p>Descrição</p><input type="text" name="descricao" value="<?php echo $produto->descricao ?>">
            </div>
            <div>
                <p>Categoria</p><input type="text" name="descricao" value="<?php echo $produto->categoria ?>">
            </div>
            <div>
                <p>Preço</p><input type="number" name="descricao" value="<?php echo $produto->preco ?>">
            </div>
            <div>
                <p>Imagem</p><input type="text" name="imagem" value="<?php echo $produto->imagem ?>">
            </div>
            <br>
            <button>Salvar</button>
        </form>
    </section>
</body>
</html>