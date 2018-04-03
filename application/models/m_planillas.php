	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class m_planillas extends CI_Model {

		private $bd_contexto;
		
		/* Bindinf */
		//`id_encript_record`

		private $orden;//=array();






		public function __construct()
		{
			parent::__construct();

			// Nombres de campos en la Base de datos
			$this->orden[1]="rut";  
			$this->orden[2]="nombre";
			$this->orden[3]="especialidad";
			$this->orden[4]="mes_produccion";
			$this->orden[5]="fecha_tope_boleta";
			$this->orden[6]="fecha_pago";
			$this->orden[7]="cant_pacientes";
			$this->orden[8]="cant_procedimientos";
			$this->orden[9]="total";
			$this->orden[10]="participacion";
			$this->orden[11]="boleta";
			$this->orden[12]="email";
			$this->orden[13]="notas";
		}
		
		public function clear_temporal(){
			//$this->bd = $this->load->database();
			//$this->load->database();
			$respuesta["success"]=$this->db->query("delete from honorarios_listado_detalle_temp");
			return $respuesta;
			//$this->bd_contexto->query("DROP TABLE IF EXISTS qmovimientos");
			//$this->bd_contexto->query("CREATE TEMPORARY TABLE qmovimientos AS (select * from sms_movimientos)");

		}



		public function add_row($data,$modo=''){
			try {
				if(sizeof($data) != sizeof($this->orden)){
					$respuesta["success"]=0;$respuesta["data1"]="No coinciden la cantidad de campos de la BD con el archivo Excel (".sizeof($data)."-".sizeof($this->orden).")";
					return $respuesta; 
				}

				$now = date("Y-m-d H:i:s");
				$table="honorarios_listado_detalle";
				if($modo=="temporal"){
					$table="honorarios_listado_detalle_temp";
				}

				for ($i=1; $i <= sizeof($this->orden); $i++) { 
					$record[$this->orden[$i]]=$data[$i];
				}

			//print_r($record."j");die();
				$respuesta["success"]=$this->db->insert('honorarios_listado_detalle_temp', $record);
				if ($respuesta["success"]==0) {
					$respuesta["data1"]="Error grabando Data de Excel";
				}
				return $respuesta;
			} catch (Exception $e) {
				$respuesta["success"]=0;$respuesta["data1"]="Exception en function add_row";
				return $respuesta; 
			}
		}



	}