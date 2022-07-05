<?

ini_set('display_errors', 'on');

$dsn='mysql:dbname=prueba;host=localhost;port=3306';
$usuario='root';
$pw='';

$dbh=new PDO($dsn,$usuario,$pw);


var_dump($dbh);

?>