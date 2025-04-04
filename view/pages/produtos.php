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
        <div class="acao">
            <a href="produtos-cadastrar.php">
                <button><span>Novo</span><span class="material-symbols-outlined">add</span></button>
            </a>
        </div>
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
                        <td><?php echo $produto['Descricao'] ?></td>
                        <td><?php echo "R$"; echo $produto['Preco'] ?></td>
                        <td>
                            <!-- METHODS - Get / Post -->
                            <form action="produtos-editar.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $produto['id'] ?>">
                                <button>
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button>
                            </form>

                            <form action="produtos-excluir.php" method="POST">
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