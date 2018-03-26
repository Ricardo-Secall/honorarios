<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for Author group only
 */
class Consultas extends MY_Controller {	

	protected $access = array("Admin","Medicos"); 

	public function index()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('bootstrap');
			$crud->set_language("spanish");
			$crud->avante_options(array('show_operation_bar' => false,'show_operation_bar2' => true));// Avante modificado para pasar 
			$crud->unset_jquery();//$crud->unset_jquery_ui();
			$crud->unset_bootstrap();
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			//$crud->unset_operations();

			//$crud->set_theme('datatables');
			$crud->set_table('honorarios_listado_detalle');
			$crud->set_subject('Listado Detallado');
			$crud->required_fields('rut');
			$crud->set_field_upload('file_url','assets/uploads/files');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();
			$data['page_title'] = '';
			$data['menu_opt']=1;
			$data['crud']=$output;

			$this->load->view("header",$data);		
			$this->load->view("v_menubar");
			$this->load->view("v_consultas",$data);
			$this->load->view("footer");
			
		}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	

}