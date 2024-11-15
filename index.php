<?php
    session_start();
    include_once('conexao.php');

    if(isset($_POST['login'])) 
    {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
    
        $stmt = $connection->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
        $stmt->bind_param("ss", $usuario, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) 
        {
            $row = $result->fetch_assoc();

            if($senha === $row['senha']) 
            {
                $_SESSION['usuario-id'] = $row['id'];
                $_SESSION['usuario'] = $usuario;

                header("Location: painel-alunos.php");
                exit;
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Usuário não encontrado";
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
    <title>Escola CD | Home</title>
</head>
<body>
    <header class="cabecalho">
        <div class="cabecalho__conteudo">
            <img src="assets/img/logo-escola-cd.png" alt="Escola CD logo" class="cabecalho__logo">
            <h1 class="cabecalho__titulo">Escola CD</h1>
        </div>
    </header>
    <main class="pagina-login">
        <section class="login">
            <h2 class="pagina__titulo">Login do Professor</h2>
            <form class="login__formulario form" method="POST">
                <fieldset>
                    <label for="login-usuario" class="form__label">Usuário:</label>
                    <input type="text" name="usuario" placeholder="Insira o nome de usuário..." id="login-usuario" class="login__input form__input" required>

                    <label for="login-senha" class="form__label">Senha:</label>
                    <input type="password" name="senha" placeholder="Insira a senha..." id="login-senha" class="login__input form__input" required>
                    <button href="painel-alunos.php" type="submit" name="login" target="_blank" class="login__botao form__botao">Entrar</button>
                </fieldset>
                
                <fieldset class="cadastro">
                    <span>Ou cadastre-se <a href="cadastro.php" class="cadastro__link">aqui</a>.</span>
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