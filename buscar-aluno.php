<?php
    include_once('conexao.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM alunos WHERE id = $id";
        $result = $connection->query($query);

        if($result->num_rows > 0) {
            $aluno = $result->fetch_assoc();
            echo json_encode($aluno);
        }        
    }
?>