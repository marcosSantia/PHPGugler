<?php
ini_set("display_errors", "on");
include_once 'Persona.php';
include_once 'TipoDeDocumento.php';
session_start();


$oTipoDNI = new TipoDeDocumento(1,'DNI');
$oTipoLC = new TipoDeDocumento(2,'LC');
$oTipoLE = new TipoDeDocumento(3,'LE');
$aTipoDeDocumento = array($oTipoDNI,$oTipoLC,$oTipoLE);

if(isset($_POST['tipoDocumento'])== true){
    $eleccionTipoDocumento = $_POST['tipoDocumento'];

    if($eleccionTipoDocumento == 'DNI') {
        $aTipoDeDocumento[0]->setDescripcionTipoDeDocumento($eleccionTipoDocumento);
        $_SESSION['oPersona']->setTipoDeDocumento($aTipoDeDocumento[0]);
    }elseif ($eleccionTipoDocumento == "LC") {
        $aTipoDeDocumento[1]->setDescripcionTipoDeDocumento($eleccionTipoDocumento);
        $_SESSION['oPersona']->setTipoDeDocumento($aTipoDeDocumento[1]);

    }elseif($eleccionTipoDocumento == "LE"){
        $aTipoDeDocumento[2]->setDescripcionTipoDeDocumento($eleccionTipoDocumento);
        $_SESSION['oPersona']->setTipoDeDocumento($aTipoDeDocumento[2]);

    }
}


if(isset($_POST['bt_coso1'])== true){
    $_SESSION['oPersona']->setNombre($_POST['nombre']);
    $_SESSION['oPersona']->setApellido($_POST['apellido']);
    
}



echo "<pre>";
var_dump($_SESSION['oPersona']);
echo "</pre>";


?>


