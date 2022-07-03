<?php

class TipoDeDocumento{
    private  $_idTipoDeDocumento;
    private  $_descripcionTipoDeDocumento;

    public function __construct($idTipoDeDocumento,$descripcionTipoDeDocumento)
    {
        $this->_idTipoDeDocumento = $idTipoDeDocumento;
        $this->_descripcionTipoDeDocumento = $descripcionTipoDeDocumento;
    }
    //SETTERS   
    public function setIdTipoDeDocumento($idTipoDeDocumento){
        $this->_idTipoDeDocumento = $idTipoDeDocumento;
    }
    public function setDescripcionTipoDeDocumento($descripcionTipoDeDocumento){
        $this->_descripcionTipoDeDocumento = $descripcionTipoDeDocumento;
    }
    //GETTERS
    public function getIdTipoDeDocumento(){
        return $this->_idTipoDeDocumento;
    }
    public function getDescripcionTipoDeDocumento(){
        return $this->_descripcionTipoDeDocumento;
    }
    //toString
    public function __toString()
    {
        return $this->_idTipoDeDocumento . '-' . $this->_descripcionTipoDeDocumento;
    }

}



?>