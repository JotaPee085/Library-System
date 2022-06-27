<?php
$host = 'localhost';
$db = 'biblioteca';
$user = 'root';
$pass = '';
$sgbd = 'mysql';
$tabela = 'emprestimo';

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
$pdo = new PDO("$sgbd:host=$host; dbname=$db", $user, $pass, $opt);

//echo 'conectado com sucesso<br/>';//

}catch(PDOException $e){
    echo $e->getMessage();
}

?>