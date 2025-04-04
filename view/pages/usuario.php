<?php
require_once __DIR__ . '/../../model/UsuarioModel.php';

$usuarioModel = new UsuarioModel();
$lista = $usuarioModel->listar();

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php require_once __DIR__ .'\..\components\head.php'; ?>

<body>
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>
    
    <?php require_once __DIR__ . '\..\components\aside.php'; ?>

    <main>
        <h1>Usuários</h1>
        <div class="acao">
            <a href="usuario-cadastrar.php">
                <button><span>Novo</span><span class="material-symbols-outlined">add</span></button>
            </a>
        </div>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Data de nascimento</th>
            </thead>
            <tbody>
                <?php foreach ($lista as $usuario) { ?>
                    <tr>
                        <td><?php echo $usuario['id'] ?></td>
                        <td><?php echo $usuario['nome'] ?></td>
                        <td><?php echo $usuario['email'] ?></td>
                        <td><?php echo $usuario['telefone'] ?></td>
                        <td><?php echo $usuario['data_nascimento'] ?></td>
                        <td>
                            <!-- METHODS - Get / Post -->
                            <form action="usuario-excluir.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $usuario['id'] ?>">
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

    <?php require_once __DIR__ . '\..\components\footer.php'; ?>
</body>
</html>