<?php 
ini_set("display_errors", "on");

$_SERVER["DOCUMENT_ROOT"]=dirname(__DIR__);

include_once 'Persona.php';
session_start();

$_SESSION['oPersona'] = (isset($_SESSION['oPersona']) == false) ? new Persona() : $_SESSION['oPersona'];

$validarPassword = false;

if ( isset($_POST['bt_paso1']) == true )
{
	$nombreUsuario = ( isset($_POST['nombre_usuario']) == true ) ? $_POST['nombre_usuario'] : '';

	$password = ( isset($_POST['contrasenia']) == true ) ? $_POST['contrasenia'] : '';
	
	$apellido = ( isset($_POST['apellido']) == true ) ? $_POST['apellido'] : '';

	$nombre = ( isset($_POST['nombre']) == true ) ? $_POST['nombre'] : '';
	
	$eleccionTipoDocumento = ( isset($_POST['tipo_documento']) == true ) ? $_POST['tipo_documento'] : '';
	//ESTO DEBE SER SETEADO EN EL OBJETO PERSONA
	$numeroDocumento = ( isset($_POST['numero_documento']) == true ) ? $_POST['numero_documento'] : '';

	//ACA HAY UN OBJETO QUE DEBE SER ASIGNADO A OTRO OBJETO DEL TIPO Sexo(' ',' ');
	$eleccionSexo = ( isset($_POST['sexo']) == true ) ? $_POST['sexo'] : '';

	$nacionalidad = ( isset($_POST['nacionalidad']) == true ) ? $_POST['nacionalidad'] : '';
}
////////////////////////////////////////////////////////////

//crear array con 3 objetos tipoDocumento
$oTipoDNI = new TipoDocumento(1,'DNI');
$oTipoLC = new TipoDocumento(2,'LC');
$oTipoLE = new TipoDocumento(3,'LE');
$aTipoDocumento = array($oTipoDNI,$oTipoLC,$oTipoLE);

// Crear array con 2 objetos Sexo
$oMasculino = new Sexo('M','Masculino');
$oFemenino = new Sexo('F','Femenino');
$aSexo = array($oMasculino,$oFemenino);

////////////////////////////////////////////////////////////
//USUARIO
$oUsuario=new Usuario($nombreUsuario,$password);
if($oUsuario->validarContrasenia()== true){
	$validarPassword = true;
	$_SESSION['oPersona']->setUsuario( $oUsuario);
}
/////////////////////////////////////////////////////////////

$_SESSION['oPersona']->setApellido($apellido);
$_SESSION['oPersona']->setNombre($nombre);

if($eleccionTipoDocumento == 'DNI'){
	$_SESSION['oPersona']->setTipoDocumento($oTipoDNI);
}elseif ($eleccionTipoDocumento == 'LC') {
	$_SESSION['oPersona']->setTipoDocumento($oTipoLC);
}elseif ($eleccionTipoDocumento == 'LE') {
	$_SESSION['oPersona']->setTipoDocumento($oTipoLE);
}

if($eleccionSexo == 'M'){
	$_SESSION['oPersona']->setSexo($oMasculino);
}elseif ($eleccionSexo == 'F') {
	$_SESSION['oPersona']->setSexo($oFemenino);
}

$_SESSION['oPersona']->setNacionalidad($nacionalidad);
////////////////////////////////////////////////////////////
//Creo el array tipoProvincia con las provncias dentro

$oEntreRios = new Provincia(1,'Entre Rios');
$oSantaFe = new Provincia(2,'Santa Fe');
$oCordoba = new Provincia(3,'Cordoba');
$oBuenosAires = new Provincia(4,'Buenos Aires');
$oCatamarca = new Provincia(5,'Catamarca');
$oCorrientes = new Provincia(6,'Corrientes');
$aProvincias = array($oEntreRios,$oSantaFe,$oCordoba,$oBuenosAires,$oCatamarca,$oCorrientes);

////////////////////////////////////////////////////////////


// echo "<pre>";
// var_dump($_SESSION['oPersona']);
// echo "</pre>";

/////////////////////////////////////////////////////////////////////
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

		<?php require_once 'includes/php/header.php'; ?>
		
		<?php if($validarPassword == false) { ?>

			<div class="mensaje">
				<h3>Existen algunos errores al procesar la información ingresada</h3>
				<ul>
					<?php if ( $validarPassword == false ) { ?>
						<li>La contraseña no es válida. Debe contener al menos 6 caracteres y al menos 1 letra y 1 número</li>
					<?php } ?>
				</ul>
				<div class="buttons">
					<input type="button" value="Anterior" onclick="document.location='Paso1.php'">
				</div>
			</div>			

		<?php } else { ?>
			<form action="Paso3.php" method="post">
				<fieldset>
					<legend>Informacion de Contacto:</legend>
					
					<ul>
						<li><label>Correo electronico:</label></li>
						<li><input type="text" name="email" value="<?php echo $_SESSION['oPersona']->getEmail(); ?>"></li>
						
						<li><label>Telefono:</label></li>
						<li><input type="text" name="telefono" value="<?php echo $_SESSION['oPersona']->getTelefono(); ?>"></li>
						
						<li><label>Celular:</label></li>
						<li><input type="text" name="celular" value="<?php echo $_SESSION['oPersona']->getCelular(); ?>"></li>
						
						<li><label>Domicilio:</label></li>
						<li><input type="text" name="domicilio" value="<?php echo $_SESSION['oPersona']->getDomicilio(); ?>"></li>
						
						<li><label>Provincia:</label></li>
						<li>
							<select name="provincia">
								<option value="<?php echo ( $aProvincias[0]->getDescripcion()) ; ?> " >Entre Rios</option>
								<option value="<?php echo ( $aProvincias[1]->getDescripcion()) ; ?>"  >Santa Fe</option>
								<option value="<?php echo ( $aProvincias[2]->getDescripcion()) ; ?>"  >Cordoba</option>
								<option value="<?php echo ( $aProvincias[3]->getDescripcion()) ; ?>"  >Buenos Aires</option>
								<option value="<?php echo ( $aProvincias[4]->getDescripcion()) ; ?>"  >Catamarca</option>
								<option value="<?php echo ( $aProvincias[5]->getDescripcion()) ; ?>"  >Corrientes</option>
							</select>
						</li>
						
						<li><label>Localidad:</label></li>
						<li><input type="text" name="localidad" value="<?php echo $_SESSION['oPersona']->getLocalidad(); ?>"></li>
					</ul>
					
					<div class="buttons">
						<input type="submit" name="bt_paso2" value="Siguiente">
						<input type="button" value="Anterior" onclick="document.location='Paso1.php'">
					</div>
				</fieldset>
			</form>

		<?php } ?>
		




		
		<div class="push"></div>
		
	</div>

<?php require_once 'includes/php/footer.php'; ?>
</body>
</html>