<?php
ini_set('display_errors','on');
require_once 'conector.php';


// //finalizar
// // $dbh=null;
// var_dump($dbh);

// // mostrar version de base de datos
// echo $dbh->getAttribute(PDO::ATTR_SERVER_VERSION);


// // info de sistema de BD
// echo $dbh->getAttribute(PDO::ATTR_SERVER_INFO);

// //crear tabla
// $result= $dbh->exec('create database pruebaPDO');
// if(!$result){
//     echo "Error al crear la base de datos: <br>";
//     print_r($dbh->errorInfo());
// }else{
//     echo "Base de datos creada correctamente";
// }


// usar database
// $result= $dbh->exec('USE pruebaPDO');

// //crear tabla
// $sentenciaCreate="CREATE TABLE usuarios
// (
//     idusuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     document INT,
//     apelldio VARCHAR(255),
//     nombre VARCHAR(255),
//     domicilio VARCHAR(255)   
// )
// ;";

// $resultCreate= $dbh->exec($sentenciaCreate);

// if(!$resultCreate){
//     echo "Error al crear la tabla: <br>";
//     print_r($dbh->errorInfo());
// }else{
//     echo "Tabla creada correctamente";
// };

// $sentenciaInsert="INSERT INTO usuarios(document,apelldio,nombre,domicilio) VALUES(12345678,'Perez','Juan','Calle falsa 123')";

// $resultInsert= $dbh->exec($sentenciaInsert);

// if(!$resultInsert){
//     echo "Error al insertar: <br>";
//     print_r($dbh->errorInfo());
// }else{
//     echo "Se realizo el insert con exito.";
// };






?>