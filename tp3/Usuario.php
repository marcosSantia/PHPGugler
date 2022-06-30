<?php
ini_set("display_errors", "on");
class Usuario
{
    private $_nombre;
    private $_contrasenia;

    public function __construct($nombre, $contrasenia)
    {
        $this->_nombre = $nombre;
        $this->_contrasenia = $contrasenia;
    }

    //Metodo para validar contraseña con al menos 6 caracteres y un numero y una letra
    public function validarContrasenia($contrasenia)
    {
        if(!preg_match("/^[a-zA-ZñÑ0-9]{6,25}$/",$contrasenia)){
            return false;
        }else{
            return true;
        }
    }


    public function  getContraseniaEnmascarada($contrasenia)
    {
        $this->_contrasenia = $contrasenia;
        $contrasenia = str_repeat("*", strlen($contrasenia));
        return $contrasenia;
    }

    public function getNombre()
    {
        return $this->_nombre;
    }

    public function getContrasenia()
    {
        return $this->_contrasenia;
    }

    //Metodo toString
    public function __toString()
    {
        return $this->_nombre . " - " . $this->_contrasenia;
    }
}

// $oUsuario1 = new Usuario("maycol22","Espectriñ222o9");
// $pass = $oUsuario1->getContrasenia();
// echo $pass;
// echo $oUsuario1->validarContrasenia($pass);
// echo $pass;
// echo $oUsuario1->getContraseniaEnmascarada($pass);
// echo $pass;







?>