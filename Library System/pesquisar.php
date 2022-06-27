<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "biblioteca";
    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    $pesquisar = $_POST['pesquisar'];
    $result_aluno = "SELECT * FROM emprestimo WHERE nomeAluno LIKE '%$pesquisar%' LIMIT 5";
    $resultado_aluno = mysqli_query($conn, $result_aluno);
    
    while($rows_aluno = mysqli_fetch_array($resultado_aluno)){
        
        echo 
        "    ".$rows_aluno["curso"].
        "    ".$rows_aluno["nomeAluno"].
        "  - " .date_format(new DateTime($rows_aluno["dataEmprestimo"]), "d.m.Y").
        "  - " .$rows_aluno["tituloLivro"].
        "  - " .date_format(new DateTime($rows_aluno["dataDevolucao"]), "d.m.Y").
        "  - " .$rows_aluno["situacao"]. 
        "<br>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Relatórios</title>
</head>
<body>
        <table border="2" align="center" class="table-relatorio">
        <tr>
            <th>Curso</th>
            <th>Nome do Aluno</th>
            <th>Data Empréstimo</th>
            <th>Título</td>
            <th>Data Devolução</th>
             <th>Status</td>
        </tr>
</body>
</html>