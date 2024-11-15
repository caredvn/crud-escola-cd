<?php
    include_once('conexao.php');

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM alunos WHERE id=$id";
        $result = $connection->query($sqlSelect);
        if ($result->num_rows > 0) {
            while ($rows = mysqli_fetch_array($result)) {
                $nome = $rows['nome'];
                $turma = $rows['turma'];
                $matricula = $rows['matricula'];
                $nota = $rows['nota'];                
            }
        } else {
            header('Location: painel-alunos.php');
        }
    } else {
        header('Location: painel-alunos.php');
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
    <title>Escola CD | Painel de Edição</title>
</head>

<body>
    <header class="cabecalho">
        <div class="cabecalho__conteudo">
            <img src="assets/img/logo-escola-cd.png" alt="Escola CD logo" class="cabecalho__logo">
            <h1 class="cabecalho__titulo">Escola CD</h1>
        </div>
    </header>
    <main class="pagina pagina-edicao">
        <div>
            <a class="pagina__link" href="painel-alunos.php">Voltar</a>
        </div>
        <h2 class="pagina__titulo">Edição de Aluno</h2>
        <form action="editar.php" method="POST" class="pagina-edicao__formulario pagina__formulario form">
            <fieldset>

                <label for="alunos-matricula" class="form__label">Matrícula:</label>
                <input type="text" name="alunos-matricula" id="alunos-matricula" class="pagina-aluno__input form__input" placeholder="Insira a matricula do aluno..." value=<?php echo $matricula; ?> required>

                <label for="alunos-nota" class="form__label">Nota:</label>
                <input type="text" name="alunos-nota" id="alunos-nota" class="pagina-aluno__input form__input" placeholder="Insira a nota do aluno..." value=<?php echo $nota; ?> required>
            </fieldset>
            <fieldset>
                <label for="alunos-nome" class="form__label">Nome:</label>
                <input type="text" name="alunos-nome" id="alunos-nome" class="pagina-aluno__input form__input" placeholder="Insira o nome do aluno..." value=<?php echo $nome; ?> required>

                <label for="alunos-turma" class="form__label">Turma:</label>
                <input type="text" name="alunos-turma" id="alunos-turma" class="pagina-aluno__input form__input" placeholder="Insira a turma do aluno..." value=<?php echo $turma; ?> required>

                <input type="hidden" name="id" value=<?php echo $id; ?>>
                <button type="submit" name="atualizar" class="form__botao">Atualizar Aluno</button>
            </fieldset>
        </form>
    </main>
</body>

</html>