<?php

    require_once('config.php');

    $id=$_GET['id'];

    $sth = $pdo->prepare("SELECT id, curso, nomeAluno, dataEmprestimo, tituloLivro, dataDevolucao from emprestimo WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
    $nomeAluno = $reg->nomeAluno;
    $dataEmprestimo = $reg->dataEmprestimo;
    $tituloLivro = $reg->tituloLivro;
    $dataDevolucao = $reg->dataDevolucao;

?>
<div align="center">
        <form name="formEmprestimo" method="POST" >
            <label for="curso">Curso</label>
            <select name="curso">
                <option name="enf" value="enf">Enfermagem</option>
                <option name="hos" value="hos">Hospedagem</option>
                <option name="inf" value="inf">Informática</option>
                <option name="mod" value="mod">Modelagem</option>
            </select>
            <label>Nome do aluno:</label>
            <input type="text" name="nomeAluno" id="nomeAluno">
            <label>Data do empréstimo:</label>
            <input type="date" name="dataEmprestimo" id="dataEmprestimo">
            <label>Nome do Livro:</label>
            <input type="text" name="tituloLivro" id="tituloLivro">
            <label>Data de Devolução:</label>
            <input type="date" name="dataDevolucao" id="dataDevolucao">
            <input type="submit" name="enviar" value="Atualizar">
        </form>
</div>

<?php
require_once('config.php');
if(isset($_POST['enviar'])){
    $curso=$_POST['curso'];
    $nomeAluno=$_POST['nomeAluno'];
    $dataEmprestimo=$_POST['dataEmprestimo'];
    $tituloLivro=$_POST['tituloLivro'];
    $dataDevolucao=$_POST['dataDevolucao'];
     
    $sql = "UPDATE emprestimo SET curso = :curso, nomeAluno = :nomeAluno, dataEmprestimo = :dataEmprestimo, tituloLivro = :tituloLivro, dataDevolucao = :dataDevolucao WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    $sth->bindParam(':curso', $_POST['curso'], PDO::PARAM_INT);   
    $sth->bindParam(':nomeAluno', $_POST['nomeAluno'], PDO::PARAM_INT); 
    $sth->bindParam(':dataEmprestimo', $_POST['dataEmprestimo'], PDO::PARAM_INT);   
    $sth->bindParam(':tituloLivro', $_POST['tituloLivro'], PDO::PARAM_INT);   
    $sth->bindParam(':dataDevolucao', $_POST['dataDevolucao'], PDO::PARAM_INT);        
   if($sth->execute()){
        print "<script>alert('Registro alterado com sucesso!');location='relatorio.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
?>
<a href="relatorio.php">Voltar</a>