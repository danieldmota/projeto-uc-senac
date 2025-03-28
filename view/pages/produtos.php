<?php
require_once __DIR__ . '/../../model/ProdutoModel.php';

$produtoModel = new ProdutoModel();
$lista = $produtoModel-> listar();

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php require_once __DIR__ .'\..\components\head.php'; ?>

<body>
    <?php require_once __DIR__ .'\..\components\navbar.php'; ?>

    <?php require_once __DIR__ .'\..\components\aside.php'; ?>
    
    <main>
        <h1>Produtos</h1>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
            </thead>
            <tbody>
                <?php foreach ($lista as $produto) { ?>
                    <tr>
                        <td><?php echo $produto['id'] ?></td>
                        <td><?php echo $produto['nome'] ?></td>
                        <td><?php echo $produto['descricao'] ?></td>
                        <td><?php echo "R$"; echo $produto['preco'] ?></td>
                        <td>
                            <!-- METHODS - Get / Post -->
                            <form action="cadastro.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $produto['id'] ?>">
                                <button>
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button>
                            </form>

                            <form action="excluir.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $produto['id'] ?>">
                                <button onclick="return confirm('Tem certeza que deseja excluir o filme?')">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>

    <?php require_once __DIR__ .'\..\components\footer.php'; ?>
</body>
</html>