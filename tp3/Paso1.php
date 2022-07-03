<?php 
ini_set("display_errors", "on");
session_start();
$_SERVER["DOCUMENT_ROOT"]=dirname(__DIR__);
include_once 'Persona.php';
// include_once 'TipoDocumento.php';
// include_once 'Persona.php';
// include_once 'Usuario.php';
// include_once 'Sexo.php';
// include_once 'Contacto.php';
////////////////////////////////////////////////////////////////////////////
/* CREO EL OBJETO PERSONA */
$oPersona = new Persona();
/* Creo una session llamada oPersona y le asigno el objeto $oPersona*/
$_SESSION['oPersona']=($oPersona);
////////////////////////////////////////////////////////////////////////////
/* Creo el objeto usuario para asignarle lo que se encuentra dentro del Opersona que esta vacio */
$oUsuario = $_SESSION['oPersona']->getUsuario();
$nombreUsuario = ($oUsuario->getNombreUsuario());
$passwordUsuario = ($oUsuario->getPassword());

//crear array con 3 objetos tipoDocumento

$oTipoDNI = new TipoDocumento(1,'DNI');
$oTipoLC = new TipoDocumento(2,'LC');
$oTipoLE = new TipoDocumento(3,'LE');
$aTipoDocumento = array($oTipoDNI,$oTipoLC,$oTipoLE);

// Crear array con 2 objetos Sexo
$oMasculino = new Sexo('M','Masculino');
$oFemenino = new Sexo('F','Femenino');
$aSexo = array($oMasculino,$oFemenino);


///////////////////////////////////////////////////////////////////////


// var_dump($_SESSION['oPersona']->getUsuario());
// $user = new Usuario('cosito123','cosito321');
// $_SESSION['oPersona']->setUsuario($user);
// var_dump($_SESSION['oPersona']->getUsuario());


/* <select name="tipo_documento">
						<option value="<?php echo ($aTipoDocumento[0]) ? 'selected="selected"' : '' ; ?>"  > DNI</option>
						<option value="<?php echo ( $aTipoDocumento[1] ) ? 'selected="selected"' : '' ; ?>"  >LC</option>
						<option value="<?php echo ( $aTipoDocumento[2] ) ? 'selected="selected"' : '' ; ?>"  >LE</option>
					</select> */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Formulario de Inscripc&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER["DOCUMENT_ROOT"].'/tp3/includes/php/header.php'; ?>
	
	<form action="Paso2.php" method="post">
		<fieldset>
			<legend>Informacion Personal:</legend>
			<ul>
				<li><label>Nombre de Usuario:</label></li>
				<li><input  type="text" name="nombre_usuario" value="<?php echo $nombreUsuario ?>"></li>
				
				<li><label>Contraseña:</label></li>
				<li><input 
				
				title="Al menos 6 caracteres, y al menos un número"
				required 
				type="password" 
				name="contrasenia" 
				value="<?php echo $passwordUsuario ?>"></li>
				
				
				<li><label>Apellido:</label></li>
				<li><input  type="text" name="apellido" value="<?php echo $_SESSION['oPersona']->getApellido(); ?>"></li>
				
				<li><label>Nombre:</label></li>
				<li><input  type="text" name="nombre" value="<?php echo $_SESSION['oPersona']->getNombre(); ?>"></li>
				
				<li><label>Tipo de Documento:</label></li>
				<li>
					<select  name="tipo_documento">
						<option value="<?php echo ($aTipoDocumento[0]->getDescripcion()) ; ?>"  >DNI</option>
						<option value="<?php echo ($aTipoDocumento[1]->getDescripcion()) ; ?>"  >LC</option>
						<option value="<?php echo ($aTipoDocumento[2]->getDescripcion()) ; ?>"  >LE</option>
					</select>
				</li>
				
				<li><label>Numero de Documento:</label></li>
				<li><input  type="text" name="numero_documento" value="<?php echo $_SESSION['oPersona']->getNumeroDocumento(); ?>"></li>
				
				<li><label>Sexo:</label></li>
				<li>
					<label  class="radio"><input type="radio" name="sexo" value="<?php echo $aSexo[0]->getIdSexo()  ; ?>"  > Masculino</label>

					<label  class="radio"><input type="radio" name="sexo" value="<?php echo $aSexo[1]->getIdSexo() ; ?>"  > Femenino</label>
				</li>
				
				<li><label>Nacionalidad:</label></li>
				<li><input  type="text" name="nacionalidad" value="<?php echo $_SESSION['oPersona']->getNacionalidad(); ?>"></li>
			</ul>
			
			<div class="buttons">
				<input type="submit" name="bt_paso1" value="Siguiente">
			</div>
		</fieldset>
	</form>
	
	<div class="push"></div>
	
</div>

	<?php require_once $_SERVER["DOCUMENT_ROOT"].'/tp3/includes/php/footer.php'; ?>
</body>
</html>

