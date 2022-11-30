<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanan extends CI_Model{

   public function get_data($pesanan)
   {
      return $this->db->get($pesanan);
   }

   public function insert_data($data, $table)
   {  
      $this->db->insert($table, $data);
   }

  
   public function update_data($data, $table)
   {  
      $this->db->where('id_pesanan', $data['id_pesanan']);
      $this->db->update($table, $data);
   }

   public function hapus($where, $table)
   {
      $this->db->where($where);
      $this->db->delete($table);
   }
}

?>