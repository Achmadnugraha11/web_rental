<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->model('M_armada');
   }

   public function pelanggan()
   {
      $data['judul'] = 'Pelanggan';
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();

      $data['pelanggan'] = $this->M_user->get_data('user')->result();
      // $data['menu'] = $this->db->get('user_menu')->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer');
   }
}