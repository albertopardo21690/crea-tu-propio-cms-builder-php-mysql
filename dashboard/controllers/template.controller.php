<?php 

class TemplateController{

	/*=============================================
	Traemos la vista principal de la plantilla
	=============================================*/

	public function index(){

		include "views/template.php";
	
	}

	/*=============================================
	Identificar el tipo de columna
	=============================================*/

	static public function typeColumn($value){

		if($value == "text" || 
		   $value == "textarea" ||
		   $value == "image" || 
		   $value == "video" ||
		   $value == "file" ||
		   $value == "link" ||
		   $value == "select" ||
		   $value == "array" ||
		   $value == "color" ||
		   $value == "password"){

			$type = "TEXT NULL DEFAULT NULL";
		}

		if($value == "object"){

			$type = "TEXT NULL DEFAULT '{}'";
		}

		if($value == "json"){

			$type = "TEXT NULL DEFAULT '[]'";

		}

		if($value == "int"){
	       
	       	$type = "INT NULL DEFAULT '0'";
		
		}

		if($value == "boolean"){
	       
	       	$type = "INT NULL DEFAULT '1'";
		
		}

		if($value == "double" || $value == "money"){
	       
	       	$type = "DOUBLE NULL DEFAULT '0'";
		
		}

		if($value == "date"){
	       	
	       	$type = "DATE NULL DEFAULT NULL";
	    
	    }

	    if($value == "time"){
	       	
	       	$type = "TIME NULL DEFAULT NULL";
	    
	    }

	    if($value == "datetime"){
	      	
	      	$type = "DATETIME NULL DEFAULT NULL";
	    
	    }

	    if($value == "timestamp"){
	      	
	      	$type = "TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";
	    }

	    if($value == "code"){

	       	$type = "LONGTEXT NULL DEFAULT NULL";
	    
	    }

	    return $type;

	}

	/*=============================================
	Función Reducir texto
	=============================================*/

	static public function reduceText($value, $limit){

		if(strlen($value) > $limit){

			$value = substr($value, 0, $limit)."...";
		}

		return $value;
	}

	/*=============================================
	Devuelva la miniatura de la lista
	=============================================*/

	static public function returnThumbnailList($value){

		/*=============================================
		Capturar miniatura imagen
		=============================================*/

		if(explode("/",$value->type_file)[0] == "image"){

			$path = '<img src="'.$value->link_file.'" class="rounded" style="width:100px; height:100px; object-fit: cover; object-position: center;">';

		}

		/*=============================================
		Capturar miniatura video
		=============================================*/

		if(explode("/",$value->type_file)[0] == "video"){

			if(explode("/",$value->type_file)[1] == "mp4"){

				$path = '<video class="rounded" style="width:100px; height:100px; object-fit: cover; object-position: center;">
				<source src="'.$value->link_file.'" type="'.$value->type_file.'">
				</video>';

			}else{

				$path = '<img src="/views/assets/img/multimedia.png" class="rounded" style="width:100px; height:100px; object-fit: cover; object-position: center;">';
			}

		}

		/*=============================================
		Capturar miniatura audio
		=============================================*/

		if(explode("/",$value->type_file)[0] == "audio"){

			$path = '<img src="/views/assets/img/multimedia.png" class="rounded" style="width:100px; height:100px; object-fit: cover; object-position: center;">';

		}

		/*=============================================
		Capturar miniatura pdf
		=============================================*/

		if(explode("/",$value->type_file)[1] == "pdf"){

			$path = '<img src="/views/assets/img/pdf.jpeg" class="rounded" style="width:100px; height:100px; object-fit: cover; object-position: center;">';
		}

		/*=============================================
		Capturar miniatura zip
		=============================================*/

		if(explode("/",$value->type_file)[1] == "zip"){

			$path = '<img src="/views/assets/img/zip.jpg" class="rounded" style="width:100px; height:100px; object-fit: cover; object-position: center;">';
		}

		return $path;
	}


	/*=============================================
	Devuelva la miniatura de la cuadrícula
	=============================================*/

	static public function returnThumbnailGrid($value){

		/*=============================================
		Capturar miniatura imagen
		=============================================*/

		if(explode("/",$value->type_file)[0] == "image"){

			$path = '<img src="'.$value->link_file.'" class="rounded card-img-top w-100">';

		}

		/*=============================================
		Capturar miniatura video
		=============================================*/

		if(explode("/",$value->type_file)[0] == "video"){

			if(explode("/",$value->type_file)[1] == "mp4"){

				$path = '<video class="rounded card-img-top w-100">
					<source src="'.$value->link_file.'" type="'.$value->type_file.'">
				</video>';

			}else{

				$path = '<img src="/views/assets/img/multimedia.png" class="rounded card-img-top w-100">';
			}

		}

		/*=============================================
		Capturar miniatura audio
		=============================================*/

		if(explode("/",$value->type_file)[0] == "audio"){

			$path = '<img src="/views/assets/img/multimedia.png" class="rounded card-img-top w-100">';

		}

		/*=============================================
		Capturar miniatura pdf
		=============================================*/

 		if(explode("/",$value->type_file)[1] == "pdf"){

 			$path = '<img src="/views/assets/img/pdf.jpeg" class="rounded card-img-top w-100">';
 		}

 		/*=============================================
		Capturar miniatura zip
		=============================================*/

 		if(explode("/",$value->type_file)[1] == "zip"){

 			$path = '<img src="/views/assets/img/zip.jpg" class="rounded card-img-top w-100">';
 		}
	 		
		return $path;
	}

}

?>