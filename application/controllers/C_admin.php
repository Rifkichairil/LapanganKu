<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->model('Searching_model');

        is_logged_in();
    }

    //memangggil method constructor s
    public function index(){

        $data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array(); 

       // $data['name'] = $this->db->get('user')->result_array();
        // $data['subAdmin'] = $this->admin->getAdmin();

        $this->load->model('Menu_model','menu');
        $data['admin'] = $this->menu->getAdmin();
        

        $data['lapangan'] = $this->db->get('lapangan')->result_array();
        $data['name'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('lp_kode', 'Lp_Kode', 'required');
        $this->form_validation->set_rules('lp_nama', 'Lp_Nama', 'required');
        $this->form_validation->set_rules('admin_id', 'admin_id', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');


        if ($this->form_validation->run() == false) {
            //echo 'Selamat Datang ' . $data['user']['name'];

            $this->load->view('templates/user_header',$data);
            $this->load->view('templates/user_sidebar',$data);
            $this->load->view('templates/user_topbar',$data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/user_footer');
        } else {
            # code...
            $data=[
                'lp_kode' => $this->input->post('lp_kode'),
                'lp_nama' => $this->input->post('lp_nama'),
                'admin_id' => $this->input->post('admin_id'),
                'lokasi' => $this->input->post('lokasi'),
                'harga' => $this->input->post('harga')

            ];

            $this->db->insert('lapangan', $data);
            $this->session->set_flashdata('message',
            '<div class="alert alert-success" 
            role="alert">
            New Lapangan Added !
            </div>');
            
            redirect('c_admin');
         }
    }

    public function payment(){
        $data['title'] = 'Payment';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array(); 

        $this->load->model('Menu_model','menu');

        if ($this->form_validation->run() == false) {
            //echo 'Selamat Datang ' . $data['user']['name'];

            $this->load->view('templates/user_header',$data);
            $this->load->view('templates/user_sidebar',$data);
            $this->load->view('templates/user_topbar',$data);
            $this->load->view('admin/payment', $data);
            $this->load->view('templates/user_footer');
        } else {
            # code...
         }
    }
    
    public function role(){
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();
     
        //echo 'Selamat Datang ' . $data['user']['name'];
    
        $this->load->view('templates/user_header',$data);
        $this->load->view('templates/user_sidebar',$data);
        $this->load->view('templates/user_topbar',$data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/user_footer');
        
    }

    public function roleaccess($role_id){
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();

        $data['role'] = $this->db->get_where('user_role', 
             ['id' => $role_id])->row_array();

        $this->db->where('id != 1');

        $data['menu'] = $this->db->get('user_menu')->result_array();
    
        //echo 'Selamat Datang ' . $data['user']['name'];
    
        $this->load->view('templates/user_header',$data);
        $this->load->view('templates/user_sidebar',$data);
        $this->load->view('templates/user_topbar',$data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/user_footer');
        
    }

    public function changeAccess(){
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
   
        $data  = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows () < 1) {
            # code...
            $this->db->insert('user_access_menu', $data);
            
        }else {
            # code...
            $this->db->delete('user_access_menu', $data);   
        }

        $this->session->set_flashdata('message',
        '<div class="alert alert-success" 
            role="alert">
            Access Change 
            </div>');
    }

    public function profile(){

        $data['title'] = 'Profile Admin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();

        //echo 'Selamat Datang ' . $data['user']['name'];

        $this->load->view('templates/user_header',$data);
        $this->load->view('templates/user_sidebar',$data);
        $this->load->view('templates/user_topbar',$data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/user_footer');
    }
    
    public function changePassword(){

        $data['title'] = 'Change Password Admin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();

        //echo 'Selamat Datang ' . $data['user']['name'];
        
        # SETTING CODE CHANGE PASSWORD

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false ) {
            # code...
            $this->load->view('templates/user_header',$data);
            $this->load->view('templates/user_sidebar',$data);
            $this->load->view('templates/user_topbar',$data);
            $this->load->view('admin/changepassword', $data);
            $this->load->view('templates/user_footer');
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
    
                redirect('c_admin/changepassword'); 
            } else {

                if ($current_password == $new_password) {
                    # code...
                    $this->session->set_flashdata('message',
                    '<div class="alert alert-danger" 
                        role="alert">
                        New Password != With CUrrent Password
                        </div>');
        
                    redirect('c_admin/changepassword'); 
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
        
                    redirect('c_admin/changepassword'); 
                }
            }
        }
    }

    public function edit(){
        
        $data['title'] = 'Edit Profile Admin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            # code...
            
            //echo 'Selamat Datang ' . $data['user']['name']
            $this->load->view('templates/user_header',$data);
            $this->load->view('templates/user_sidebar',$data);
            $this->load->view('templates/user_topbar',$data);
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/user_footer');
        } else {
            # code...
            $name = $this->input->post('name');
            $email = $this->input->post('email');

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
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message',
            '<div class="alert alert-success" 
                role="alert">
                Your Profile Has been Updated !,
                </div>');

            redirect('c_admin/profile'); 
        }
    }

    public function tourney(){
        $data['title'] = 'Tourney LapanganKu';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();
        
        $data['admin'] = $this->db->get('turney')->result_array();

        //echo 'Selamat Datang ' . $data['user']['name'];

        $this->form_validation->set_rules('tr_name', 'tr_name', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'required|trim');
        $this->form_validation->set_rules('waktu', 'waktu', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            # code...
            
            //echo 'Selamat Datang ' . $data['user']['name']
            $this->load->view('templates/user_header',$data);
            $this->load->view('templates/user_sidebar',$data);
            $this->load->view('templates/user_topbar',$data);
            $this->load->view('admin/tourney', $data);
            $this->load->view('templates/user_footer');
        } else {
            $data=[
                'tr_name' => $this->input->post('tr_name'),
                'tanggal' => $this->input->post('tanggal'),
                'lokasi' => $this->input->post('lokasi'),
                'waktu' => $this->input->post('waktu'),
            ];

             # Cek jika ada foto yang mau diupload
             $upload_image = $_FILES['image'];
            
             if ($upload_image) {
                 # code...
                 $config['upload_path']      = './assets/img/tourney/';
                 $config['allowed_types']    = 'gif|jpg|png';
                 $config['max_size']         = '2048';

                 $this->load->library('upload', $config);
 
                 if ($this->upload->do_upload('image')) {
                     $new_image = $this->upload->data('file_name');
                     $this->db->set('image', $new_image);
                 } else {
                     # code...
                     echo $this->upload->display_errors();
                 }

            $this->db->insert('turney', $data);            
            redirect('c_admin');

        }
    }

}



}