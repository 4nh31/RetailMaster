<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retailmaster extends CI_Controller {

    function __construct() {
       parent::__construct();
       $this->load->helper(['url', 'form']);
       $this->load->library('session');
       $this->load->model(['empleados', 'ProductoModel']); // Cargar modelos necesarios
    }

    public function index() {
        $this->load->view('retail/login'); 
    }

    public function autenticar() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $usuario = $this->empleados->verificarUsuario($username, $password);

        if ($usuario) {
            $this->session->set_userdata([
                'id_usuario' => $usuario['id_usuario'],
                'usuario'    => $usuario['usuario'],
                'rol'        => $usuario['rol'],
                'logged_in'  => true
            ]);

            // Redirigir según el rol
            if ($usuario['rol'] === 'admin') {
                redirect('retailmaster/dashboard_admin');
            } else {
                redirect('retailmaster/dashboard_ventas');
            }
        } else {
            $this->session->set_flashdata('error', 'Credenciales incorrectas.');
            redirect('retailmaster/index');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('retailmaster/index');
    }

    private function verificarSesion() {
        if (!$this->session->userdata('logged_in')) {
            redirect('retailmaster/index');
        }
    }

    public function dashboard_admin() {
        $this->verificarSesion();
        $this->load->view('retail/admin_dashboard');
    }

    // Ventas
    public function dashboard_ventas() {
       
        //$this->verificarSesion();

        $data =  array();
        // Título de la página
        $data['title'] = 'Ventas';
       
        $data['modal_title'] = 'Generar Corte';
        $data['modal_content'] = $this->load->view('retail/modal_c', $data, true); 
        //CARGAR MODELO BUSCAR
        $data['modal_title2'] = 'Buscar';
        $data['modal_content2'] = $this->load->view('retail/modal_b', $data, true); 
        $data['componente']=$this->load->view('components/modal', $data,true);
        $data['componente2']=$this->load->view('components/modal', $data,true);
        // Cargar la vista de contenido y pasarla como una cadena
        $data['content'] = $this->load->view('retail/ventas', $data, TRUE);
        $data['navbar'] = $this->load->view('components/Navbar',$data,true); 

        // Cargar la plantilla y pasar los datos
        $variable = $this->load->view('layouts/template', $data,true);
        echo $variable;
    }

    public function forgot_password() {
        $this->load->view('retail/forgot_password');
    }

    public function reset_password() {
        $this->load->view('retail/reset_password');
    }

    public function productosNue() {
             // Título de la página
             $data['title'] = 'Productos';
             // Cargar la vista de contenido y pasarla como una cadena
             $data['modal_title2'] = 'Buscar producto a Modificar';
             $data['modal_content2'] = $this->load->view('retail_admin/modal_pmod', $data, true); 
             $data['componente']=$this->load->view('components/modal', $data,true);
             $data['componente2']=$this->load->view('components/modal', $data,true);

              $data['content'] = $this->load->view('retail_admin/productosNuevo', $data, TRUE);
             $data['navbar'] = $this->load->view('components/Navbar',$data,true); 

     
             // Cargar la plantilla y pasar los datos
             $variable=$this->load->view('layouts/template', $data, true);
             echo $variable;
    }
    public function productos() {
        // Obtener los productos de la base de datos
        $data['productos'] = $this->ProductoModel->obtenerProductos();

        // Cargar la vista y pasar los datos de productos
        $this->load->view('retail_admin/productosAccio', $data);
    }
    public function productosAcci(){
         // Título de la página
         $data['title'] = 'Acciones';

         $data['content'] = $this->load->view('retail_admin/productosAcciones', $data, TRUE);
         $data['navbar'] = $this->load->view('components/Navbar',$data,true); 

 
         // Cargar la plantilla y pasar los datos
         $variable=$this->load->view('layouts/template', $data, true);
         echo $variable;
    }

    public function productosMod() {
        //$this->verificarSesion();
        //$this->load->view('retail/productosModificar');
         // Título de la página
         $data['title'] = 'Productos';
         // Cargar la vista de contenido y pasarla como una cadena
         $data['modal_title2'] = 'Buscar producto a Modificar';
         $data['modal_content2'] = $this->load->view('retail_admin/modal_pmod', $data, true); 
         $data['componente']=$this->load->view('components/modal', $data,true);
         $data['componente2']=$this->load->view('components/modal', $data,true);

          $data['content'] = $this->load->view('retail_admin/productosNuevo', $data, TRUE);
         $data['navbar'] = $this->load->view('components/Navbar',$data,true); 

 
         // Cargar la plantilla y pasar los datos
         $variable=$this->load->view('layouts/template', $data, true);
         echo $variable;
    }

    public function productosModificar() {
        $data['productos'] = $this->ProductoModel->obtenerTodosProductos();
        $this->load->view('productosModificar', $data);
    }
    

    public function productosEli() {
        $this->verificarSesion();
        $this->load->view('retail/productosEliminar');
    }

    public function guardarProducto() {
        $this->verificarSesion();
        $data = [
            'id_producto'         => $this->input->post('codigo_barras'),
            'Descripcion'         => $this->input->post('descripcion'),
            'Precio_Costo'        => $this->input->post('precio_costo'),
            'Ganancia_porcentaje' => $this->input->post('ganancia'),
            'Precio_Venta'        => $this->input->post('precio_venta'),
            'Stock'               => $this->input->post('hay')
        ];

        if ($this->ProductoModel->insertarProducto($data)) {
            $this->session->set_flashdata('mensaje', 'Producto guardado con éxito.');
        } else {
            $this->session->set_flashdata('error', 'No se pudo guardar el producto.');
        }

        redirect('retailmaster/productosNue');
    }

    public function buscarProducto() {
        $productoId = $this->input->post('codigo_barras');

        if (!$productoId) {
            $this->session->set_flashdata('error', 'Por favor ingrese un ID de producto.');
            redirect('retailmaster/productosMod');
        }

        $query = $this->db->get_where('productos', ['id_producto' => $productoId]);

        if ($query->num_rows() > 0) {
            $producto = $query->row_array();
            $this->load->view('retail_admin/productosModificar', ['producto' => $producto]);
        } else {
            $this->session->set_flashdata('error', 'Producto no encontrado.');
            redirect('retailmaster/productosMod');
        }
    }


    public function actualizar() {
        $this->verificarSesion();
        $id_producto = $this->input->post('id_producto');
        $data = [
            'Descripcion'         => $this->input->post('descripcion'),
            'Precio_Costo'        => $this->input->post('precio_costo'),
            'Ganancia_porcentaje' => $this->input->post('ganancia'),
            'Precio_Venta'        => $this->input->post('precio_venta'),
            'Stock'               => $this->input->post('hay')
        ];

        if ($this->ProductoModel->actualizarProducto($id_producto, $data)) {
            $this->session->set_flashdata('mensaje', 'Producto actualizado con éxito.');
        } else {
            $this->session->set_flashdata('error', 'No se pudo actualizar el producto.');
        }

        $this->load->view('retail_admin/productosModificar', ['producto' => $id_producto]);
    }

    public function eliminar() {
        $this->verificarSesion();
        $id_producto = $this->input->post('codigo_barras');

        if ($this->ProductoModel->eliminarProducto($id_producto)) {
            $this->session->set_flashdata('mensaje', 'Producto eliminado con éxito.');
        } else {
            $this->session->set_flashdata('error', 'No se pudo eliminar el producto.');
        }

        redirect('retailmaster/productosEli');
    }

    public function inventario(){
        $this->verificarSesion();

        // Título de la página
        $data['title'] = 'Inventario';


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
        
        // Cargar la vista de contenido y pasarla como una cadena
        $data['content'] = $this->load->view('retail/inventario', $data, TRUE);
        $data['navbar'] = $this->load->view('components/Navbar',$data,true); 
        // Cargar la plantilla y pasar los datos
        $variable=$this->load->view('layouts/template', $data, TRUE);
        echo $variable;
    }


    public function productosAcciones() {
        // Obtener productos desde la base de datos
        $data['productos'] = $this->Producto_model->obtenerProductos();  // Obtener los productos

        // Verifica que los productos se hayan recuperado
        if (!$data['productos']) {
            // Si no hay productos, se puede establecer un mensaje o manejar el error
            $data['productos'] = [];  // Evita pasar null
        }

        // Cargar la vista y pasar los datos
        $this->load->view('retail_admin/productosAcciones', $data);
    }
    
}
