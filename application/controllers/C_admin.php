<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

    public function __construct(){

        parent::__construct();

        is_logged_in();
    }

    //memangggil method constructor s
    public function index(){

        $data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();

        //echo 'Selamat Datang ' . $data['user']['name'];

        $this->load->view('templates/user_header',$data);
        $this->load->view('templates/user_sidebar',$data);
        $this->load->view('templates/user_topbar',$data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/user_footer');
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
    
}