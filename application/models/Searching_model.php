<?php

//<!-- untuk mengelola data mahasiswa -->
defined('BASEPATH') OR exit('No direct script access allowed');

class Searching_model extends CI_model{
    
    public function getAllLapangan(){
        return $this->db->get('lapangan')->result_array();  

    }

    public function cariDataLapangan(){
        
        $keyword = $this->input->post('keyword', true);
            
        // Produces: WHERE `title` LIKE '%match%' ESCAPE '!'
        $this->db->like('lp_kode', $keyword);
        $this->db->or_like('lp_nama', $keyword);
        $this->db->or_like('lokasi', $keyword);
        // $this->db->or_like('email', $keyword);
        // $this->db->or_like('jurusan', $keyword);
    
        return $this->db->get('lapangan')->result_array();
    }

    public function getAdmin(){
        $query = "  SELECT  `lapangan`.*, `user`.`name`
                    FROM    `lapangan` JOIN `user`
                    ON      `lapangan`.`admin_id` = `user`.`id`
                 ";

        return $this->db->query($query)->result_array();
    }

                    
}