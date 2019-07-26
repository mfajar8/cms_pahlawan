<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pahlawan extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pahlawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datapahlawan=$this->Pahlawan_model->get_all();//panggil ke modell
      $datafield=$this->Pahlawan_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/pahlawan/pahlawan_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datapahlawan'=>$datapahlawan,
        'datafield'=>$datafield,
        'module'=>'admin',
        'titlePage'=>'pahlawan',
        'controller'=>'pahlawan'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/pahlawan/pahlawan_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/pahlawan/create_action',
        'module'=>'admin',
        'titlePage'=>'pahlawan',
        'controller'=>'pahlawan'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Pahlawan_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/pahlawan/pahlawan_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/pahlawan/update_action',
        'dataedit'=>$dataedit,
        'module'=>'admin',
        'titlePage'=>'pahlawan',
        'controller'=>'pahlawan'
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
		'kategori' => $this->input->post('kategori',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'nama_asli' => $this->input->post('nama_asli',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'tempat_wafat' => $this->input->post('tempat_wafat',TRUE),
		'tanggal_wafat' => $this->input->post('tanggal_wafat',TRUE),
		'julukan' => $this->input->post('julukan',TRUE),
		'jasa' => $this->input->post('jasa',TRUE),
		'biografi' => $this->input->post('biografi',TRUE),
	    );

            $this->Pahlawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/pahlawan'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_pahlawan', TRUE));
        } else {
            $data = array(
		'kategori' => $this->input->post('kategori',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'nama_asli' => $this->input->post('nama_asli',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'tempat_wafat' => $this->input->post('tempat_wafat',TRUE),
		'tanggal_wafat' => $this->input->post('tanggal_wafat',TRUE),
		'julukan' => $this->input->post('julukan',TRUE),
		'jasa' => $this->input->post('jasa',TRUE),
		'biografi' => $this->input->post('biografi',TRUE),
	    );

            $this->Pahlawan_model->update($this->input->post('id_pahlawan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/pahlawan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pahlawan_model->get_by_id($id);

        if ($row) {
            $this->Pahlawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/pahlawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pahlawan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nama_asli', 'nama asli', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('tempat_wafat', 'tempat wafat', 'trim|required');
	$this->form_validation->set_rules('tanggal_wafat', 'tanggal wafat', 'trim|required');
	$this->form_validation->set_rules('julukan', 'julukan', 'trim|required');
	$this->form_validation->set_rules('jasa', 'jasa', 'trim|required');
	$this->form_validation->set_rules('biografi', 'biografi', 'trim|required');

	$this->form_validation->set_rules('id_pahlawan', 'id_pahlawan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
