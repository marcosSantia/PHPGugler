<?php
ini_set("display_errors", "on");
class Contacto
{
    CONST TIPO_TELEFONO = 1;
    CONST TIPO_EMAIL = 2;

    private $_tipo;
    private $_valor;

    public function __construct($tipo, $valor)
    {
        $this->_tipo = $tipo;
        $this->_valor = $valor;
    }

    public function getTipo()
    {
        return $this->_tipo;
    }

    public function getValor()
    {
        return $this->_valor;
    }
    //Validar que contenga al menos 10 dígitos y separado por guiones
        // public function validar($tipo,$valor)
        // {
        //     if ($tipo != self::TIPO_TELEFONO && $tipo != self::TIPO_EMAIL) {
        //         return false;
        //     }else{
        //         if($tipo == self::TIPO_TELEFONO){
        //             //Validar que contenga al menos 10 dígitos y separado por guiones
        //             if(!preg_match("/^[0-9-]{10}$/", $valor)){
        //                 return false;
        //             }else{
        //                 return true;
        //             }                

        //         }elseif($tipo == self::TIPO_EMAIL){
        //             if(!filter_var($valor, FILTER_VALIDATE_EMAIL)){
        //                 return false;
        //             }else{
        //                 return true;
        //             };
        //         }
        //     }
        // }
    private function _validarTelefono($valor)
    {
        $valor = preg_replace('/[^0-9]+/', '', $valor);
        if (strlen($valor) == 10) {
            return true;
        } else {
            return false;
        }
    }            

    private function _validarEmail($valor)
    {
        if (filter_var($valor, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

	public function validar()
	{
		switch ($this->_tipo)
		{
			case self::TIPO_TELEFONO:
				return $this->_validarTelefono($this->_valor);
				break;

			case self::TIPO_EMAIL:
				return $this->_validarEmail($this->_valor);
				break;

			default:
				return false;
		}
	}
    
    
    //Metodos para visulizar constantes
    public function verConstanteTelefono(){
        return self::TIPO_TELEFONO;
    }
    public function verConstanteEmail(){
        return self::TIPO_EMAIL;
    }

    //Metodo toString
    public function __toString()
    {
        return $this->_tipo . " - " . $this->_valor;
    }
}

?>

