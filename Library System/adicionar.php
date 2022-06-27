<?php 
    require_once('config.php');
    if(isset($_POST['enviar'])){
     $curso=$_POST['curso'];
     $nomeAluno=$_POST['nomeAluno'];
     $dataEmprestimo=$_POST['dataEmprestimo'];
     $tituloLivro=$_POST['tituloLivro'];
     $dataDevolucao=$_POST['dataDevolucao'];
     $situacao=$_POST['situacao'];
    
    try{
        $stmte = $pdo->prepare("INSERT INTO emprestimo(curso, nomeAluno, dataEmprestimo, tituloLivro, dataDevolucao) VALUES (?,?,?,?,?)");
        $stmte->bindParam(1, $curso, PDO::PARAM_STR);
        $stmte->bindParam(2, $nomeAluno, PDO::PARAM_STR);
        $stmte->bindParam(3, $dataEmprestimo, PDO::PARAM_STR);
        $stmte->bindParam(4, $tituloLivro, PDO::PARAM_STR);
        $stmte->bindParam(5, $dataDevolucao, PDO::PARAM_STR);
        $executa = $stmte->execute();
            if($executa){
                echo "Dados inseridos com sucesso";
                header('location:index.html');
            }else{
                echo "Erro ao inserir os dados";
            }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>