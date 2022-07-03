<?php
ini_set('display_erros', 'on');
include_once 'TipoDeDocumento.php';
include_once 'UsuarioCosito.php';
class Persona{
    private string $_apellido;
    private string $_nombre;
    private TipoDeDocumento $_tipoDeDocumento;
    private UsuarioCosito $_usuario;

    public function __construct()
    {
        $this->_tipoDeDocumento = ($oTipoDeDocumento = new TipoDeDocumento('',''));
        $this->_apellido = '';
        $this->_nombre = '';
        $this->_usuario = ($oUsuario = new UsuarioCosito('',''));
    }

    //SETTERS   
    public function setApellido($apellido){
        $this->_apellido = $apellido;
    }
    public function setNombre($nombre){
        $this->_nombre = $nombre;
    }
    public function setTipoDeDocumento(TipoDeDocumento $oTipoDeDocumento){
        $this->_tipoDeDocumento = $oTipoDeDocumento;
    }
    public function setUsuario(UsuarioCosito $oUsuario){
        $this->_usuario = $oUsuario;
    }
    //GETTERS
    public function getApellido(){
        return $this->_apellido;
    }
    public function getNombre(){
        return $this->_nombre;
    }
    public function getTipoDeDocumento(){
        return $this->_tipoDeDocumento;
    }
    public function getUsuario(){
        return $this->_usuario;
    }
}


?>