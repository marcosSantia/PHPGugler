<?php
ini_set("display_errors", "on");

require_once'TipoDocumento.php';
require_once'Sexo.php';
require_once'Provincia.php';
require_once'Usuario.php';
require_once'Contacto.php';

class Persona{
    private string $_apellido;
    private string $_nombre;
    private int $_numeroDocumento;
    private TipoDocumento $_tipoDocumento;
    private Sexo $_sexo;
    private Usuario $_usuario;
    private string $_nacionalidad;
    private Contacto $_email;
    private Contacto $_telefono;
    private Contacto $_celular;
    private string $_domicilio;
    private Provincia $_provincia;
    private string $_localidad;
    
    //Crear atributo privado con tipo

    
    
    public function __construct()
    {
        $oTipoDocumento = new TipoDocumento('','');
        $oSexo = new Sexo('','');
        $oProvincia = new Provincia('','');
        $oUsuario = new Usuario('','');
        $oEmail = new Contacto('','');
        $oTelefono = new Contacto('','');
        $oCelular = new Contacto('','');

        $this->_tipoDocumento = $oTipoDocumento;
        $this->_sexo = $oSexo;
        $this->_provincia = $oProvincia;
        $this->_usuario = $oUsuario;
        $this->_nacionalidad = '';
        $this->_email = $oEmail;
        $this->_telefono = $oTelefono;
        $this->_celular = $oCelular;
        $this->_nombre = " ";
        $this->_apellidos = " ";
        $this->_numeroDocumento = 0;
        $this->_domicilio = " ";
    }
    //SETTERS
    public function setApellido($apellido)
    {
        $this->_apellido = $apellido;
    }
    public function setNombre($nombre){
        $this->_nombre = $nombre;
    }
    public function setNumeroDocumento($numeroDocumento){
        $this->_numeroDocumento = $numeroDocumento;
    }
    public function setTipoDocumento(TipoDocumento $oTipoDocumento){
        $this->_tipoDocumento = $oTipoDocumento;
    }
    public function setSexo(Sexo $oSexo){
        $this->_sexo = $oSexo;
    }
    public function setUsuario(Usuario $oUsuario){
        $this->_usuario = $oUsuario;
    }
    public function setNacionalidad($nacionalidad){
        $this->_nacionalidad = $nacionalidad;
    }
    public function setEmail(Contacto $oEmail){
        $this->_email = $oEmail;
    }
    public function setTelefono(Contacto $oTelefono){
        $this->_telefono = $oTelefono;
    }
    public function setCelular(Contacto $oCelular){
        $this->_celular = $oCelular;
    }
    public function setDomicilio($domicilio){
        $this->_domicilio = $domicilio;
    }
    public function setProvincia(Provincia $oProvincia){
        $this->_provincia = $oProvincia;
    }
    public function setLocalidad($localidad){
        $this->_localidad = $localidad;
    }
    //GETTERS
    public function getApellido(){
        return $this->_apellido;
    }
    public function getNombre(){
        return $this->_nombre;
    }
    public function getNumeroDocumento(){
        return $this->_numeroDocumento;
    }
    public function getTipoDocumento(){
        return $this->_tipoDocumento;
    }
    public function getSexo(){
        return $this->_sexo;
    }
    public function getUsuario(){
        return $this->_usuario;
    }
    public function getNacionalidad(){
        return $this->_nacionalidad;
    }
    public function getEmail(){
        return $this->_email;
    }
    public function getTelefono(){
        return $this->_telefono;
    }
    public function getCelular(){
        return $this->_celular;
    }
    public function getDomicilio(){
        return $this->_domicilio;
    }
    public function getProvincia(){
        return $this->_provincia;
    }
    public function getLocalidad(){
        return $this->_localidad;
    }
    //Metodo toString
    public function __toString()
    {
        return "Persona: ".$this->_nombre." ".$this->_apellido." ".$this->_numeroDocumento." ".$this->_tipoDocumento." ".$this->_sexo." ".$this->_usuario." ".$this->_email." ".$this->_telefono." ".$this->_celular." ".$this->_domicilio." ".$this->_provincia." ".$this->_localidad;
    }
    
}

// $oPersona = new Persona();
// $oPersona->setApellido("Perez");
// $oPersona->setNombre("Juan");
// $oPersona->setNumeroDocumento(12345678);
// $oPersona->setTipoDocumento(new TipoDocumento("DNI","Documento Nacional de Identidad"));
// $oPersona->setSexo(new Sexo("M","Masculino"));
// $oPersona->setUsuario(new Usuario("jperez","jperez"));
// $oPersona->setNacionalidad("Argentina");
// $oPersona->setEmail(new Contacto(2,'sadadsa@gmail.com'));
// $oPersona->setTelefono(new Contacto(1,"1234567890"));
// $oPersona->setCelular(new Contacto(1,"1234567890"));
// $oPersona->setDomicilio("Av. Siempre Viva");
// $oPersona->setProvincia(new Provincia("Buenos Aires","Buenos Aires"));
// $oPersona->setLocalidad("La Plata");


// $oPersona->__toString();
// echo $oPersona;


?>

