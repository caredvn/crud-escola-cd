<?php
    include_once('conexao.php');
    
    if(isset($_POST['atualizar']))
    {
        $id = $_POST['id'];
        $nome = $_POST['alunos-nome'];
        $turma = $_POST['alunos-turma'];
        $matricula = $_POST['alunos-matricula'];
        $nota = $_POST['alunos-nota'];

        $sqlInsert = "UPDATE alunos 
        SET nome='$nome',turma='$turma',matricula='$matricula',nota='$nota'
        WHERE id=$id";
        $result = $connection->query($sqlInsert);
        print_r($result);
    }
    header('Location: painel-alunos.php');    
?>