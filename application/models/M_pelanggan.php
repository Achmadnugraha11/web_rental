<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    public function get_data($pelanggan)
    {
       return $this->db->get('pelanggan');
    }

    public function insert_data($data, $table)
   {  
      $this->db->insert($table, $data);
   }

    public function update_data($data, $table)
   {  
      $this->db->where('id_user', $data['id_user']);
      $this->db->update($table, $data);
   }

   public function hapus_pelanggan($where, $table)
   {
      $this->db->where($where);
      $this->db->delete($table);
   }

    // public function cekData($where = null)
    // {
    //     return $this->db->get_where('user', $where);
    // }

    // public function getUserWhere($where = null)
    // {
    //     return $this->db->get_where('user', $where);
    // }

    // public function cekUserAccess($where = null)
    // {
    //     $this->db->select('*');
    //     $this->db->from('access_menu');
    //     $this->db->where($where);
    //     return $this->db->get();
    // }

    // public function getUserLimit()
    // {
    //     $this->db->select('*');
    //     $this->db->from('user');
    //     $this->db->limit(10, 0);
    //     return $this->db->get();
    // }

}
