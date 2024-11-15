<?php
session_start();
include_once('conexao.php');
$sql = "SELECT * FROM alunos ORDER BY id DESC";
$result = $connection->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alunos-nome']) && isset($_POST['alunos-turma']) && isset($_POST['alunos-matricula']) && isset($_POST['alunos-nota'])) {
    $nome = $_POST['alunos-nome'];
    $turma = $_POST['alunos-turma'];
    $matricula = $_POST['alunos-matricula'];
    $nota = $_POST['alunos-nota'];

    $insertResult = mysqli_query($connection, "INSERT INTO alunos(nome,turma,matricula,nota) VALUES ('$nome','$turma','$matricula','$nota')");

    if ($insertResult) {
        header('Location: painel-alunos.php');
        exit();
    } else {
        echo "Erro ao cadastrar o aluno";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/global.css">

    <link rel="icon" href="assets/img/logo-escola-cd.png" type="image" sizes="16x16">
    <title>Escola CD | Painel de Alunos</title>
</head>

<body>
    <header class="cabecalho">
        <div class="cabecalho__conteudo">
            <img src="assets/img/logo-escola-cd.png" alt="Escola CD logo" class="cabecalho__logo">
            <h1 class="cabecalho__titulo">Escola CD</h1>
        </div>
    </header>
    <main class="pagina pagina-alunos">
        <div>
            <a class="pagina__link" href="index.php">Sair</a>
        </div>
        <h2 class="pagina__titulo">Gerenciamento de Alunos</h2>
        <form action="painel-alunos.php" method="POST" class="pagina__formulario form">
            <fieldset>

                <label for="alunos-matricula" class="form__label">Matricula:</label>
                <input type="text" name="alunos-matricula" id="alunos-matricula" class="pagina-aluno__input form__input" placeholder="Insira a matricula do aluno..." required>

                <label for="alunos-nota" class="form__label">Nota:</label>
                <input type="text" name="alunos-nota" id="alunos-nota" class="pagina-aluno__input form__input" placeholder="Insira a nota do aluno..." required>
            </fieldset>
            <fieldset>
                <label for="alunos-nome" class="form__label">Nome:</label>
                <input type="text" name="alunos-nome" id="alunos-nome" class="pagina-aluno__input form__input" placeholder="Insira o nome do aluno..." required>

                <label for="alunos-turma" class="form__label">Turma:</label>
                <input type="text" name="alunos-turma" id="alunos-turma" class="pagina-aluno__input form__input" placeholder="Insira a turma do aluno..." required>
                <button type="submit" class="pagina-alunos__botao--adicionar form__botao">Adicionar Aluno</button>
            </fieldset>
        </form>
        <table class="pagina-alunos__tabela">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Turma</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody id="lista-alunos">
                <?php
                while ($rows = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $rows['nome'] . "</td>";
                    echo "<td>" . $rows['turma'] . "</td>";
                    echo "<td>
                                <div class='pagina-alunos__acoes'>
                                    <a class='acoes__botao acoes__botao--editar' href='painel-edicao.php?id=" . $rows['id'] . "' title='Editar'></a>
                                    <a class='acoes__botao acoes__botao--deletar' href='deletar.php?id=" . $rows['id'] . "' title='Deletar'></a>
                                    <button class='acoes__botao acoes__botao--visualizar' onclick='abrirModal(this)' aluno-id='" . $rows['id'] . "' title='Visualizar'></button>
                                </div>
                            </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div id="overlay"></div>
        <dialog class="modal modal--visualizar" id="modal">
            <div class="modal__conteudo">
                <div>
                    <span id="modal-fechar" class="modal__fechar">&times;</span>
                </div>
                <h3 class="modal__titulo">Visualizar Aluno</h3>
                <p>Nome: <span class='modal__detalhe' id='detalhe-nome'></span></p>
                <p>Turma: <span class='modal__detalhe' id='detalhe-turma'></span></p>
                <p>Matrícula: <span class='modal__detalhe' id='detalhe-matricula'></span></p>
                <p>Nota: <span class='modal__detalhe' id='detalhe-nota'></span></p>
            </div>
        </dialog>
    </main>
    <script src="assets/js/main.js"></script>
</body>

</html>