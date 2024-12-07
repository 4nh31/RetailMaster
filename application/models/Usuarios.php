<?php
class Usuarios extends CI_Model {


    public function getusuarios() {
        $sql    = "SELECT * FROM usuarios WHERE estado != '2'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function guardar_usuario($data){

        /*validación*/

        if(isset($data['nombre']) && !empty($data['nombre'])
            && isset($data['apellido']) && !empty($data['apellido'])
            && isset($data['usuario']) && !empty($data['usuario'])
            && isset($data['pass']) && !empty($data['pass']))
        {
            /*insertar datos y generar contraseña encriptada*/

            $nombre         = $data['nombre'];
            $apellido       = $data['apellido'];
            $usuario        = $data['usuario'];
            $pass           = $data['pass'];


            $Sql = "INSERT INTO usuarios ('nombre', 'apellido','usuario','pass', 'estado') 
                VALUES ('$nombre','$apellido','$usuario','$pass',1)";

            $this->db->query($Sql);

        }
        else{
            /*respuesta error*/
        }
    }




    /*
    public function getLogin($usuario,$password){

        $sql = "SELECT nombre, apellido,usuario 
      FROM usuarios WHERE usuario = '$usuario' 
    AND password = '$password' AND estado = 1 LIMIT 0,1";

        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;


    }*/




}