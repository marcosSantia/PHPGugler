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
    public function validar($tipo,$valor)
    {
        if ($tipo != self::TIPO_TELEFONO && $tipo != self::TIPO_EMAIL) {
            return false;
        }else{
            if($tipo == self::TIPO_TELEFONO){
                //Validar que contenga al menos 10 dígitos y separado por guiones
                if(!preg_match("/^[0-9-]{10}$/", $valor)){
                    return false;
                }else{
                    return true;
                }                

            }elseif($tipo == self::TIPO_EMAIL){
                if(!filter_var($valor, FILTER_VALIDATE_EMAIL)){
                    return false;
                }else{
                    return true;
                };
            }
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

// $oContacto1 = new Contacto(2, "maycolsantia@gmail.com");
// $oContacto2 = new Contacto(1, "3442587475");

// // echo $oContacto1->verConstanteEmail();
// // echo $oContacto2->verConstanteTelefono();

// echo $oContacto1->validar(2,"maycolsan@tiagmail.com");


?>




<!--LA DIFERENCIA DE USO entre el constructor y los Setters es que La idea de los setters es poder modificar el estado interno de tu objeto, una vez que ya ha sido construido   -->