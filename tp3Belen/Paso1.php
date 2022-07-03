<?php 
ini_set("display_errors", "on");
session_start();
$_SERVER["DOCUMENT_ROOT"]=dirname(__DIR__);


include_once 'Persona.php';
include_once 'TipoDocumento.php';

$persona = new Persona();
	
 $_SESSION['persona'] = $persona;


 $persona->setNombre(' ');
 $persona->setApellido(' ');
 $persona->setNumeroDocumento(0);
 $persona->setSexo(new Sexo('',''));
 $persona->setNacionalidad(' ');
 $persona -> setTipoDocumento(new TipoDocumento('',''));
 $persona->setEmail(new Contacto('',''));
 $persona->setTelefono(new Contacto('',''));
 $persona->setCelular(new Contacto('',''));
$persona ->setContrasenia(new Usuario('',''));
$persona ->setNombreUsuario(new Usuario('',''));

//  $oTipoDocumentoDNI = new TipoDocumento(1,'DNI');
// $oTipoDocumentoLC = new TipoDocumento(2,'LC');
// $oTipoDocumentoLE = new TipoDocumento(3,'LE');

// $aTipoDocumento = array($oTipoDocumentoDNI,$oTipoDocumentoLC,$oTipoDocumentoLE);


$aSexo = array();
$aSexo[] = new Sexo('M','Masculino');
$aSexo[] = new Sexo('F','Femenino');

	// if(!isset($_SESSION['persona'])){
	// 	$_SESSION['persona'] = $persona;
	// 	$persona->setApellido(' ');
	// 	$persona->setNombre(' ');
	// 	$persona['numero']->setNumeroDocumento(0);
	// 	$persona->setTipoDocumento(new TipoDocumento('',' '));
	// 	$persona->setSexo(new Sexo('',' '));
	// 	 $persona['usuario']->setUsuario(new Usuario('',' '));
	// 	$persona->setNacionalidad(' ');
	// 	$persona->setEmail(new Contacto('',' '));
	// 	$persona->setTelefono(new Contacto('',' '));
	// 	$persona->setCelular(new Contacto('',' '));
	// 	$persona->setDomicilio(' ');
	// }


	// $contrasenia=$ousuario -> getContrasenia();
	// $nombreUsuario=$ousuario->getNombre();


// if(isset($_POST['bt_paso1'])){
// 	$persona['apellido'] = $_POST['apellido'];
// 	$persona['nombre'] = $_POST['nombre'];
// 	$persona['numero_documento'] = $_POST['numero_documento'];
//     $_SESSION["nombreUsuario"] = $_POST["nombreUsuario"];
//     $_SESSION["password"] = $_POST["password"];
//     $_SESSION["apellido"] = $_POST["apellido"];
//     $_SESSION["nombre"] = $_POST["nombre"];
//     $_SESSION["tipoDocumento"] = $_POST["tipoDocumento"];
//     $_SESSION["numeroDocumento"] = $_POST["numeroDocumento"];
//     $_SESSION["sexo"] = $_POST["sexo"];
//     $_SESSION["nacionalidad"] = $_POST["nacionalidad"];
// }



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
			<legend>Informaci&oacute;n Personal:</legend>
			
			<ul>
			<li><label>Nombre:</label></li>
				<li><input type="text" name="nombre" value="<?php echo $persona-> getNombre(); ?>"></li>
				<li><label>Apellido:</label></li>
				<li><input type="text" name="apellido" value="<?php echo $persona -> getApellido(); ?>"></li>
				<li><label>Nombre de Usuario:</label></li>
				<li><input type="text" name="nombre_usuario" value="<?php echo $persona-> getNombreUsuario() ?>"></li>
				
				<li><label>Contrase&ntilde;a:</label></li>
				<li><input type="password" name="contrasenia" value="<?php echo $persona ->getContrasenia() ?>"></li>
				<li><label>N&uacute;mero de Documento:</label></li>
				<li><input type="text" name="numero_documento" value="<?php echo $persona -> getNumeroDocumento() ?>"></li>

				<li><label>Nacionalidad:</label></li>
				<li><input type="text" name="nacionalidad" value="<?php echo $persona ->getNacionalidad() ?>"></li>
				<li><label>Sexo:</label></li>
				<li>
					<label class="radio"><input type="radio" name="sexo" value="M" <?php echo ( $aSexo[0] ) ? 'checked="checked"' : '' ; ?>> Masculino</label>

					<label class="radio"><input type="radio" name="sexo" value="F" <?php echo ( $aSexo[1]) ? 'checked="checked"' : '' ; ?>> Femenino</label>
				</li>
				<li><label>Tipo de Documento:</label></li>
				
				<li>
				<select name="tipoDocumento" id="" >

				<option value="<?php echo ($persona ->getTipoDocumento())  ?>">DNI</option>
				<option value="<?php echo ($persona ->getTipoDocumento())   ?>">LC</option>
				<option value="<?php echo ($persona ->getTipoDocumento())   ?>">LE</option>

					</select>
				</li>
				
				
				
		
				
			
			</ul>
			
			<div class="buttons">
				<input type="submit" name="bt_paso1" value="Siguiente"> 
			</div>
		</fieldset>
	</form>

	
</div>

	<?php require_once $_SERVER["DOCUMENT_ROOT"].'/tp3/includes/php/footer.php'; ?>
</body>
</html>

<!-- /* /opt/lampp/htdocs/PHPGugler */ -->