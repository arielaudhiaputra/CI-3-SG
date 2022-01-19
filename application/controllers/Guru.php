<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		is_logged_in();
	}

	public function index() {
		$data ['title'] = "Dashboard";
		$data ['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['murid'] = $this->menu->getMurid();

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('templates/footer');
	}



	public function role(){
		$data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
        	$this->load->view('templates/header', $data);
	        $this->load->view('templates/sidebar', $data);
	        $this->load->view('templates/topbar', $data);
	        $this->load->view('guru/role', $data);
	        $this->load->view('templates/footer');
        }else{
        	$this->db->insert('user_role', ['role' => $this->input->post('role')]);
        	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role baru telah ditambahkan!</div>');
            redirect('guru/role');
        }
	}


	public function roleAccess($role_id) {
		$data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();



		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/roleaccess', $data);
        $this->load->view('templates/footer');
	}



     public function changeAccess() {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }


    public function edit() {
        $this->load->model('Menu_model', 'menu');
        $this->menu->getEditRole();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role telah di edit!</div>');
        redirect('guru/role');
    }


    public function hapusrole($id) {
        $this->load->model('Menu_model', 'menu');
        $this->menu->getHapusRole($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role telah dihapus!</div>');
        redirect('guru/role');
    }
    
}