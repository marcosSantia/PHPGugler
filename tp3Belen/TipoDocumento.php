<?php

class TipoDocumento
{
    private $_idTipoDocumento;/// 1 2 3 
    private $_descripcion;/// dni lc le

    public function __construct($idTipoDocumento, $descripcion)
    {
        $this->_idTipoDocumento = $idTipoDocumento;
        $this->_descripcion = $descripcion;
    }
    
    public function getIdTipoDocumento()
    {   
        return $this->_idTipoDocumento;
    
        

    }

    public function getDescripcion()
    {

        return $this->_descripcion;
        // $docDescripcion = array (0 => 'DNI', 1 => 'LC', 2 => 'LE');
        // $docDescripcion[0] = 'DNI';
        // $docDescripcion[1] = 'LC';
        // $docDescripcion[2] = 'LE';
        // return $docDescripcion[$this->_descripcion];


    }
    
    public function setIdTipoDocumento($idTipoDocumento)
    {
        $this->_idTipoDocumento = $idTipoDocumento;
    }

    public function setDescripcion($descripcion)
    {
        $this->_descripcion = $descripcion;
    }


    //Metodo toString
    public function __toString()
    {
        return $this->_idTipoDocumento . " - " . $this->_descripcion;
    }

}

?>