<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Model
{
    protected $table = 'login';
    protected $primaryKey = 'id_usuario';

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Asegura que la base de datos esté cargada
    }

    public function verificarUsuario($username, $password)
    {
        $this->db->where('usuario', $username);
        $query = $this->db->get($this->table);

        if ($query->num_rows() === 1) {
            $usuario = $query->row_array();
            if (password_verify($password, $usuario['password'])) {
                return $usuario;
            }
        }

        return false;
    }
}
