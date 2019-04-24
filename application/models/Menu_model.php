<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model{
    
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
}
