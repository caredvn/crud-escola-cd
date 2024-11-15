<?php
    if(!empty($_GET['id']))
    {
        include_once('conexao.php');

        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM alunos WHERE id=$id";
        $result = $connection->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM alunos WHERE id=$id";
            $resultDelete = $connection->query($sqlDelete);
        }
    }
    header('Location: painel-alunos.php');
?>