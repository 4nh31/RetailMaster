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
        $data['componente']=$this->load->view('components/modal', $data,true);


        // Cargar vistas reutilizables
        $data['navbar'] = $this->load->view('components/Navbar', $data, true);

        // Cargar la plantilla principal
        $this->load->view('layouts/template', $data);
    }

    // Inventario para Administrador
    public function inventarioAdmin() {
        $this->verificarSesion();
    
        // Título de la página
        $data['title'] = 'Inventario (Administrador)';

        $data['modal_title'] = 'Eliminar';
        $data['modal_content'] = $this->load->view('retail/modal_eliminar', $data, true); 
        $data['modal_title2'] = 'Agregar_Producto';
        $data['modal_content2'] = $this->load->view('retail/modal_agregarproducto', $data, true); 
    
        // Obtener productos
        $productos = $this->ProductoModel->obtenerProductos();
    
        // Verificar y asignar productos
        $data['productos'] = $productos ? $productos : [];
        $data['componente']=$this->load->view('components/modal', $data,true);
        $data['componente2']=$this->load->view('components/modal', $data,true);


    
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