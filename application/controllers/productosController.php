<?php defined('BASEPATH') OR exit('No direct script access allowed');

class productosController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProductoModel'); // Cargamos el modelo ProductoModel
    }

    // Método para obtener todos los productos y pasarlos a la vista
    public function index() {
        // Obtener los productos desde el modelo
        $productos = $this->ProductoModel->obtenerProductos();

        // Verificar si se obtuvieron productos
        if ($productos) {
            // Pasamos los productos a la vista 'inventario'
            $data['productos'] = $productos;
            $this->load->view('retail/inventario', $data, true); // Cargamos la vista con los productos
        } else {
            // En caso de que no haya productos, mostramos un mensaje
            $data['productos'] = [];
            $this->load->view('retail/inventario', $data);
        }
    }
}