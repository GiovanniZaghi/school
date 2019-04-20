<?php
$serverhost = "mysql:dbname=school;host=127.0.0.1";
$dbuser = "root";
$dbpass = "root";
try{
    
    $pdo = new PDO($serverhost,$dbuser,$dbpass);

}catch(PDOException $e){
    echo "Falhou: ".$e->getMessage();
}
?>