<?php
 require_once __DIR__ . '/../../model/UsuarioModel.php';

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuarioModel = new UsuarioModel();

    if (empty($_POST['id'])) {
        $res = $usuarioModel->criar($_POST);

        if ($res) {
            echo "<script>alert('Criou o usuário.')</script>";

            return header('Location: usuario-cadastrar.php');
        } else {
            echo "<script>alert('Erro ao criar o usuário.')</script>";
        }
    }
    return header("Location: usuario-cadastrar.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="/site-adm/view/css/style.css">

</head>
<body>
    <section class="container">
        <form action="usuario-cadastrar.php" method="POST">
            <input type="hidden" name="id">
            <div>
                <p>Nome</p><input type="text" id="nome" name="nome">
            </div>
            <div>
                <p>Email</p><input type="text" id="descricao" name="descricao">
            </div>
            <div>
                <p>Telefone</p><input type="text" id="preco" name="preco">
            </div>
            <div>
                <p>Data de Nascimento</p><input type="text" id="preco" name="preco">
            </div>
            <br>
            <button type="submit">Salvar</button>
        </form>
    </section>
</body>
</html>