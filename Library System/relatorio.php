<?php
require_once('config.php');

try{
    $stmte = $pdo->query("SELECT * FROM emprestimo");
    $executa = $stmte->execute();

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
                <th>Id</th>
            <th>Curso</th>
            <th>Nome do Aluno</th>
            <th>Data Empréstimo</th>
            <th>Título</td>
            <th>Data Devolução</th>
            <th>Status</td>
            <th colsplan="2" align="center">Opções</th>
        </tr>
</body>
</html>
<?php
if($executa){
    while($reg = $stmte->fetch(PDO::FETCH_OBJ)){
?>
                <tr border="2" align="center">
                <td><?=$reg->id?></td>
                <td><?=$reg->curso?></td>
                <td><?=$reg->nomeAluno?></td>
                <td><?=$reg->dataEmprestimo?></td>
                <td><?=$reg->tituloLivro?></td>
                <td><?=$reg->dataDevolucao?></td>
                <td><?=$reg->situacao?></td>

                <td>
                    <a class="linkse" href="editar.php?id=<?=$reg->id?>">Editar</a>
                        ou
                    <a class="linkse" href="darBaixa.php?id=<?=$reg->id?>"> Dar baixa</a>
    </td>            
                </tr>
<?php
        }  
        print '</table>';
    }else{
        echo 'Erro ao inserir dados';
            }
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
<div class="box">
  <a href="./index.html" class="links-menu">Menu</a> 
  <a href="emprestimo.php" class="links-menu">Novo Registro</a>
</div>