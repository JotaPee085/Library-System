<?php
    require_once('config.php');

    $id=$_GET['id'];

    $sth = $pdo->prepare("SELECT id, curso, nomeAluno, dataEmprestimo, tituloLivro, dataDevolucao from emprestimo WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR);
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
    $curso = $reg->curso;
    $nomeAluno = $reg-> nomeAluno;
    $dataEmprestimo = $reg->dataEmprestimo;
    $tituloLivro = $reg->tituloLivro;
    $dataDevolucao = $reg->dataDevolucao;
    
?>
<h3>Tem certeza de que deseja excluir o registro <?=$id?>?</h3>
<div align="center">
    Curso : <?=$curso?><br>
    Nome do Aluno: <?=$nomeAluno?><br>
    Data do Emprestimo: <?=$dataEmprestimo?><br>
    Título do Livro: <?=$tituloLivro?><br>
    Data de Devolução: <?=$dataDevolucao?><br>

    <form method="post" action="">
    <input name="id" type="hidden" value="<?=$id?>">
    <input name="enviar" type="submit" value="Excluir!">
    </form>
</div>

<?php
    if(isset($_POST['enviar'])){
    $id = $_POST['id'];
        $sql = "DELETE FROM  emprestimo WHERE id = :id";
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);   
        if($sth->execute()){
            print "<script>alert('Registro excluído com sucesso!');location='relatorio.php';</script>";
        }else{
            print "Erro ao exclur o registro!<br><br>";
        }
    }
?>