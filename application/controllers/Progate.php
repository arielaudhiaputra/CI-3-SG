<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progate extends CI_Controller {
	

	public function index() {
		$data ['title'] = "PHP";
		$data ['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
	        $this->load->view('templates/sidebar', $data);
	        $this->load->view('templates/topbar', $data);
	        $this->load->view('prograte/index', $data);
	        $this->load->view('templates/footer');
		} else{
			$name = htmlspecialchars($this->input->post('name', true));

			//cek jika ada gambar yang diupdate
			$image = $_FILES['image']['name'];
			
			if ($image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '3048';
                $config['upload_path'] = './assets/img/php/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                   $image = $this->upload->data('file_name');
                   $this->db->set('image', $image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->insert('tabel_php');
       		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas telah ditambahkan!</div>');
       	    redirect('prograte');
		}
	}


	public function tabelIndex() {
		$data ['title'] = "Progate PHP";
		$data ['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data ['table'] = $this->db->get('tabel_php')->result_array();

		$this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('prograte/tabelindex', $data);
      $this->load->view('templates/footer');
	}






	public function js() {
		$data ['title'] = "JavaScript";
		$data ['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Name' , 'required');



		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
	      $this->load->view('templates/sidebar', $data);
	      $this->load->view('templates/topbar', $data);
	      $this->load->view('prograte/js', $data);
	      $this->load->view('templates/footer');
		} else{
			$name = htmlspecialchars($this->input->post('name', true));

			$image = $_FILES['image']['name'];

			if ($image) {
				$config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '3048';
            $config['upload_path'] = './assets/img/js/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
            	$image = $this->upload->data('file_name');
            	$this->db->set('image', $image);
            } else{
            	$this->upload->dispay_errors();
            }
            $this->db->set('name', $name);
            $this->db->insert('tabel_js');
        		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas telah ditambahkan!</div>');
            redirect('prograte/js');
			}
		}
	}



	public function tabeljs() {
		$data ['title'] = "Progate JavaScript";
		$data ['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data ['table'] = $this->db->get('tabel_js')->result_array();

		$this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('prograte/tabeljs', $data);
      $this->load->view('templates/footer');
	}




	public function hc() {
		$data ['title'] = "HTML & CSS";
		$data ['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
	      $this->load->view('templates/sidebar', $data);
	      $this->load->view('templates/topbar', $data);
	      $this->load->view('prograte/hc', $data);
	      $this->load->view('templates/footer');	
		} else{
			$name = htmlspecialchars($this->input->post('name', true));

			//pengecekan gambar
			$image = $_FILES['image']['name'];
			if ($image) {
				$config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '3048';
            $config['upload_path'] = './assets/img/hc/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
            	$image = $this->upload->data('file_name');
            	$this->db->set('image', $image);
            } else{
            	$this->upload->dispay_errors();
            }
            $this->db->set('name', $name);
            $this->db->insert('tabel_html_css');
        		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas telah ditambahkan!</div>');
            redirect('progate/hc');
			}		
		}
	}


	public function tabelhc() {
		$data ['title'] = "Progate HTML & CSS";
		$data ['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data ['table'] = $this->db->get('tabel_html_css')->result_array();

		$this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('prograte/tabelhc', $data);
      $this->load->view('templates/footer');
	}



	public function hapusphp($id) {
		$this->load->model('Menu_model', 'menu');
		$this->menu->getHapusPHP($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas telah dihapus!</div>');
      redirect('prograte/tabelindex');
	}

	public function hapusjs($id) {
		$this->load->model('Menu_model', 'menu');
		$this->menu->getHapusJS($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas telah dihapus!</div>');
      redirect('prograte/tabeljs');
	}


	public function hapushc($id) {
		$this->load->model('Menu_model', 'menu');
		$this->menu->getHapusHC($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas telah dihapus!</div>');
      redirect('prograte/tabelhc');
	}

	public function edit() {
		$this->load->model('Menu_model', 'menu');
		$this->menu->getEditP();
	}



	public function editjs() {
		$this->load->model('Menu_model', 'menu');
		$this->menu->getEditJs();
	}


	public function edithc() {
		$this->load->model('Menu_model', 'menu');
		$this->menu->getEditHC();
	}


}




	


	










