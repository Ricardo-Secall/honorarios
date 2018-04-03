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


	/**
	* Chequea la version y devuleve arraeglo Ejemplo array("año"=>2001,"mes"=>5,"version"=>1)
	*
	*
	*/
	public function get_prox_mes(){

		return 4;
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

	public function genera_cartola(){
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

	public function upload_file() 
	{
		try{
			$this->load->helper(array('form', 'url'));
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'xls|xlsx';
			$config['max_size']	= '2048';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			$config['overwrite']  = TRUE;
			

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload()){
				$respuesta["success"]=0;$respuesta["data1"]=$this->upload->display_errors(); 
				echo json_encode($respuesta);				
			}else{
				$respuesta["success"]=1;$respuesta["data1"]=$this->upload->data('file_name'); 
				echo json_encode($respuesta);
			}

		}catch(Exception $e){
			$respuesta["success"]=0;$respuesta["data1"]=$e->getMessage().' --- '.$e->getTraceAsString(); 
			echo json_encode($respuesta);
			
		}
	}

	public function test($file_name) //lee xls y registra en tabla temporal
	{
		require 'vendor/autoload.php';
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
		$reader->setReadDataOnly(TRUE);
		$spreadsheet = $reader->load("uploads/".$file_name);

		$worksheet = $spreadsheet->getActiveSheet();

		echo '<table>' . PHP_EOL;
		foreach ($worksheet->getRowIterator() as $row) {
			echo '<tr>' . PHP_EOL;
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(FALSE); 
			foreach ($cellIterator as $cell) {
				echo '<td>' .
				$cell->getValue() .
				'</td>' . PHP_EOL;
			}
			echo '</tr>' . PHP_EOL;
		}
		echo '</table>' . PHP_EOL;
	}

	public function valida_estructura($file_name) //lee xls y registra en tabla temporal
	{
		try{

			require 'vendor/autoload.php';
			$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
			$reader->setReadDataOnly(TRUE);
			$spreadsheet = $reader->load("uploads/".$file_name);

			$worksheet = $spreadsheet->getActiveSheet();

			$highestRow = $worksheet->getHighestRow(); // e.g. 10
			$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'


			$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5

			$this->load->model('m_planillas');	
			$data=$this->m_planillas->clear_temporal();
			$record=array();

			for ($row = 1; $row <= $highestRow; ++$row) {
				for ($col = 1; $col <= $highestColumnIndex; ++$col) {
					//$value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
					$value = $worksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
					// Header Detection
					if($row==1){// Es le titulo de la columna ?
						/*
						$data=$this->m_planillas->add_title($row,$value);//almaceno el tiulo dado en cadad id d ecolumna
						if($data["success"]==0){

							return 0;
						}
						*/
					}else{
						$record[$col]=$value;
					}
				}	
				if($row>1){
					//print_r($record);die();
					$respuesta=$this->m_planillas->add_row($record,"temporal");//almaceno el tiulo dado en cadad id d ecolumna

					if($respuesta["success"]==0){
						echo json_encode($respuesta);die();	
					}
				}
	
			}
			$respuesta["success"]=1;$respuesta["data1"]="Se cargaron los registros correctamente" ;

			echo json_encode($respuesta);

			/* echo '<table>' . PHP_EOL;
			foreach ($worksheet->getRowIterator() as $row) {
				echo '<tr>' . PHP_EOL;
				$cellIterator = $row->getCellIterator();
    			$cellIterator->setIterateOnlyExistingCells(FALSE); 

    			foreach ($cellIterator as $cell) {
    				echo '<td>' .
    				$cell->getValue() .
    				'</td>' . PHP_EOL;
    				//return;

    			}
    			echo '</tr>' . PHP_EOL;
    		}
    		echo '</table>' . PHP_EOL;
			*/
    	}catch(Exception $e){
    		show_error($e->getMessage().' --- '.$e->getTraceAsString());
    	}
    }

    public function carga_en_temporal(){

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