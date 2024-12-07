<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Veterinaria extends CI_Controller {


    function __construct()
    {
       parent::__construct();
       $this->load->database();
       $this->load->helper("url");
    }



	public function index()
	{
	    /*sirve para cargar una vista*/
		//AQUI VA LA VISTA PRINCIPA;
        $this->load->view('ventas');
	}
	public function cargarventas()
	{
	    /*sirve para cargar una vista*/
		//AQUI VA LA VISTA PRINCIPA;
        $this->load->view('ventas');
	}

	public function clientes(){
	    echo "ruta de clientes";
    }

    public function mascotas(){
	    echo "ruta de mascotas";
    }

    public function mascotas_historial_medico(){
	    echo "ruta mascotas historial médico";
    }
    public function servicios(){
	    echo "ruta de servicios";

    }
    public function inventario(){
	    echo "ruta de inventario";
    }
    public function ventas(){
        echo "ruta de ventas";

    }

    public function pagos(){
	    echo "ruta de pagos";
    }
    public function citas(){
	    echo "ruta de citas";
    }

    public function usuarios(){

        $data = array();
        $this->load->model('Usuarios');//cargarmos el modelo
        $data['usuarios'] = $this->Usuarios->getusuarios();//accedemos al método del modelo

        //print_r($data['usuarios']);

        $this->load->view('usuarios/listado_usuarios',$data);

    }

    public function agregar_usuario(){
        $data =  array();
        $this->load->view("usuarios/agregar_usuario");
    }
    public function guardar_usuario(){

        print_r($_POST);exit;


        $this->load->model("Usuarios");
        $response           = $this->Usuarios->guardar_usuario($_POST);
        echo $response;

    }



















}
