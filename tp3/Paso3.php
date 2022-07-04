<?php 
ini_set("display_errors", "on");
include_once 'Persona.php';
session_start();

$_SESSION['oPersona'] = (isset($_SESSION['oPersona']) == false) ? new Persona() : $_SESSION['oPersona'];

$validarEmail=false;
$validarTelefono=false;
$validarCelular=false;

if ( isset($_POST['bt_paso2']) == true )
{
	$email = ( isset($_POST['email']) == true ) ? $_POST['email'] : '';

	$telefono = ( isset($_POST['telefono']) == true ) ? $_POST['telefono'] : '';

	$celular = ( isset($_POST['celular']) == true ) ? $_POST['celular'] : '';

	$domicilio = ( isset($_POST['domicilio']) == true ) ? $_POST['domicilio'] : '';

	$eleccionProvincia = ( isset($_POST['provincia']) == true ) ? $_POST['provincia'] : '';

	$localidad = ( isset($_POST['localidad']) == true ) ? $_POST['localidad'] : '';
}
////////////////////////////////////////////////////////////
$oEmail=new Contacto(Contacto::TIPO_EMAIL,$email);
if($oEmail->validar()==true){
	$_SESSION['oPersona']->setEmail($oEmail);
	$validarEmail = true;
}


$oTelefono=new Contacto(Contacto::TIPO_TELEFONO,$telefono);
if($oTelefono->validar()== true){
	$_SESSION['oPersona']->setTelefono($oTelefono);
	$validarTelefono=true;
}

$oCelular=new Contacto(Contacto::TIPO_TELEFONO,$celular);
if($oCelular->validar()==true){
	$_SESSION['oPersona']->setCelular($oTelefono);
	$validarCelular=true;
}


$_SESSION['oPersona']->setDomicilio($domicilio);


////////////////////////////////////////////////////////////
//Creo el array tipoProvincia con las provncias dentro
$oEntreRios = new Provincia(1,'Entre Rios');
$oSantaFe = new Provincia(2,'Santa Fe');
$oCordoba = new Provincia(3,'Cordoba');
$oBuenosAires = new Provincia(4,'Buenos Aires');
$oCatamarca = new Provincia(5,'Catamarca');
$oCorrientes = new Provincia(6,'Corrientes');
$aProvincias = array($oEntreRios,$oSantaFe,$oCordoba,$oBuenosAires,$oCatamarca,$oCorrientes);

if($eleccionProvincia=='Entre Rios'){
	$_SESSION['oPersona']->setProvincia($oEntreRios);
}elseif ($eleccionProvincia == 'Santa Fe') {
	$_SESSION['oPersona']->setProvincia($oSantaFe);
}elseif($eleccionProvincia=='Cordoba'){
	$_SESSION['oPersona']->setProvincia($oCordoba);
}elseif($eleccionProvincia=='Buenos Aires'){
	$_SESSION['oPersona']->setProvincia($oBuenosAires);
}elseif($eleccionProvincia=='Catamarca'){
	$_SESSION['oPersona']->setProvincia($oCatamarca);
}elseif($eleccionProvincia=='Corrientes'){
	$_SESSION['oPersona']->setProvincia($oCorrientes);
}

////////////////////////////////////////////////////////////
$_SESSION['oPersona']->setLocalidad($localidad);
////////////////////////////////////////////////////////////

$oUsuario = ($_SESSION['oPersona']->getUsuario());
$password = $oUsuario->getPassword();






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
	
	<?php if($validarEmail == false || $validarCelular ==false || $validarTelefono == false) { ?>
		<div class="mensaje">
			<h3>Existen algunos errores al procesar la información ingresada</h3>
			<ul>
				<?php if ( $validarEmail == false ) { ?>
					<li>El correo electrónico no es válido. Debe contener un símbolo "@"</li>
				<?php } if ( $validarTelefono == false ) { ?>
					<li>El teléfono no es válido. Debe contener al menos 10 dígitos y estar separado por un "-"</li>
				<?php } if ( $validarCelular == false ) { ?>
					<li>El celular no es válido. Debe contener al menos 10 dígitos y estar separado por un "-"</li>
				<?php } ?>
			</ul>
			<div class="buttons">
				<input type="button" value="Anterior" onclick="document.location='Paso2.php'">
			</div>
		</div>		
	<?php } else { ?>
		<h2>Informacion de alta de usuario</h2>
		
		<div class="ultimo_paso">
			
			<fieldset>
				<legend>Informacion Personal:</legend>
				
				<ul>
					<li><label>Nombre de Usuario:</label></li>
					<li><?php echo (($_SESSION['oPersona']->getUsuario())->getNombreUsuario()); ?><br></li>
					
					<li><label>Contraseña:</label></li>
					<li><?php 
					echo ($oUsuario->getContraseniaEnmascarada($password)); 
					?><br></li>
					
					<li><label>Apellido:</label></li>
					<li><?php echo $_SESSION['oPersona']->getApellido(); ?></li>
					
					<li><label>Nombre:</label></li>
					<li><?php echo $_SESSION['oPersona']->getNombre(); ?></li>
					
					<li><label>Tipo de Documento:</label></li>
					<li><?php echo ($_SESSION['oPersona']->getTipoDocumento())->getDescripcion(); ?></li>
					
					<li><label>Numero de Documento:</label></li>
					<li><?php echo $_SESSION['oPersona']->getNumeroDocumento(); ?></li>
					
					<li><label>Sexo:</label></li>
					<li><?php echo ($_SESSION['oPersona']->getSexo())->getDescripcion(); ?></li>
					
					<li><label>Nacionalidad:</label></li>
					<li><?php echo $_SESSION['oPersona']->getNacionalidad(); ?></li>
				</ul>
				
			</fieldset>
			
			<fieldset>
				<legend>Informacion de Contacto:</legend>
				
				<ul>
					<li><label>Correo electronico:</label></li>
					<li><?php echo ($_SESSION['oPersona']->getEmail()); ?></li>
					
					<li><label>Telefono:</label></li>
					<li><?php echo $_SESSION['oPersona']->getTelefono(); ?></li>
					
					<li><label>Celular:</label></li>
					<li><?php echo ($_SESSION['oPersona']->getCelular()); ?></li>
					
					<li><label>Domicilio:</label></li>
					<li><?php echo $_SESSION['oPersona']->getDomicilio(); ?></li>
					
					<li><label>Provincia:</label></li>
					<li><?php echo ($_SESSION['oPersona']->getProvincia())->getDescripcion(); ?></li>
					
					<li><label>Localidad:</label></li>
					<li><?php echo $_SESSION['oPersona']->getLocalidad(); ?></li>
				</ul>
				
			</fieldset>
			
			<fieldset>
			
				<div class="buttons">
					<input type="button" value="Guardar" onclick="document.location='Finalizar.php'">
					<input type="button" value="Anterior" onclick="document.location='Paso2.php'">
				</div>
				
			</fieldset>
			
		</div>



	<?php } ?>


	
	<div class="push"></div>
	
</div>

<?php require_once 'includes/php/footer.php'; ?>
</body>
</html>