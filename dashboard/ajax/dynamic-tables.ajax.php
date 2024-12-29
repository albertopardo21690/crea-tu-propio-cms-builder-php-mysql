<?php

require_once "../controllers/curl.controller.php";
require_once "../controllers/template.controller.php";

class DynamicTablesController{

	/*=============================================
    Eliminar Items
    =============================================*/

	public $idItemDelete;
    public $tableDelete;
	public $suffixDelete;
	public $token;

    public function deleteItems(){

    	$idItems = explode(",",$this->idItemDelete);
    	$countDelete = 0;

    	foreach ($idItems as $key => $value) {
    		
    		$url = $this->tableDelete."?id=".base64_decode($value)."&nameId=id_".$this->suffixDelete."&token=".$this->token."&table=admins&suffix=admin";
			$method = "DELETE";
			$fields = array();

			$deleteItem = CurlController::request($url,$method,$fields);

			if($deleteItem->status == 200){

				$countDelete++;

				if($countDelete == count($idItems)){

					echo 200;

				}

			}

    	}		

	}

	/*=============================================
    Devolver tabla filtrada
    =============================================*/

    public $contentModule;
	public $orderBy;
	public $orderMode;
	public $limit;
	public $page;
	public $rolAdmin;
	public $search;
	public $between1;
	public $between2;

	public function loadAjaxTable() {

		$module = (json_decode($this->contentModule));
		$startAt = ($this->page-1)*$this->limit;
		$table = array(); 
		$totalPages = 0;
		$totalData = 0;


    	/*=============================================
		Filtro por búsqueda
		=============================================*/

		if($this->search != ""){

			/*=============================================
			Columnas de búsqueda
			=============================================*/

			$linkTo = array();

			foreach ($module->columns as $key => $value) {
			
				if($value->visible_column == 1){

					if( $value->type_column == "text" ||
						$value->type_column == "textarea" ||
						$value->type_column == "int" ||
						$value->type_column == "double" ||
						$value->type_column == "money" ||  
						$value->type_column == "color" || 
						$value->type_column == "link" ||
						$value->type_column == "select" ||
						$value->type_column == "array" || 
						$value->type_column == "date" ||
						$value->type_column == "time" ||
						$value->type_column == "datetime"){

						array_push($linkTo, $value->title_column);
					}
				}
			}

			/*=============================================
			Itineración de búsqueda
			=============================================*/
			foreach ($linkTo as $key => $value) {

				$url = $module->title_module."?linkTo=".$value."&search=".str_replace(" ", "_", $this->search)."&orderBy=".$this->orderBy."&orderMode=".$this->orderMode."&startAt=".$startAt."&endAt=".$this->limit;
				$method = "GET";
				$fields = array();

				$table = CurlController::request($url,$method,$fields);

				if($table->status == 200){

					$table = $table->results;

					/*=============================================
					Traemos contenido total de la tabla
					=============================================*/
					
					$url = $module->title_module."?linkTo=".$value."&search=".str_replace(" ", "_", $this->search)."&select=id_".$module->suffix_module;
					$totalData = CurlController::request($url,$method,$fields)->total;
					$totalPages = ceil($totalData/$this->limit);

					break;
					
				}else{

					$table = array();
				}
		
			}
			
		}else{

			$url = $module->title_module."?linkTo=date_created_".$module->suffix_module."&between1=".$this->between1."&between2=".$this->between2."&orderBy=".$this->orderBy."&orderMode=".$this->orderMode."&startAt=".$startAt."&endAt=".$this->limit;

			$method = "GET";
			$fields = array();

			$table = CurlController::request($url,$method,$fields);

			if($table->status == 200){

				$table = $table->results;

				/*=============================================
				Traemos contenido total de la tabla
				=============================================*/
				
				$url = $module->title_module."?linkTo=date_created_".$module->suffix_module."&between1=".$this->between1."&between2=".$this->between2."&select=id_".$module->suffix_module;
				$totalData = CurlController::request($url,$method,$fields)->total;
				$totalPages = ceil($totalData/$this->limit);
				
			}else{

				$table = array();
			}

		}
	
		/*=============================================
    	Devolver la tabla en formato HTML
    	=============================================*/

    	$HTMLTable = "";

    	if(!empty($table)){

    		foreach(json_decode(json_encode($table),true) as $key => $value){

				$HTMLTable .= '<tr>
						<td>'.($key+1+$startAt).'</td>
						<td>
	    					<div class="form-check formCheck">
	    						<input class="form-check-input checkItem" type="checkbox" idItem="'.base64_encode($value["id_".$module->suffix_module]).'">
	    					</div>
	    				</td>';

					    foreach ($module->columns as $index => $item){

							if ($item->visible_column == 1){
								
    							$HTMLTable .= '<td>';

								/*=============================================
								Contenido tipo Imagen
								=============================================*/

								if($item->type_column == "image"){

									$HTMLTable .= '<a href="'.urldecode($value[$item->title_column]).'" target="_blank">
										<img src="'.urldecode($value[$item->title_column]).'" class="rounded" style="width:60px; height:60px; object-fit: cover; object-position:center;">
									</a>';

								/*=============================================
								Contenido tipo Video
								=============================================*/

								}else if($item->type_column == "video"){

									$HTMLTable .= '<a href="'.urldecode($value[$item->title_column]).'" target="_blank">
										<img src="/views/assets/img/video.png" class="rounded" style="width:60px; height:60px; object-fit: cover; object-position:center;">
									</a>';

								/*=============================================
								Contenido tipo otros Archivos
								=============================================*/

								}else if($item->type_column == "file"){

									$HTMLTable .= '<a href="'.urldecode($value[$item->title_column]).'" target="_blank">
										<img src="/views/assets/img/file.png" class="rounded" style="width:60px; height:60px; object-fit: cover; object-position:center;">
									</a>';


								/*=============================================
								Contenido tipo Boleano
								=============================================*/

								}else if($item->type_column == "boolean"){


									if($value[$item->title_column] == 1){	

										$checked = 'checked';
										$label = "ON";
									
									}else{

										$checked = '';
										$label = "OFF";
									}

									$HTMLTable .= '<div class="form-check form-switch">
									<input class="form-check-input px-3 changeBoolean" type="checkbox" id="mySwtich" '.$checked.' idItem="'.base64_encode($value["id_".$module->suffix_module]).'" table="'.$module->title_module.'" suffix="'.$module->suffix_module.'" column="'.$item->title_column.'">
									<label class="form-check-label ps-1 align-middle" for="mySwitch">'.$label.'</label>
									</div>';

								/*=============================================
								Contenido tipo Array
								=============================================*/
							    }else if($item->type_column == "array"){

							    	$typeArray = explode(",",urldecode($value[$item->title_column]));

							    	foreach ($typeArray as $num => $elem){
								
										$HTMLTable .= '<span class="badge badge-sm badge-default rounded bg-dark py-1 px-2 mx-1 mt-1 border small">'.TemplateController::reduceText($elem,25).'</span>';

									}

								/*=============================================
								Contenido tipo Objetos
								=============================================*/

								}else if($item->type_column == "object"){

							    	$typeJSON = json_decode(urldecode($value[$item->title_column]));

							    	foreach ($typeJSON as $num => $elem){

							    		$HTMLTable .= '<span class="badge badge-sm badge-default rounded py-1 px-2 mx-1 mt-1 border text-dark text-uppercase small">'.$num.': '.$elem.'</span>';

							    	}

							    /*=============================================
								Contenido tipo Enlace
								=============================================*/

								}else if($item->type_column == "link"){

							    	$HTMLTable .= '<a href="'.$value[$item->title_column].'" target="_blank" class="badge badge-default border rounded bg-indigo">'.TemplateController::reduceText(urldecode($value[$item->title_column]), 20).'</a>';

								/*=============================================
								Contenido tipo Color
								=============================================*/

								}else if($item->type_column == "color"){

							    	$HTMLTable .= '<div class="rounded" style="width:25px; height:25px; background:'.urldecode($value[$item->title_column]).'"></div>';

							    /*=============================================
								Contenido tipo Double
								=============================================*/

								}else if($item->type_column == "money"){

							    	$HTMLTable .= '$'.number_format(urldecode($value[$item->title_column]),2);

								}else{

	        						$HTMLTable .= TemplateController::reduceText(urldecode($value[$item->title_column]),25); 

	        					}

	        					$HTMLTable .= '</td>';

	        				}		
			
						}

				 		if ($this->rolAdmin == "superadmin" || $module->editable_module == 1){

							$HTMLTable .= '<td class="text-center">
		    					<a href="/'.$module->url_page.'/manage/'.base64_encode($value["id_".$module->suffix_module]).'/copy" class="btn btn-sm text-dark rounded m-0 p-0 border-0">
		    						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
									  <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
									</svg>
		    					</a>
			    					<a href="/'.$module->url_page.'/manage/'.base64_encode($value["id_".$module->suffix_module]).'" class="btn btn-sm text-primary rounded m-0 p-0 border-0">
			    						<i class="bi bi-pencil-square"></i>
			    					</a>
			    					<button type="button" class="btn btn-sm text-maroon rounded m-0 p-0 border-0 deleteItem" idItem="'.base64_encode($value["id_".$module->suffix_module]).'" table="'.$module->title_module.'" suffix="'.$module->suffix_module.'">
			    						<i class="bi bi-trash"></i>
			    					</button>
			    				</td>';

    					}

				$HTMLTable .= '</tr>';

		
			}

    	}

    	$response = array(

    		"HTMLTable" => $HTMLTable,
    		"totalData" => $totalData,
    		"totalPages" => $totalPages
    	);

    	echo json_encode($response);


	}

	/*=============================================
    Cambiar estado Boleano
    =============================================*/
    public $boolChange;
    public $idItemChange;
    public $tableChange;
	public $suffixChange;
	public $columnChange;

	public function changeBooleanItems(){

		$idItems = explode(",", $this->idItemChange);
		$countChange = 0;

		foreach ($idItems as $key => $value) {

			if($this->boolChange == "false" || $this->boolChange == 0){

    			$this->boolChange = 0;
    		
    		}else{

    			$this->boolChange = 1;
    		}

    		$url = $this->tableChange."?id=".base64_decode($value)."&nameId=id_".$this->suffixChange."&token=".$this->token."&table=admins&suffix=admin";
    		$method = "PUT";
    		$fields = $this->columnChange."=".$this->boolChange;

    		$updateItem = CurlController::request($url,$method,$fields);

    		if($updateItem->status == 200){

    			$countChange++;

    			if($countChange == count($idItems)){

    				echo 200;
    			}
    		}  		

		}
	}

	/*=============================================
    Cambiar selección
    =============================================*/
    public $itemSelect;
    public $idItemSelect;
    public $tableSelect;
	public $suffixSelect;
	public $columnSelect;

	public function changeSelectItems(){

		$idItems = explode(",", $this->idItemSelect);
		$countSelect = 0;

		foreach ($idItems as $key => $value) {

    		$url = $this->tableSelect."?id=".base64_decode($value)."&nameId=id_".$this->suffixSelect."&token=".$this->token."&table=admins&suffix=admin";
    		$method = "PUT";
    		$fields = $this->columnSelect."=".$this->itemSelect;

    		$updateItem = CurlController::request($url,$method,$fields);

    		if($updateItem->status == 200){

    			$countSelect++;

    			if($countSelect == count($idItems)){

    				echo 200;
    			}
    		}  		

		}
	}

}

/*=============================================
Variables POST
=============================================*/ 

if(isset($_POST["idItemDelete"])){

	$ajax = new DynamicTablesController();
    $ajax -> idItemDelete = $_POST["idItemDelete"];
    $ajax -> tableDelete = $_POST["tableDelete"];
    $ajax -> suffixDelete = $_POST["suffixDelete"];
    $ajax -> token = $_POST["token"];  
    $ajax -> deleteItems();

}

/*=============================================
Devolver tabla filtrada
=============================================*/

if(isset($_POST["contentModule"])){

	$ajax = new DynamicTablesController();
    $ajax -> contentModule = $_POST["contentModule"];
    $ajax -> orderBy = $_POST["orderBy"];  
    $ajax -> orderMode = $_POST["orderMode"]; 
    $ajax -> limit = $_POST["limit"]; 
    $ajax -> page = $_POST["page"];
    $ajax -> rolAdmin = $_POST["rolAdmin"];  
    $ajax -> search = $_POST["search"];  
    $ajax -> between1 = $_POST["between1"];  
    $ajax -> between2 = $_POST["between2"];  
    $ajax -> loadAjaxTable();

}


/*=============================================
Cambiar estado Boleano
=============================================*/

if(isset($_POST["tableChange"])){

    $ajax = new DynamicTablesController();
    $ajax -> boolChange = $_POST["boolChange"];
    $ajax -> idItemChange = $_POST["idItemChange"];
    $ajax -> tableChange = $_POST["tableChange"];
    $ajax -> suffixChange = $_POST["suffixChange"];
    $ajax -> columnChange = $_POST["columnChange"];
    $ajax -> token = $_POST["token"];  
    $ajax -> changeBooleanItems();

}

/*=============================================
Cambiar selección
=============================================*/

if(isset($_POST["tableSelect"])){

    $ajax = new DynamicTablesController();
    $ajax -> itemSelect = $_POST["itemSelect"];
    $ajax -> idItemSelect = $_POST["idItemSelect"];
    $ajax -> tableSelect = $_POST["tableSelect"];
    $ajax -> suffixSelect = $_POST["suffixSelect"];
    $ajax -> columnSelect = $_POST["columnSelect"];
    $ajax -> token = $_POST["token"];  
    $ajax -> changeSelectItems();

}

