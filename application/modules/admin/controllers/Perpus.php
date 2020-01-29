<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Perpus extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('Perpus_model');
            $this->load->library('form_validation');
	    $method=$this->router->fetch_method();
            // if($method != 'ajax_list'){
            //   if($this->session->userdata('status')!='login'){
            //     redirect(base_url('login'));
            //   }
            // }
        }

        public function index()
        {$dataperpus=$this->Perpus_model->get_all();//panggil ke modell
          $datafield=$this->Perpus_model->get_field();//panggil ke modell

           $data = array(
             'content'=>'admin/perpus/perpus_list',
             'sidebar'=>'admin/sidebar',
             'css'=>'admin/perpus/css',
             'js'=>'admin/perpus/js',
             'dataperpus'=>$dataperpus,
             'datafield'=>$datafield,
             'module'=>'admin',
             'titlePage'=>'perpus',
             'controller'=>'perpus'
            );
          $this->template->load($data);
        }

        //DataTable
        public function ajax_list()
      {
          $list = $this->Perpus_model->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $Perpus_model) {
              $no++;
              $row = array();
              $row[] = $no;
							$row[] = $Perpus_model->NAMA_P;
							$row[] = $Perpus_model->slug;
							$row[] = $Perpus_model->ALAMAT_P;
							$row[] = $Perpus_model->ABOUT;
							$row[] = $Perpus_model->DESKRIPSI;
							$row[] = $Perpus_model->GAMBAR;
							$row[] = $Perpus_model->STATUS_PAKET;
							
              $row[] ="
              <a href='perpus/edit/$Perpus_model->ID_PERPUS'><i class='m-1 feather icon-edit-2'></i></a>
              <a class='modalDelete' data-toggle='modal' data-target='#responsive-modal' value='$Perpus_model->ID_PERPUS' href='#'><i class='feather icon-trash'></i></a>";
              $data[] = $row;
          }

          $output = array(
                          "draw" => $_POST['draw'],
                          "recordsTotal" => $this->Perpus_model->count_all(),
                          "recordsFiltered" => $this->Perpus_model->count_filtered(),
                          "data" => $data,
                  );
          //output to json format
          echo json_encode($output);
      }


        public function create(){
           $data = array(
             'content'=>'admin/perpus/perpus_create',
             'sidebar'=>'admin/sidebar',
             'action'=>'admin/perpus/create_action',
             'module'=>'admin',
             'titlePage'=>'perpus',
             'controller'=>'perpus'
            );
          $this->template->load($data);
        }

        public function edit($ID_PERPUS){
          $dataedit=$this->Perpus_model->get_by_id($ID_PERPUS);
           $data = array(
             'content'=>'admin/perpus/perpus_edit',
             'sidebar'=>'admin/sidebar',
             'action'=>'admin/perpus/update_action',
             'dataedit'=>$dataedit,
             'module'=>'admin',
             'titlePage'=>'perpus',
             'controller'=>'perpus'
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
					'NAMA_P' => $this->input->post('NAMA_P',TRUE),
					'slug' => $this->input->post('slug',TRUE),
					'ALAMAT_P' => $this->input->post('ALAMAT_P',TRUE),
					'ABOUT' => $this->input->post('ABOUT',TRUE),
					'DESKRIPSI' => $this->input->post('DESKRIPSI',TRUE),
					'GAMBAR' => $this->input->post('GAMBAR',TRUE),
					'STATUS_PAKET' => $this->input->post('STATUS_PAKET',TRUE),
					
);

            $this->Perpus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/perpus'));
        }
    }




    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id', TRUE));
        } else {
            $data = array(
					'NAMA_P' => $this->input->post('NAMA_P',TRUE),
					'slug' => $this->input->post('slug',TRUE),
					'ALAMAT_P' => $this->input->post('ALAMAT_P',TRUE),
					'ABOUT' => $this->input->post('ABOUT',TRUE),
					'DESKRIPSI' => $this->input->post('DESKRIPSI',TRUE),
					'GAMBAR' => $this->input->post('GAMBAR',TRUE),
					'STATUS_PAKET' => $this->input->post('STATUS_PAKET',TRUE),
					
);

            $this->Perpus_model->update($this->input->post('ID_PERPUS', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/perpus'));
        }
    }

    public function delete($ID_PERPUS)
    {
        $row = $this->Perpus_model->get_by_id($ID_PERPUS);

        if ($row) {
            $this->Perpus_model->delete($ID_PERPUS);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/perpus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/perpus'));
        }
    }

    public function _rules()
    {
$this->form_validation->set_rules('NAMA_P', 'NAMA_P', 'trim|required');
$this->form_validation->set_rules('slug', 'slug', 'trim|required');
$this->form_validation->set_rules('ALAMAT_P', 'ALAMAT_P', 'trim|required');
$this->form_validation->set_rules('ABOUT', 'ABOUT', 'trim|required');
$this->form_validation->set_rules('DESKRIPSI', 'DESKRIPSI', 'trim|required');
$this->form_validation->set_rules('GAMBAR', 'GAMBAR', 'trim|required');
$this->form_validation->set_rules('STATUS_PAKET', 'STATUS_PAKET', 'trim|required');


	$this->form_validation->set_rules('ID_PERPUS', 'ID_PERPUS', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

    }

}