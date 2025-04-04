<?php
    require_once __DIR__ . '/../../model/CategoriaModel.php';

    $categoriaModel = new CategoriaModel();
    $lista = $categoriaModel->listar();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/components/table.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/components/content.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/components/footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/components/sidebar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>
    
    <?php require_once __DIR__ . '\..\components\aside.php'; ?>

    <main>
        <h1>Categorias</h1>
        <div class="acao">
            <a href="categorias-cadastrar.php">
                <button><span>Novo</span><span class="material-symbols-outlined">add</span></button>
            </a>
        </div>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
            </thead>
            <tbody>
                <?php foreach ($lista as $categoria) { ?>
                    <tr>
                        <td><?php echo $categoria['id'] ?></td>
                        <td><?php echo $categoria['nome'] ?></td>
                        <td><?php echo $categoria['descricao'] ?></td>
                        <td>
                            <!-- METHODS - Get / Post -->
                            <form action="categorias-editar.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $categoria['id'] ?>">
                                <a href=""></a>
                                <button>
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button>
                            </form>

                            <form  action="categorias-excluir.php" method="POST">
                                <input type="hidden"name="id" value="<?php echo $categoria['id']?>">
                                <button name="excluir_categoria" onclick="return confirm('Tem certeza que deseja excluir?')"><span class="material-symbols-outlined">delete</span></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>

    <?php require_once __DIR__ . '\..\components\footer.php'; ?>
</body>
</html>