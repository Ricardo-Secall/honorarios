<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for Author group only
 */
class Genera_cartola extends MY_Controller {	

	protected $access = array("Admin"); 

	public function index()
	{
		$this->default_view();
	}


	/**
	* Chequea la version y devuleve arraeglo Ejemplo array("año"=>2001,"mes"=>5,"version"=>1)
	*
	*
	*/
	public function get_prox_mes(){

		return 4;
	}

	public function genera_pdf($data=null){
		require 'vendor/autoload.php';
		$data["nombre"]="Ricardo";
		$this->load->view("v_formato1",$data);
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
			$crud->set_table('honorarios_listado_detalle_temp');
			$crud->set_subject('Listado Detallado');
			$crud->required_fields('rut');
			$crud->set_field_upload('file_url','assets/uploads/files');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$data['page_title'] = '';
			$data['menu_opt']=2;
			$data['anio']="2018";
			$data['mes']=$this->get_prox_mes();// get

			$data['crud']=$output;
			

			$this->load->view("header",$data);		
			$this->load->view("v_menubar",$data);
			$this->load->view("v_cargas_planillas",$data);
			$this->load->view("footer");
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	/**
	*	Pasos para Generacion de Cartola (Semi transaccional , excepto por la gneracion del PDF)
		1. Chequea si es versión 1, sino version++
	*	2. Crea el arra del MAestro
		3. Recorre el Temporal
		4. 
	*
	*
	*/

	public function genera_cartola2(){
		print_r($this->input->post(NULL, TRUE)); // returns all POST items with XSS filter
		print_r($this->input->post(NULL, FALSE)); // returns all POST items without XSS filter
		//$rut=$this->input->post("rut");
		// Generara pdf en 

	}

	public function genera_cartola_maestro(){
		/*$this->db->trans_start();
		$this->db->query('AN SQL QUERY...');
		$this->db->query('ANOTHER QUERY...');
		$this->db->trans_complete();*/
		$record["observaciones"]=$this->input->post("observaciones");
		$record["archivo_original"]=$this->input->post("archivo_base");die();
	}




}