<?php
class Cuenta_model extends CI_Model {

	var $mssql;
    function __construct() {
		parent::__construct();
		$this->load->dbforge();
		$this->mssql = $this->load->database('default', TRUE );
	}
	
    function welcome_check(){
		//use $this->mssql instead of $this->db
		/*$query = $this->mssql->query('SELECT * FROM PERSONAL');
		echo print_r($query);*/
		//...

		$query=$this->mssql
        ->select("COD,NOMBRE,TIPO_PERSONAL")
        ->from("PERSONAL")
        ->order_by("NOMBRE","desc")
        ->get();
        return $query->result();

	 }

	function Contar_Registros_DetalleCuenta($vop, $vcod, $vcod_cliente, $vtd, $vemini, $vemifin, $vtbl){
		$query = " EXECUTE SP_HISTORICO_DEUDA_DETALLE_XXX ?,?,?,?,?,? ";
		$data = array(
			'op' 			=> $vop, 
			'cod' 			=> $vcod, 
			'cod_cliente' 	=> $vcod_cliente, 
			'td' 			=> $vtd,
			'emini' 		=> $vemini,
			'emifin' 		=> $vemifin
			//'tbl' 			=> $vtbl
		);
		$result = $this->mssql->query($query,$data);
		return $result->result_array();
	}
 
	function Listar_Registros_DetalleCuenta($vop, $vcod, $vcod_cliente, $vtd, $vemini, $vemifin, $vtbl, $cant ){

		// $query = " EXECUTE SP_HISTORICO_DEUDA_DETALLE_XXX ?,?,?,?,?,?,? ";
		// $data = array(
		// 	'op' 			=> $vop, 
		// 	'cod' 			=> $vcod, 
		// 	'cod_cliente' 	=> $vcod_cliente, 
		// 	'td' 			=> $vtd,
		// 	'emini' 		=> $vemini,
		// 	'emifin' 		=> $vemifin,
		// 	'tbl' 			=> $vtbl
		// );
		// $result = $this->mssql->query($query,$data);
		// return $result->result_array();

		// $query1 = " CREATE TABLE ". $vtbl 
		// 			. "("
		// 			. "[COD] CHAR(4),"
		// 			. "[EMPRESA] VARCHAR(10),"
		// 			. "[ZONA] VARCHAR(200), "
		// 			. "[COD_VEN] VARCHAR(10),"
		// 			. "[VENDEDOR] VARCHAR(200) "
		// 			. ");";

		// $resultado = $this->mssql->query($query1);

		$this->dbforge->add_field(array(
			//COD
			'COD' => array(
				'type' => 'CHAR',
				'constraint' => 4,
				'NULL' => TRUE
			),
			//EMPRESA
			'EMPRESA' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
				'NULL' => TRUE
			),
			//ZONA
			'ZONA' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'NULL' => TRUE
			),
			//COD_VEN
			'COD_VEN' => array(
				'type' => 'VARCHAR',
				'constraint' => 10,
				'NULL' => TRUE
			),
			//VENDEDOR
			'VENDEDOR' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'NULL' => TRUE
			),
			//COD_CLIENTE
			'COD_CLIENTE' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'NULL' => TRUE
			),
			//CLIENTE
			'CLIENTE' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => TRUE
			),
			//TD
			'TD' => array(
				'type' => 'CHAR',
				'constraint' => 2,
				'NULL' => TRUE
			), 
			//DOCUMENTO
			'DOCUMENTO' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'NULL' => TRUE
			), 
			//FECHA_EMISION
			'FECHA_EMISION' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'NULL' => TRUE
			),
			//FECHA_VENCIMIENTO
			'FECHA_VENCIMIENTO' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'NULL' => TRUE
			),
			//MES_EMI
			'MES_EMI' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'NULL' => TRUE
			),
			//ANIO_EMI
			'ANIO_EMI' => array(
				'type' => 'CHAR',
				'constraint' => 4,
				'NULL' => TRUE
			),
			//DIAS_PLAZO
			'DIAS_PLAZO' => array(
				'type' => 'INT',
				'NULL' => TRUE
			),
			//MON
			'MON' => array(
				'type' => 'CHAR',
				'constraint' => 2,
				'NULL' => TRUE
			), 
			//TIPCAMV
			'TIPCAMV' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//TIPCAMC
			'TIPCAMC' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//IMPORTEDOC
			'IMPORTEDOC' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,2',
				'NULL' => TRUE
			), 
			//CODAGE
			'CODAGE' => array(
				'type' => 'CHAR',
				'constraint' => '4',
				'NULL' => TRUE
			), 
			//AGENCIA
			'AGENCIA' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'NULL' => TRUE
			),
			//ITEM
			'ITEM' => array(
				'type' => 'CHAR',
				'constraint' => '4',
				'NULL' => TRUE
			),
			//PRODUCTO
			'PRODUCTO' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'NULL' => TRUE
			),
			//PRESENTACION
			'PRESENTACION' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//UNID_KG_LT
			'UNID_KG_LT' => array(
				'type' => 'VARCHAR',
				'constraint' => '5',
				'NULL' => TRUE
			), 
			//TOT_VOLUMEN
			'TOT_VOLUMEN' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//CODIGO
			'CODIGO' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'NULL' => TRUE
			),
			//DESCRI
			'DESCRI' => array(
				'type' => 'VARCHAR',
				'constraint' => '500',
				'NULL' => TRUE
			),
			//CANTI
			'CANTI' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//PRECIO
			'PRECIO' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,2',
				'NULL' => TRUE
			),
			//UNID
			'UNID' => array(
				'type' => 'VARCHAR',
				'constraint' => '5',
				'NULL' => TRUE
			),
			//VALORVTA
			'VALORVTA' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,2',
				'NULL' => TRUE
			),
			//IGV
			'IGV' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,2',
				'NULL' => TRUE
			),
			//PRECIOVTA
			'PRECIOVTA' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,2',
				'NULL' => TRUE
			),
			//VALORVTA_US
			'VALORVTA_US' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//VALORVTA_MN
			'VALORVTA_MN' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//PRECIOVTA_US
			'PRECIOVTA_US' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//PRECIOVTA_MN
			'PRECIOVTA_MN' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			'ID' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			),
			'AVANCE' => array(
				'type' => 'INT',
				'NULL' => TRUE
			)
		));
	
		$this->dbforge->create_table($vtbl);

		# ES LA FORMA QUE ENCONTRE PARA INSERTAR DE UN STORED PROCEDURE A UNA TABLA
		$inserttbl = "	INSERT INTO $vtbl (
						COD,
						EMPRESA,
						ZONA,
						COD_VEN,
						VENDEDOR,
						COD_CLIENTE,
						CLIENTE,
						TD,
						DOCUMENTO,
						FECHA_EMISION,
						FECHA_VENCIMIENTO,
						MES_EMI,
						ANIO_EMI,
						DIAS_PLAZO,
						MON,
						TIPCAMV,
						TIPCAMC,
						IMPORTEDOC,
						CODAGE,
						AGENCIA,
						ITEM,
						PRODUCTO,
						PRESENTACION,
						UNID_KG_LT,
						TOT_VOLUMEN,
						CODIGO,
						DESCRI,
						CANTI,
						PRECIO,
						UNID,
						VALORVTA,
						IGV,
						PRECIOVTA,
						VALORVTA_US,
						VALORVTA_MN,
						PRECIOVTA_US,
						PRECIOVTA_MN
						)
						SELECT * FROM OPENROWSET ('SQLOLEDB','Server=(local);TRUSTED_CONNECTION=YES;','set fmtonly off EXEC [RSFACCAR].dbo.[SP_HISTORICO_DEUDA_DETALLE_XXX] $vop,''$vcod'',''$vcod_cliente'',''$vtd'',''$vemini'',''$vemifin'' ') ";

		$resultado = $this->mssql->query($inserttbl);

	echo json_encode(array('rst' => true, 'msg' => 'Se Proceso Exitosamente', 'cant'=>$cant ));

	}

	public function ResetProgressBar($id){
		$RPgBar = " 	UPDATE 
						PROGRESSBAR SET 
						EXECUTED=0,
						TOTAL=0, 
						PERCENTAGE=0,
						EXECUTE_TIME='',
						DATE_ADD= NULL
						WHERE 
						ID_PROCESS = $id";
		$resulRPgBar = $this->mssql->query($RPgBar);
		echo json_encode(array('rst' => true, 'msg' => 'Se Reseteo ProgressBar'));

	}

	public function DeleteTableTMP($vtbl){
		$deteletbl = " 	DROP TABLE $vtbl";
		$resuldeteletbl = $this->mssql->query($deteletbl);
		echo json_encode(array('rst' => true, 'msg' => 'Se DeleteO Table '.$vtbl));

	}

	public function DeleteTableTMPADM($vtbl){
		$deteletbl = " 	DROP TABLE $vtbl";
		$resuldeteletbl = $this->mssql->query($deteletbl);
		echo json_encode(array('rst' => true, 'msg' => 'Se DeleteO Table '.$vtbl));

	}

	public function ObtenerCliente($filtro){

		$query = "	SELECT 
					COD_CLIENTE +' - '+ CLIENTE AS NOMBRE
					FROM 
					VIEW_ALL_CLIENT_ACTIVE 
					WHERE
					RTRIM(LTRIM(COD_CLIENTE)) LIKE '%$filtro%' OR RTRIM(LTRIM(CLIENTE)) LIKE '%$filtro%'
					GROUP BY COD_CLIENTE,CLIENTE";
		$rstquery = $this->mssql->query($query);
		//echo json_encode(array('rst' => true, 'msg' => 'Se DeleteO Table '.$vtbl));

		//$rstquery->result_array();

		foreach($rstquery->result_array() as $row){
			$json[] = $row['NOMBRE'];
		}

		echo json_encode($json);

	}

	public function Consultar_Historico_Detalle( $vcod, $vcod_cliente, $vtd, $vemini, $vemifin){
		$query = " EXECUTE SP_HISTORICO_DEUDA_DETALLE_XXX ?,?,?,?,?,? ";
		$data = array(
			'op' 			=> 1, 
			'cod' 			=> $vcod, 
			'cod_cliente' 	=> $vcod_cliente, 
			'td' 			=> $vtd,
			'emini' 		=> $vemini,
			'emifin' 		=> $vemifin
			//'tbl' 			=> $vtbl
		);
		$result = $this->mssql->query($query,$data);
		//return $result->result_array();
		echo(json_encode($result->result_array()));

	}

	public function Contar_Registros_LetSit($vop, $vcod){
		$query = " EXECUTE SP_LETRA_X_SITUACION ?,? ";
		$data = array(
			'op' 			=> $vop, 
			'cod' 			=> $vcod
		);
		$result = $this->mssql->query($query,$data);
		return $result->result_array();
	}

	public function Listar_Registros_LetSit($vop, $vcod, $vtbl, $cant){
		$this->dbforge->add_field(array(
			// COD
			'COD' => array(
				'type' => 'CHAR',
				'constraint' => 4,
				'NULL' => TRUE
			),
			// EMPRESA
			'EMPRESA' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
				'NULL' => TRUE
			),
			// COD_VEND
			'COD_VEND' => array(
				'type' => 'VARCHAR',
				'constraint' => 10,
				'NULL' => TRUE
			),
			// VEND
			'VEND' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'NULL' => TRUE
			),
			// NRO_LETRA
			'NRO_LETRA' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'NULL' => TRUE
			), 
			// FEC_EMIS
			'FEC_EMIS' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'NULL' => TRUE
			),
			// COD_CLIE
			'COD_CLIE' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'NULL' => TRUE
			),
			// CLIENTE
			'CLIENTE' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => TRUE
			),
			// PLAZO
			'PLAZO' => array(
				'type' => 'INT',
				'NULL' => TRUE
			),
			// FEC_VENC
			'FEC_VENC' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'NULL' => TRUE
			),
			// MONEDA
			'MONEDA' => array(
				'type' => 'CHAR',
				'constraint' => 2,
				'NULL' => TRUE
			), 
			// IMPORTE_MN
			'IMPORTE_MN' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			// IMPORTE_US
			'IMPORTE_US' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			// ESTADO
			'ESTADO' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => TRUE
			),
			// DOC_REFER
			'DOC_REFER' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => TRUE
			),
			// OBS
			'OBS' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => TRUE
			),
			// TRANSACCION
			'TRANSACCION' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => TRUE
			),
			'ID' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			),
			'AVANCE' => array(
				'type' => 'INT',
				'NULL' => TRUE
			)
		));

		$this->dbforge->create_table($vtbl);

		# ES LA FORMA QUE ENCONTRE PARA INSERTAR DE UN STORED PROCEDURE A UNA TABLA
		$inserttbl = "	INSERT INTO $vtbl (
							COD,
							EMPRESA,
							COD_VEND,
							VEND,
							NRO_LETRA,
							FEC_EMIS,
							COD_CLIE,
							CLIENTE,
							PLAZO,
							FEC_VENC,
							MONEDA,
							IMPORTE_MN,
							IMPORTE_US,
							ESTADO,
							DOC_REFER,
							OBS,
							TRANSACCION
						)
						SELECT * FROM OPENROWSET ('SQLOLEDB','Server=(local);TRUSTED_CONNECTION=YES;','set fmtonly off EXEC [RSFACCAR].dbo.[SP_LETRA_X_SITUACION] $vop,''$vcod'' ') ";

		$resultado = $this->mssql->query($inserttbl);
		echo json_encode(array('rst' => true, 'msg' => 'Se Proceso Exitosamente', 'cant'=>$cant ));

	} 

	public function ListCliente($draw,$row,$rowperpage,$columnIndex,$columnName,$columnSortOrder,$searchValue){

		## Search 
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " AND ( RUC LIKE '%".$searchValue."%' OR CLIENTE LIKE '%".$searchValue."%' ) ";
		}

		// $searchQuery = isset($searchQuery) ? " AND ( CODIGO_CLIENTE LIKE '%".$searchValue."%' OR CLIENTE LIKE '%".$searchValue."%' ) " : "";


		$sel = " SELECT COUNT(*) AS allcount FROM BASE_CLIENTE ";
		$records = $this->mssql->query($sel);
		$cant = $records->result_array();
		$totalRecords = $cant[0]['allcount'];

		$sel = " SELECT COUNT(*) AS allcount FROM BASE_CLIENTE WHERE 1 = 1 ".$searchQuery;
		$records = $this->mssql->query($sel);
		$cant = $records->result_array();
		$totalRecordwithFilter = $cant[0]['allcount'];

		$inicio = $row + 1;

		$final = 0;
		$final = $row + $rowperpage;

		// $sqListCliente = " WITH SQLBASE_CLIENTE AS 
		// 					(
		// 						SELECT 
		// 						ROW_NUMBER() OVER (ORDER BY (SELECT 1)) AS ROW_NUMBER,
		// 						RUC,
		// 						CLIENTE,
		// 						TIPO_CLIENTE,
		// 						SUPERVISOR,
		// 						LINEA_BASE,
		// 						SOBREGIRO_CAMPANIA,
		// 						LINEA_CREDITO_TOTAL,
		// 						ESTUDIO_EXTERNO
		// 						FROM 
		// 						BASE_CLIENTE 
		// 						WHERE 
		// 						1 = 1 
		// 						$searchQuery
		// 					)
		// 					SELECT 
		// 					ROW_NUMBER,
		// 					RUC,
		// 					CLIENTE,
		// 					TIPO_CLIENTE,
		// 					SUPERVISOR,
		// 					LINEA_BASE,
		// 					SOBREGIRO_CAMPANIA,
		// 					LINEA_CREDITO_TOTAL,
		// 					ESTUDIO_EXTERNO 
		// 					FROM SQLBASE_CLIENTE WHERE ROW_NUMBER BETWEEN $inicio AND $final $searchQuery";

		$sqListCliente = " WITH SQLBASE_CLIENTE AS 
							(
								SELECT 
								ROW_NUMBER() OVER (ORDER BY (SELECT 1)) AS ROW_NUMBER,
								RUC,
								CLIENTE,
								TIPO_CLIENTE,
								COD_ZONA,
								ZONA,
								COD_VEN,
								RESPONSABLE_ZONA,
								COD_VEN_RTC_JUNIOR,
								RTC,
								SUPERVISOR,
								TIPO_RIESGO,
								ISNULL(LINEA_BASE,0) AS 'LINEA_BASE' ,
								ISNULL(SOBREGIRO_CAMPANIA,0) AS 'SOBREGIRO_CAMPANIA' ,
								ISNULL(LINEA_CREDITO_TOTAL,0) AS 'LINEA_CREDITO_TOTAL' 
								FROM
								BASE_CLIENTE
								WHERE 
								1 = 1 
								$searchQuery
							)
							SELECT 
							ROW_NUMBER,
							RUC,
							CLIENTE,
							TIPO_CLIENTE,
							COD_ZONA,
							ZONA,
							COD_VEN,
							RESPONSABLE_ZONA,
							COD_VEN_RTC_JUNIOR,
							RTC,
							SUPERVISOR,
							TIPO_RIESGO,
							LINEA_BASE,
							SOBREGIRO_CAMPANIA,
							LINEA_CREDITO_TOTAL
							FROM SQLBASE_CLIENTE WHERE ROW_NUMBER BETWEEN $inicio AND $final $searchQuery";

		$rssql = $this->mssql->query($sqListCliente);

		$data = array();
		
		foreach($rssql->result_array() as $row){
			//$json[] = $row['NOMBRE'];

			$data[] = array(
				// "ROW_NUMBER"			=> $row['ROW_NUMBER'],
				// "RUC"					=> $row['RUC'],
				// "CLIENTE"				=> $row['CLIENTE'],
				// "TIPO_CLIENTE"			=> $row['TIPO_CLIENTE'],
				// "SUPERVISOR"			=> $row['SUPERVISOR'],
				// "LINEA_BASE"			=> $row['LINEA_BASE'],
				// "SOBREGIRO_CAMPANIA" 	=> $row['SOBREGIRO_CAMPANIA'],
				// "LINEA_CREDITO_TOTAL" 	=> $row['LINEA_CREDITO_TOTAL'],
				//"ESTUDIO_EXTERNO" 		=> $row['ESTUDIO_EXTERNO']	
				
				"ROW_NUMBER" 			=> $row['ROW_NUMBER'],
				"RUC"					=> $row['RUC'],
				"CLIENTE"				=> $row['CLIENTE'],
				"TIPO_CLIENTE"			=> $row['TIPO_CLIENTE'],
				"COD_ZONA"				=> $row['COD_ZONA'],
				"ZONA"					=> $row['ZONA'],
				"COD_VEN"				=> $row['COD_VEN'],
				"RESPONSABLE_ZONA"		=> $row['RESPONSABLE_ZONA'],
				"COD_VEN_RTC_JUNIOR"	=> $row['COD_VEN_RTC_JUNIOR'],
				"RTC"					=> $row['RTC'],
				"SUPERVISOR"			=> $row['SUPERVISOR'],
				"TIPO_RIESGO"			=> $row['TIPO_RIESGO'],
				"LINEA_BASE"			=> $row['LINEA_BASE'],
				"SOBREGIRO_CAMPANIA"	=> $row['SOBREGIRO_CAMPANIA'],
				"LINEA_CREDITO_TOTAL"	=> $row['LINEA_CREDITO_TOTAL']

			);

		}

		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		
		echo json_encode($response);

	}

   
}
