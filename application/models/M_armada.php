<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_armada extends CI_Model{

   public function get_data($armada)
   {
      return $this->db->get($armada);
   }

   public function insert_data($data, $table)
   {  
      $this->db->insert($table, $data);
   }
   

   public function update_data($data, $table)
   {  
      $this->db->where('id_mobil', $data['id_mobil']);
      $this->db->update($table, $data);
   }

   public function delete($where, $table)
   {
      $this->db->where($where);
      $this->db->delete($table);
   }
   public function hapus_pelanggan($where, $table)
   {
      $this->db->where($where);
      $this->db->delete($table);
   }
}

?>