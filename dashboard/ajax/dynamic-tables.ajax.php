<?php

require_once "../controllers/curl.controller.php";

class DynamicTablesController{

	/*=============================================
    Eliminar Items
    =============================================*/

	public $idItemDelete;
    public $tableDelete;
	public $suffixDelete;
	public $token;

    public function deleteItems(){

		$url = $this->tableDelete."?id=".base64_decode($this->idItemDelete)."&nameId=id_".$this->suffixDelete."&token=".$this->token."&table=admins&suffix=admin";
		$method = "DELETE";
		$fields = array();

		$deleteItem = CurlController::request($url,$method,$fields);

		if($deleteItem->status == 200){

			echo 200;

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
