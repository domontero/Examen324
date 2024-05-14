<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuentas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Cuentas_model'); 
        $this->load->helper('url');
    }
    
    public function index() { 
        $data['cuentas'] = $this->Cuentas_model->get_cuentaBancaria(); 
        $this->load->view('cuentas_list', $data);
    }

    public function borrar($id_cuenta) {
        // Cargar el modelo
       // $this->load->model('Cuentas_model');
        //echo("desde cuenta controlador: "+$id_cuenta);
        // Llamar al método en el modelo para eliminar la cuenta
        $this->Cuentas_model->eliminar_cuenta($id_cuenta);
    
        // Redireccionar a la página de listado de cuentas después de la eliminación
        redirect('cuentas/index');
    }
    

}
