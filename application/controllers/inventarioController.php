<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inventarioController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
        $this->load->model('ProductoModel'); // Cargar el modelo necesario
    }

    private function verificarSesion() {
        if (!$this->session->userdata('logged_in')) {
            redirect('retailmaster/index');
        }
    }

    public function inventario() {
        $this->verificarSesion();

        // Título de la página
        $data['title'] = 'Inventario';

        // Obtener productos
        $productos = $this->ProductoModel->obtenerProductos();

        // Verificar y asignar productos
        $data['productos'] = $productos ? $productos : [];

        // Cargar vistas reutilizables
        $data['navbar'] = $this->load->view('components/Navbar', $data, true);
        $data['content'] = $this->load->view('retail/inventario', $data, true);

        // Cargar la plantilla principal
        $this->load->view('layouts/template', $data);
    }

    // Inventario para Administrador
    public function inventarioAdmin() {
        $this->verificarSesion();
    
        // Título de la página
        $data['title'] = 'Inventario (Administrador)';
    
        // Obtener productos
        $productos = $this->ProductoModel->obtenerProductos();
    
        // Verificar y asignar productos
        $data['productos'] = $productos ? $productos : [];
    
        // Cargar vistas reutilizables
        $data['navbar'] = $this->load->view('components/Navbar', $data, true);
    
        // Cargar contenido específico para el administrador
        $data['content'] = $this->load->view('retail_admin/inventarioAdmin', $data, true);
    
        // Cargar la plantilla principal
        $this->load->view('layouts/template', $data);
    }
    
    // Eliminar un producto
    public function eliminar($id_producto) {
        // Verificar sesión antes de permitir la acción
        $this->verificarSesion();
    
        // Llamar al modelo para eliminar el producto
        if ($this->ProductoModel->eliminarProducto($id_producto)) {
            // Producto eliminado con éxito
            $this->session->set_flashdata('mensaje', 'Producto eliminado con éxito.');
        } else {
            // Si hay un error al eliminar
            $this->session->set_flashdata('error', 'No se pudo eliminar el producto.');
        }

    }

}