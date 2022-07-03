<?php
ini_set("display_errors", "on");

include_once 'Persona.php';
include_once 'TipoDeDocumento.php';
include_once 'UsuarioCosito.php';

session_start();

/* CREO EL OBJETO PERSONA */
$oPersona = new Persona();
/* LO 'METO' EN UNA SESSION */
$_SESSION['oPersona']=$oPersona;

//////////////////////////////////////////////
/* CREO EL OBJETO USUARIO Y GETTEO LO DE LA SESSION PERSONA Y CON ESE GETTER ESTABLEZCO LAS VARIABLES DE LOS ARGUMENTO DEL OBJETO USUARIO PARA LUEGO USARLOS EN EL HTML */
$oUsuarioCosito = $_SESSION['oPersona']->getUsuario();
$nombreUsuario = ($oUsuarioCosito->getNombreUsuario());
$passwordUsuario = ($oUsuarioCosito->getPassword());

//////////////////////////////////////////////

/* DECLARO LOS 3 OBJETOS Y LOS METOS DENTRO DE UN ARRAY */
$oTipoDNI = new TipoDeDocumento(1,'DNI');
$oTipoLC = new TipoDeDocumento(2,'LC');
$oTipoLE = new TipoDeDocumento(3,'LE');
$aTipoDeDocumento = array($oTipoDNI,$oTipoLC,$oTipoLE);

///////////////////////////////////////////////////////////////////////////////////////////////////////


// echo $nombre;
// echo "<pre>";
// var_dump($);
// echo "</pre>";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="coso2.php" method="post">

        Nombre: <input type="text" name="nombre" id="" value="<?php echo ($_SESSION['oPersona']->getNombre()) ?>" ><br>

        Apellido: <input type="text" name="apellido" id="" value="<?php echo ($_SESSION['oPersona']->getNombre()) ?>"><br>

        Nombre de Usuario: <input type="text" name="nombreUsuario" id="" value="<?php echo $nombreUsuario ?>" ><br>

        Contraseña: <input type="password" name="password" id="" value="<?php echo $passwordUsuario ?>"><br>

        Tipo de Documento: 

            <select name="tipoDocumento" id="" >

                <option value="<?php echo (($aTipoDeDocumento[0])->getDescripcionTipoDeDocumento())  ; ?>">DNI</option>
                <option value="<?php echo (($aTipoDeDocumento[1])->getDescripcionTipoDeDocumento())  ; ?>">LC</option>
                <option value="<?php echo (($aTipoDeDocumento[2])->getDescripcionTipoDeDocumento())  ; ?>">LE</option>

            </select>
        <input type="submit" name="bt_coso1" value="SIGUIENTE">
    </form>
</body>
</html>



