<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimo</title>
</head>
<body>
    <div class="box-page">
        <form name="formEmprestimo" method="POST" action="adicionar.php" class="form">
            <label for="curso" class="label">Curso</label>
            <select name="curso" class="input">
                <option name="enf" value="enf">Enfermagem</option>
                <option name="hos" value="hos">Hospedagem</option>
                <option name="inf" value="inf">Informática</option>
                <option name="mod" value="mod">Modelagem</option>
            </select>
            <label class="label">Nome do aluno:</label>
            <input class="input" type="text" name="nomeAluno" id="nomeAluno">
            <label class="label">Data do empréstimo:</label>
            <input class="input" type="date" name="dataEmprestimo" id="dataEmprestimo">
            <label class="label">Nome do Livro:</label>
            <input class="input" type="text" name="tituloLivro" id="tituloLivro">
            <label class="label">Data de Devolução:</label>
            <input class="input" type="date" name="dataDevolucao" id="dataDevolucao"><br>
            <input class="botao" type="submit" name="enviar" value="registrar">
           
        </form>
         <a href="index.html" class="links-voltar">Voltar<a>
</div>
</body>
</html>