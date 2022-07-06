<?php

ini_set('display_errors', 1);

$dsn='mysql:host=localhost;dbname=pruebaPDO;port=3306';
$usuario='root';
$pw='';

$dbh=new PDO($dsn,$usuario,$pw);


?>