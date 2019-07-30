<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

    public function __construct(){

        parent::__construct();
        is_logged_in() ; 
        $this->load->model('Searching_model');
      }
      
    //memangggil method constructor s
    public function index(){

        $data['title'] = 'PESAN';
        $data['title2'] = 'LAPANGAN';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();
    
         # Load Model 
        $this->load->model('Menu_model','menu');

         # Buat Load Data Lapangan Dari Database.
        // $data['lapangan'] = $this->db->get('lapangan')->result_array();
        $data['lapangan'] = $this->Searching_model->cariDataLapangan();

        
         # Menampilkan Nama Owner
        $data['name'] = $this->db->get('user')->result_array();

         # Ini Buat Searching
      
         # Form

        $this->load->view('templates/home_header',$data);
        $this->load->view('templates/home_navbar',$data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/home_footer');
    }   

    public function profile(){

        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();

        //echo 'Selamat Datang ' . $data['user']['name'];

        $this->load->view('templates/home_header',$data);
        $this->load->view('templates/home_navbar',$data);
        // #$this->load->view('templates/user_sidebar',$data);
        // #$this->load->view('templates/user_topbar',$data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/home_footer');
    }
    
    public function edit(){
        
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            # code...
            
            //echo 'Selamat Datang ' . $data['user']['name']
            $this->load->view('templates/home_header',$data);
            $this->load->view('templates/home_navbar',$data);   
            $this->load->view('user/edit', $data);
            $this->load->view('templates/home_footer');
        } else {
            # code...
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');

            # Cek jika ada foto yang mau diupload
            $upload_image = $_FILES['image'];
            
            if ($upload_image) {
                # code...
                $config['upload_path']      = './assets/img/profile/';
                $config['allowed_types']    = 'gif|jpg|png';
                $config['max_size']         = '2048';
                # $config['max_width']        = '1024';
                # $config['max_height']       = '768';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    # code... Ambil nama gambar baru 
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        # code...
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    # code...
                    echo $this->upload->display_errors();
                }

            }

            $this->db->set('name', $name);
            $this->db->set('alamat', $alamat);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message',
            '<div class="alert alert-success" 
                role="alert">
                Your Profile Has been Updated !,
                </div>');

            redirect('c_user'); 
        }
    }

    public function changePassword(){

        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();

        //echo 'Selamat Datang ' . $data['user']['name'];
        
        # SETTING CODE CHANGE PASSWORD

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false ) {
            # code...
            $this->load->view('templates/home_header',$data);
            $this->load->view('templates/home_navbar',$data);   
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/home_footer');
        }else{
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            # AMBIL DATA, DAN JIKA PASSWORD TIDAK SSAMA MAKA TERJADI ERROR
            if (!password_verify($current_password, $data['user']['password'])) { 
                # code...
                $this->session->set_flashdata('message',
                '<div class="alert alert-danger" 
                    role="alert">
                    Wrong Current Password
                    </div>');
    
                redirect('c_user/changepassword'); 
            } else {

                if ($current_password == $new_password) {
                    # code...
                    $this->session->set_flashdata('message',
                    '<div class="alert alert-danger" 
                        role="alert">
                        New Password != With CUrrent Password
                        </div>');
        
                    redirect('c_user/changepassword'); 
                }else{
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message',
                    '<div class="alert alert-success" 
                        role="alert">
                        Password Change
                        </div>');
        
                    redirect('c_user/changepassword'); 
                }
            }
        }
    }

    public function booking(){
        
        $data['title'] = "Booking";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();
    
         # Load Model 
        $this->load->model('Menu_model','menu');

         # Ini booking
        $data['booking'] = $this->db->get('booking')->result_array();
         # Menampilkan Nama Owner
        $data['name'] = $this->db->get('user')->result_array();


         # Ini Buat Searching
        if($this->input->post('keyword')){
            $data['lapangan'] = $this->Searching_model->cariDataLapangan();
        }
        
        $this->form_validation->set_rules('lp_kode', 'lp_kode', 'required|trim');
        $this->form_validation->set_rules('lp_nama', 'lp_nama', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'required|trim');
        $this->form_validation->set_rules('harga', 'harga', 'required|trim');
        $this->form_validation->set_rules('jam', 'jam', 'required|trim');
        $this->form_validation->set_rules('waktu', 'waktu', 'required|trim');
        $this->form_validation->set_rules('durasi', 'durasi', 'required|trim');
        $this->form_validation->set_rules('total', 'total', 'required|trim');


        if( $this->form_validation->run() == FALSE){
            $this->load->view('templates/home_header',$data);
            $this->load->view('templates/home_navbar',$data);
            $this->load->view('user/booking', $data);
            $this->load->view('templates/home_footer');
        }else{
            $this->menu->addData();
            // $this->session->set_flashdata('flash', 'Diubah');
            redirect('c_user/booking');
        }
    }

    public function tourney(){

        $data['title'] = "Menantikan Juara !";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();
        $this->load->model('Menu_model','menu');

    
        $data['tourney'] = $this->db->get('turney')->result_array();

        $this->load->view('templates/home_header',$data);
        $this->load->view('templates/home_navbar',$data);
        $this->load->view('user/tourney', $data);
        $this->load->view('templates/home_footer');
    }
    
    public function getAjax($id)
    {
        # code...
        $data = $this->db->get_where('lapangan', array('id'=>$id))->row();
        echo json_encode($data);
    }

    public function getAjaxx($id)
    {
        # code...
        $data = $this->db->get_where('booking', array('id'=>$id))->row();
        echo json_encode($data);
    }
    public function getMore($id)
    {
        # code...
        $data = $this->db->get_where('turney', array('id'=>$id))->row();
        echo json_encode($data);
    }

    
}