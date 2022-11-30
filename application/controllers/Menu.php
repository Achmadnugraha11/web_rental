<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      is_logged_in();

      $this->load->model('M_armada');
   }

   public function index()
   {
      $data['judul'] = 'Data Pelanggan';
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();

      
      $data['pelanggan'] = $this->M_armada->get_data('user')->result();
      $data['menu'] = $this->db->get('user_menu')->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer');
   }

   // hapus data pelanggan
   public function hapus_pelanggan($id)
   {
      $where = array('id'=>$id);

      $this->M_armada->delete($where, 'user');
         $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                                       Data berhasil dihapus
                                       </div>');
         redirect('menu/index');
   }


   public function armada()
   {
      $data['judul'] = 'Armada';
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();

      $data['armada'] = $this->M_armada->get_data('armada')->result();
      $data['menu'] = $this->db->get('user_menu')->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/armada', $data);
      $this->load->view('templates/footer');
   }


   public function tambah()
   {
      $data['judul'] = 'Tambah Armada';
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/tambah_armada', $data);
      $this->load->view('templates/footer');

   }

   public function tambah_aksi()
   {
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();
      
      $this->_rules();

      if($this->form_validation->run() == FALSE) {
         $this->tambah();
      }else {
         $data = array(
            'id_mobil' => $this->input->post('id_mobil'),
            'jenis_mobil' => $this->input->post('jenis_mobil'),
            'harga' => $this->input->post('harga'),
            'lama_sewa' => $this->input->post('lama_sewa'),
            'supir' => $this->input->post('supir')
         );

         $this->M_armada->insert_data($data, 'armada');
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                       Data berhasil ditambahkan
                                       </div>');
         redirect('menu/armada');
      }
      
   }

   public function edit($id_mobil)
   {
      $this->_rules();
      if ($this->form_validation->run() == FALSE){
         $this->index();
      } else{
         $data = array(
            'id_mobil' => $id_mobil,
            'jenis_mobil' => $this->input->post('jenis_mobil'),
            'harga' => $this->input->post('harga'),
            'lama_sewa' => $this->input->post('lama_sewa'),
            'supir' => $this->input->post('supir')
         );

         $this->M_armada->update_data($data, 'armada');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                       Data berhasil diubah
                                       </div>');
         redirect('menu/armada');
      }
   }

   // rules armada
   public function _rules()
   {
      
      $this->form_validation->set_rules('jenis_mobil', 'jenis mobil', 'required', array(
         'required' => 'Harus diisi'
      ));

      $this->form_validation->set_rules('harga', 'tipe', 'required', array(
         'required' => 'Harus diisi'
      ));

      $this->form_validation->set_rules('lama_sewa', 'tipe', 'required', array(
         'required' => 'Harus diisi'
      ));

      $this->form_validation->set_rules('supir', 'tipe', 'required', array(
         'required' => 'Harus diisi'
      ));
   }

   public function delete($id_mobil)
   {
      $where = array('id_mobil'=>$id_mobil);

      $this->M_armada->delete($where, 'armada');
         $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                                       Data berhasil dihapus
                                       </div>');
         redirect('menu/armada');
   }

   public function pesanan()
   {
      $data['judul'] = 'Data Pesanan';
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();

      $data['pesanan'] = $this->M_armada->get_data('pesanan')->result();
      $data['menu'] = $this->db->get('user_menu')->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/pesanan', $data);
      $this->load->view('templates/footer');
   }

   public function tambah_pesan()
   {
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();
      
      $this->_rules();

      if($this->form_validation->run() == FALSE) {
         $this->tambah();
      }else {
         $data = array(
            'id_pesan' => $this->input->post('id_pesan'),
            'nama_pemesan' => $this->input->post('nama_pemesan'),
            'nik' => $this->input->post('nik'),
            'nowa' => $this->input->post('nowa'),
            'alamat_pemesan' => $this->input->post('alamat_pemesan'),
            'jenis_mobil' => $this->input->post('jenis_mobil'),
            'harga' => $this->input->post('harga'),
            'lama_sewa' => $this->input->post('lama_sewa')
         );

         $this->M_armada->insert_data($data, 'pesanan');
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                       Data berhasil ditambahkan
                                       </div>');
         redirect('menu/pesanan');
      }
   }
}