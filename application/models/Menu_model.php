<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }


    public function getMurid()
    {
    	$query = "SELECT `user`.*, `user_role`.`role`
                  FROM `user` JOIN `user_role`
                  ON `user`.`role_id` = `user_role`.`id`
                ";
        return $this->db->query($query)->result_array();
    }


    public function getHapusPHP($id) 
    {
      $this->db->where('id', $id);
      $this->db->delete('tabel_php');
    }


    public function getHapusJS($id) 
    {
      $this->db->where('id', $id);
      $this->db->delete('tabel_js');
    }

    public function getHapusHC($id) 
    {
      $this->db->where('id', $id);
      $this->db->delete('tabel_html_css');
    }

    public function getHapusMenu($id) 
    {
      $this->db->where('id', $id);
      $this->db->delete('user_menu');
    }

    public function getHapusSubMenu($id) 
    {
      $this->db->where('id', $id);
      $this->db->delete('user_sub_menu');
    }

     public function getHapusRole($id) 
    {
      $this->db->where('id', $id);
      $this->db->delete('user_role');
    }

     public function getEditMenu() 
    {
      $this->db->set('menu', $this->input->post('menu'));
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('user_menu');
    }


     public function getEditRole() 
    {
      $this->db->set('role', $this->input->post('role'));
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('user_role');
    }

      public function getEditSubMenu() 
    {
      $id = $this->input->post('id');
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
     ];
     $this->db->where('id', $id);
     $this->db->update('user_sub_menu', $data);
    }


    public function getEditP()
    {
      $name = $this->input->post('name');

      //pengecekan image
      $image = $_FILES['image']['name'];

      if ($image) {
         $config['allowed_types'] = 'gif|jpg|png';
         $config['max_size']      = '2048';
         $config['upload_path'] = './assets/img/php/';

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('image')) {
            $new_image = $this->upload->data('file_name');
           $this->db->set('image', $image);

         } else{
           $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas gagal di update!</div>');
          redirect('prograte/tabelindex/');
         } 
          $this->db->where('name', $name);
          $this->db->update('tabel_php');

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas telah di update!</div>');
          redirect('prograte/tabelindex/');
      }
    }


  public function getEditJs()
    {
      $name = $this->input->post('name');

      //pengecekan image
      $image = $_FILES['image']['name'];

      if ($image) {
         $config['allowed_types'] = 'gif|jpg|png';
         $config['max_size']      = '2048';
         $config['upload_path'] = './assets/img/js/';

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('image')) {
            $new_image = $this->upload->data('file_name');
           $this->db->set('image', $image);

         } else{
           $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas gagal di update!</div>');
          redirect('prograte/tabeljs/');
         } 
          $this->db->where('name', $name);
          $this->db->update('tabel_js');

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas telah di update!</div>');
          redirect('prograte/tabeljs/');
      }
    }


     public function getEditHC()
    {
      $name = $this->input->post('name');

      //pengecekan image
      $image = $_FILES['image']['name'];

      if ($image) {
         $config['allowed_types'] = 'gif|jpg|png';
         $config['max_size']      = '2048';
         $config['upload_path'] = './assets/img/hc/';

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('image')) {
            $new_image = $this->upload->data('file_name');
           $this->db->set('image', $image);

         } else{
           $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas gagal di update!</div>');
          redirect('prograte/tabelhc/');
         } 
          $this->db->where('name', $name);
          $this->db->update('tabel_html_css');

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas telah di update!</div>');
          redirect('prograte/tabelhc/');
      }
    }



}