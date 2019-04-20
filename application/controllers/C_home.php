<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

    public function __construct(){

        parent::__construct();

        is_logged_in();
    }

    //memangggil method constructor s
    public function index(){

        $data['title'] = 'Home Ini';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();

        //echo 'Selamat Datang ' . $data['user']['name'];

        $this->load->view('templates/home_header',$data);
        $this->load->view('templates/home_navbar',$data);
        // #$this->load->view('templates/user_sidebar',$data);
        // #$this->load->view('templates/user_topbar',$data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/home_footer');
    }
}