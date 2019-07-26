<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Favorite extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Favorite_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datafavorite=$this->Favorite_model->get_all();//panggil ke modell
      $datafield=$this->Favorite_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'Admin/favorite/favorite_list',
        'sidebar'=>'Admin/sidebar',
        'css'=>'Admin/crudassets/css',
        'script'=>'Admin/crudassets/script',
        'datafavorite'=>$datafavorite,
        'datafield'=>$datafield,
        'module'=>'Admin',
        'titlePage'=>'favorite',
        'controller'=>'favorite'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'Admin/favorite/favorite_form',
        'sidebar'=>'Admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'Admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'Admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'Admin/favorite/create_action',
        'module'=>'Admin',
        'titlePage'=>'favorite',
        'controller'=>'favorite'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Favorite_model->get_by_id($id);
      $data = array(
        'contain_view' => 'Admin/favorite/favorite_edit',
        'sidebar'=>'Admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'Admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'Admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'Admin/favorite/update_action',
        'dataedit'=>$dataedit,
        'module'=>'Admin',
        'titlePage'=>'favorite',
        'controller'=>'favorite'
       );
      $this->template->load($data);
    }


    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'id_pahlawan' => $this->input->post('id_pahlawan',TRUE),
	    );

            $this->Favorite_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Admin/favorite'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_favorite', TRUE));
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'id_pahlawan' => $this->input->post('id_pahlawan',TRUE),
	    );

            $this->Favorite_model->update($this->input->post('id_favorite', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Admin/favorite'));
        }
    }

    public function delete($id)
    {
        $row = $this->Favorite_model->get_by_id($id);

        if ($row) {
            $this->Favorite_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Admin/favorite'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Admin/favorite'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('id_pahlawan', 'id pahlawan', 'trim|required');

	$this->form_validation->set_rules('id_favorite', 'id_favorite', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
