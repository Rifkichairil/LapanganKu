<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model{
    public function __construct(){

        parent::__construct();
  
      }
    
    public function getSubMenu(){

        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                      ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";

            return $this->db->query($query)->result_array();
    }

    public function getAdmin(){
        $query = "  SELECT  `lapangan`.*, `user`.`name`
                    FROM    `lapangan` JOIN `user`
                    ON      `lapangan`.`admin_id` = `user`.`id`
                 ";

        return $this->db->query($query)->result_array();
    }

    public function getAllLapangan(){
        return $this->db->get('lapangan')->result_array();  
    }

    public function addData(){
        $data = array(
            'lp_kode'    => $this->input->post('lp_kode', true),
            'lp_nama'    => $this->input->post('lp_nama', true),
            'lokasi'     => $this->input->post('lokasi', true), 
            'harga'      => $this->input->post('harga', true), 
            'jam'        => $this->input->post('jam', true), 
            'waktu'      => $this->input->post('waktu', true), 
            'durasi'     => $this->input->post('durasi', true), 
            'total'      => $this->input->post('total', true), 
            'unicode'    => $this->input->post('unicode', true), 
            );
        $this->db->insert('booking', $data);
    }

    public function getTourney($id){
        return $this->db->get_where('turney', ['id' => $id])->row_array();
    }

    public function save($unicode, $url){
        $this->db->set('unicode',$unicode);
        $this->db->set('file',$url);
        $this->db->insert('test');
    }
}
