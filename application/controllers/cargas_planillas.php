<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for Author group only
 */
class Cargas_planillas extends MY_Controller {	

	protected $access = array("Admin"); 

	public function index()
	{
		$this->default_view();
	}

	public function default_view($data=null){
		try{
			if(!isset($data)){
				$data['error']='';
				$data['upload_succes']=false;
			}
			//if($data['upload_succes']);
			
			$crud = new grocery_CRUD();

			$crud->set_theme('bootstrap');
			$crud->set_language("spanish");
			$crud->avante_options(array('show_operation_bar' => false,'show_operation_bar2' => false));// Avante modificado para pasar 
			$crud->unset_jquery();//$crud->unset_jquery_ui();
			$crud->unset_bootstrap();
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_operations();

			//$crud->set_theme('datatables');
			$crud->set_table('honorarios_listado_detalle');
			$crud->set_subject('Listado Detallado');
			$crud->required_fields('rut');
			$crud->set_field_upload('file_url','assets/uploads/files');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$data['page_title'] = '';
			$data['menu_opt']=2;
			$data['crud']=$output;
			

			$this->load->view("header",$data);		
			$this->load->view("v_menubar",$data);
			$this->load->view("v_cargas_planillas",$data);
			$this->load->view("footer");
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function upload_ajax()
	{
		try{
			$this->load->helper(array('form', 'url'));
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'xls|xlsx';
			$config['max_size']	= '2048';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload()){
				echo $this->upload->display_errors();
			}else{
				echo 1;
			}

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function upload()
	{
		try{
			$this->load->helper(array('form', 'url'));
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'xls|xlsx';
			$config['max_size']	= '2048';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors("<br> <div class='text-center  alert alert-danger alert-dismissible' role='alert'>","</div>"));
				//print_r($error);die();
				$this->default_view((array)$error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());

				//$this->load->view('upload_success', $data);
				$data['upload_succes']=true;
				$this->default_view($data);

			}
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}




}