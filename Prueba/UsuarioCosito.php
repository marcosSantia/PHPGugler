<?php

class UsuarioCosito{
    private $_nombreUsuario;
    private $_password;

    public function __construct($nombreUsuario,$password)
    {
        $this->_nombreUsuario= $nombreUsuario;
        $this->_password= $password;
    }

    public function setNombreUsuario($nombreUsuario){
        $this->_nombreUsuario = $nombreUsuario;
    }

    public function setPassword($password){
        $this->_password = $password;
    }

    public function getNombreUsuario(){
        return $this->_nombreUsuario;
    }
    public function getPassword(){
        return $this->_password;
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

    public function  setContraseniaEnmascarada($contrasenia)
    {
        $this->_contrasenia = $contrasenia;
        $contrasenia = str_repeat("*", strlen($contrasenia));
    }
}

?>