<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->model('M_armada');
   }

   public function index()
   {
      $data['judul'] = 'My Profile';
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/index', $data);
      $this->load->view('templates/footer');
   }

   

   public function booking()
   {
      $data['judul'] = 'Booking';
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/booking', $data);
      $this->load->view('templates/footer');
   }

   public function beranda()
   {
      $data['judul'] = 'Beranda';
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();

      $data['pesanan'] = $this->M_armada->get_data('pesanan')->result();
      $data['menu'] = $this->db->get('user_menu')->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/beranda', $data);
      $this->load->view('templates/footer');
   }

   public function pesanan()
   {
      $data['judul'] = 'Pesanan';
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();

      $data['pesanan'] = $this->M_armada->get_data('pesanan')->result();
      $data['menu'] = $this->db->get('user_menu')->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/booking', $data);
      $this->load->view('templates/footer');
   }


   public function daftar_armada()
   {
      $data['judul'] = 'Daftar Armada';
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();


      $data['menu'] = $this->db->get('user_menu')->row_array();
      $data['armada'] = $this->M_armada->get_data('armada')->result();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/daftar_armada', $data);
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
      $this->load->view('user/tambah_armada', $data);
      $this->load->view('templates/footer');

   }


   public function tambah_booking()
   {
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();
      
      $this->_rules();

      if($this->form_validation->run() == FALSE) {
         $this->pesanan();
      }else {
         $data = array(
            'id_pesanan' => $this->input->post('id_pesanan'),
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
                                       Booking Berhasil
                                       </div>');
         redirect('user/booking');
      }
   }


   public function bayar()
   {
      $data['judul'] = 'Bukti Booking';
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();

      $data['pesanan'] = $this->M_armada->get_data('pesanan')->result();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/bayar', $data);
      $this->load->view('templates/footer');

   }
   // rules booking
   public function _rules()
   {
      $this->form_validation->set_rules('nama_pemesan', 'nama pemesan', 'required', array(
         'required' => 'Harus diisi'
      ));
      $this->form_validation->set_rules('nik', 'nik', 'required', array(
         'required' => 'Harus diisi'
      ));
      $this->form_validation->set_rules('nowa', 'nomor whatsapp', 'required', array(
         'required' => 'Harus diisi'
      ));
      $this->form_validation->set_rules('alamat_pemesan', 'alamat pemesan', 'required', array(
         'required' => 'Harus diisi'
      ));
      $this->form_validation->set_rules('jenis_mobil', 'jenis mobil', 'required', array(
         'required' => 'Harus diisi'
      ));

      $this->form_validation->set_rules('harga', 'tipe', 'required', array(
         'required' => 'Harus diisi'
      ));

      $this->form_validation->set_rules('lama_sewa', 'tipe', 'required', array(
         'required' => 'Harus diisi'
      ));
   }

   // untuk menghapus data
   public function hapus($id_pesanan)
   {
      $where = array('id_pesanan'=>$id_pesanan);

      $this->M_armada->delete($where, 'pesanan');
         $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                                       Data berhasil dihapus
                                       </div>');
         redirect('menu/pesanan');
   }

   // menambahkan data
   public function edit($id_pesanan)
   {
      $this->_rules();
      if ($this->form_validation->run() == FALSE){
         $this->index();
      } else{
         $data = array(
            'id_$id_pesanan' => $id_pesanan,
            'jenis_mobil' => $this->input->post('jenis_mobil'),
            'harga' => $this->input->post('harga'),
            'lama_sewa' => $this->input->post('lama_sewa'),
            // 'supir' => $this->input->post('supir')
         );

         $this->M_armada->update_data($data, 'pesanan');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                       Data berhasil diubah
                                       </div>');
         redirect('menu/armada');
      }
   }

   public function edit_profile()
   {
      $data['judul'] = 'Edit Profile';
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();

      $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');

      if($this->form_validation->run() == FALSE) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('user/edit_profile', $data);
         $this->load->view('templates/footer');

      } else {
         $name = $this->input->post('name');
         $email = $this->input->post('email');

         // cek jika ada gambar yang akan di upload
         $upload_image = $_FILES['image'];
         if($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('image')) {
               $old_image = $data['user']['image'];
               if($old_image != 'default.jpg') {
                  unlink(FCPATH . 'assets/img/profile/' . $old_image);
               }

               $new_image = $this->upload->data('file_name');
               $this->db->set('image', $new_image);
            }else{
               echo $this->upload->display_errors();
            }
         }

         $this->db->set('name', $name);
         $this->db->where('email', $email);
         $this->db->update('user');

         $this->session->set_flashdata('message', 
         '<div class="alert alert-success" role="alert">
            Profile anda berhasil di ubah
         </div>');
         redirect('user');
      }
   }

      public function changePassword()
   {
      $data['judul'] = 'Change Password';
      $data['user'] = $this->db->get_where('user', ['email' => 
      $this->session->userdata('email')])->row_array();

      $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
      $this->form_validation->set_rules('new_password1', 'New Password', 
      'required|trim|min_length[3]|matches[new_password2]');
      $this->form_validation->set_rules('new_password2', 'Confirm New Password', 
      'required|trim|min_length[3]|matches[new_password1]');

      if($this->form_validation->run() == FALSE) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('user/changepassword', $data);
         $this->load->view('templates/footer');
      } else {
         $current_password = $this->input->post('current_password');
         $new_password = $this->input->post('new_password1');
         if(!password_verify($current_password, $data['user']['password'])) {
            $this->session->set_flashdata('message', 
            '<div class="alert alert-danger" role="alert">
               Password saat ini Salah
            </div>');
            redirect('user/changepassword');
         } else {
            if($current_password == $new_password) {
               $this->session->set_flashdata('message', 
            '<div class="alert alert-danger" role="alert">
               Password tidak boleh sama
            </div>');
            redirect('user/changepassword');
            } else {
               // password sudh ok
               $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
               
               $this->db->set('password', $password_hash);
               $this->db->where('email', $this->session->userdata('email'));
               $this->db->update('user');

               $this->session->set_flashdata('message', 
               '<div class="alert alert-success" role="alert">
                  Password berhasil diganti
               </div>');
               redirect('user/changepassword');
            }
         }
      }
   }

}
