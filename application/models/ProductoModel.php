<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductoModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Asegura que la base de datos esté cargada
    }

    public function obtenerProductos() {
        // Consulta para obtener todos los productos
        $query = $this->db->get('productos');
        return $query->result(); // Retorna el resultado como un arreglo de objetos
    }
}
