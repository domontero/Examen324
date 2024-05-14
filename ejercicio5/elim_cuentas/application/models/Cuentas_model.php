<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuentas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_cuentas() {
        return $this->db->get('cuenta_bancaria')->result_array();
    }

    public function get_cuentaBancaria() {
        $this->db->select('cu.*, pe.nombre,pe.apellido '); 
        $this->db->from('cuenta_bancaria cu');
        $this->db->join('persona pe', 'cu.ci = pe.ci');
        return $this->db->get()->result_array();
    }

    public function eliminar_cuenta($id_cuenta) {
        // Utiliza el ID de la cuenta para eliminarla de la base de datos
        $this->db->where('id_cuenta', $id_cuenta);
        $this->db->delete('cuenta_bancaria');
        //echo("desde cuenta model: "+$id_cuenta);
    }
    

}
