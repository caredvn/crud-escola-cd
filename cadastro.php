<?php
    if(isset($_POST['submit'])) 
    {
        include_once('conexao.php');

        $email = $_POST['cadastro-email'];
        $nome = $_POST['cadastro-nome'];
        $usuario = $_POST['cadastro-usuario'];
        $senha = $_POST['cadastro-senha'];

        $result = mysqli_query($connection, "INSERT INTO usuarios(usuario,nome,email,senha) 
        VALUES ('$usuario','$nome','$email','$senha')");

        header('Location: index.php');
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
    <title>Escola CD | Cadastro</title>
</head>
<body>
    <header class="cabecalho">
        <div class="cabecalho__conteudo">
            <img src="assets/img/logo-escola-cd.png" alt="Escola CD logo" class="cabecalho__logo">
            <h1 class="cabecalho__titulo">Escola CD</h1>
        </div>
    </header>
    <main class="pagina-cadastro">
        <section class="cadastro">
            <h2 class="pagina__titulo">Cadastro do Professor</h2>
            <form class="cadastro__formulario form" action="cadastro.php" method="POST">
                <fieldset>
                    <label for="cadastro-email" class="form__label">Informe um e-mail:</label>
                    <input type="email" name="cadastro-email" placeholder="exemplo@email.com" id="cadastro-email" class="cadastro__input form__input" required>

                    <label for="cadastro-nome" class="form__label">Informe o seu nome:</label>
                    <input type="text" name="cadastro-nome" id="cadastro-nome" class="cadastro__input form__input" required>

                    <label for="cadastro-usuario" class="form__label">Informe um nome de usuário:</label>
                    <input type="text" name="cadastro-usuario" id="cadastro-usuario" class="cadastro__input form__input" required>

                    <label for="cadastro-senha" class="form__label">Informe uma senha:</label>
                    <input type="password" name="cadastro-senha" id="cadastro-senha" class="cadastro__input form__input" required>

                    <button href="painel-alunos.php" name="submit" type="submit" target="_blank" id="submit" class="cadastro__botao form__botao">Enviar</button>
                </fieldset>
                <fieldset class="cadastro">
                    <span>Já tem uma conta? <a href="index.php" class="cadastro__link">Entrar</a></span>
                </fieldset>
            </form>
        </section>
    </main>
    <footer class="rodape">
        <p>Designed por: <span><a href="https://github.com/caredvn" target="_blank">Caren Divino</a></span></p>
    </footer>
</body>
<script src="assets/js/main.js"></script>
</html>