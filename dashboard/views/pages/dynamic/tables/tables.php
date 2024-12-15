<?php

/*=============================================
Traemos columnas de la tabla
=============================================*/

$url = "columns?linkTo=id_module_column&equalTo=".$module->id_module;
$method = "GET";
$fields = array();

$columns = CurlController::request($url,$method,$fields);

if($columns->status == 200){

	$columns = $columns->results;

}else{

	$columns = array();
	
}

/*=============================================
Agregar las columnas a los datos del módulo
=============================================*/
$module->columns = $columns;

/*=============================================
Traemos contenido de la tabla
=============================================*/
$url = $module->title_module;
$method = "GET";
$fields = array();

$table = CurlController::request($url,$method,$fields);

if($table->status == 200){

	$table = $table->results;

}else{

	$table = array();
}

?>

<!--===========================================
Cargamos el gestor de datos
=============================================-->

<?php if (!empty($routesArray[1]) && $routesArray[1] == "manage"): ?>


	<?php include "manage/manage.php" ?>

<!--===========================================
Cargamos el módulo tabla
=============================================-->

<?php else: ?>

<div class="<?php if ($module->width_module == "100"): ?> col-lg-12 <?php endif ?><?php if ($module->width_module == "75"): ?> col-lg-9 <?php endif ?><?php if ($module->width_module == "50"): ?> col-lg-6 <?php endif ?><?php if ($module->width_module == "33"): ?> col-lg-4 <?php endif ?><?php if ($module->width_module == "25"): ?> col-lg-3 <?php endif ?> col-12 mb-3 position-relative">

	<?php if ($_SESSION["admin"]->rol_admin == "superadmin"): ?>

		<div class="position-absolute border rounded bg-white" style="top:0px; right:12px; z-index:100">
			
			<button type="button" class="btn btn-sm text-muted rounded m-0 px-1 py-0 border-0 myModule" item='<?php echo json_encode($module) ?>' idPage="<?php echo $page->results[0]->id_page ?>">
				<i class="bi bi-pencil-square"></i>
			</button>

			<button type="button" class="btn btn-sm text-muted rounded m-0 px-1 py-0 border-0 deleteModule" idModule=<?php echo base64_encode($module->id_module) ?> >
				<i class="bi bi-trash"></i>
			</button>


		</div>
		
	<?php endif ?>
	
	<div class="card rounded p-3 w-100" id="cardTable">

		<!--=========================================
        Cabecera de la tabla
        ===========================================-->
		
		<div class="card-header bg-white">
			
			<div class="d-lg-flex justify-content-between">

				<!--=========================================
		        Botón para crear un nuevo registro
		        ===========================================-->
				
				<div class="mb-3">

					<?php if ($_SESSION["admin"]->rol_admin == "superadmin" || $module->editable_module == 1): ?>

						<a href="/<?php echo $module->url_page ?>/manage" class="btn btn-default btn-sm rounded backColor px-3 py-2">Agregar registro
						</a>
						
					<?php endif ?>
					
					

				</div>

				<div class="mb-3">
					
					<ul class="nav justify-content-lg-end">

						<!--=========================================
				        Botón para rango de fechas
				        ===========================================-->
						
						<li class="nav-item p-0 me-2 position-relative" style="bottom:5px">
							
							<button type="button" class="btn small" id="daterange-btn">
								
								<i class="far fa-calendar-alt me-1"></i>

								<small>
									<span id="startDate"><?php echo date("Y-m-d", 0) ?></span>
									-
									<span id="endDate"><?php echo date("Y-m-d") ?></span>
									<i class="fas fa-caret-down ms-1"></i>
								</small>

							</button>

						</li>

						<li class="nav-item p-0">

							<!--=========================================
				        	Selección masiva
				        	===========================================-->

							<button type="button" class="btn btn-sm bg-blue rounded border-0">
								<i class="bi bi-check2-square"></i>
							</button>

							<!--=========================================
				        	Eliminación masiva
				        	===========================================-->

							<button type="button" class="btn btn-sm bg-maroon rounded border-0">
								<i class="bi bi-trash"></i>
							</button>

						</li>

					</ul>

				</div>

			</div>

		</div>

		<!--=========================================
        Cuerpo de la tabla
        ===========================================-->

		<div class="card-body">

			<!--=========================================
	        Bloque de filtros
	        ===========================================-->		

			<div class="d-lg-flex justify-content-lg-between">

				<!--=========================================
		        Filtar cantidad de registros
		        ===========================================-->
				
				<div class="mb-3 row">
					
					<div class="col mt-1">
						<small>Mostrar</small>
					</div>

					<div class="col p-0">
						<select class="form-select form-select-sm rounded" style="width:65px">
						  <option value="10" class="small">10</option>
						  <option value="25" class="small">25</option>
						  <option value="50" class="small">50</option>
						  <option value="100" class="small">100</option>
						</select>
					</div>

					<div class="col mt-1">
						<small>Registros</small>
					</div>

				</div>

				<!--=========================================
		        Filtar por búsqueda de registros
		        ===========================================-->

		        <div class="mb-3">
		        	
		        	<input type="text" class="form-control rounded form-control-sm" placeholder="Buscar...">

		        </div>

			</div>

			<!--=========================================
	        Bloque de tabla
	        ===========================================-->	

	        <div class="table-responsive">
	        	
	        	<table class="table" width="100%">
	        		
	        		<thead>
	        			<tr>
	        				<th>#</th>
					        <th>Sel.</th>  
					       
					        <?php if (!empty($columns)): ?>
					        	<?php foreach ($columns as $index => $item): ?>

					        		<?php if ($item->visible_column == 1): ?>
					        			
					        			<th class="text-capitalize"><?php echo $item->alias_column ?></th>	

					        		<?php endif ?>
					        		
					        	<?php endforeach ?>
					        <?php endif ?>

					        <?php if ($_SESSION["admin"]->rol_admin == "superadmin" || $module->editable_module == 1): ?>

					        	<th class="text-center">Acciones</th>

					    	<?php endif ?>
  
	        			</tr>
	        		</thead>

	        		<tbody class="small">

	        			<?php if (!empty($table)): ?>

	        				<?php foreach (json_decode(json_encode($table),true) as $key => $value): ?>

        					<tr>

        						<td><?php echo ($key+1) ?></td>
        						<td>
		        					<div class="form-check">
		        						<input class="form-check-input" type="checkbox">
		        					</div>
		        				</td>

	        					<?php foreach ($columns as $index => $item): ?>

	        						<?php if ($item->visible_column == 1): ?>
	        								
		        						<td>

		        						<?php 

	        							/*=============================================
										Contenido tipo Imagen
										=============================================*/

										if($item->type_column == "image"){

											echo '<a href="'.urldecode($value[$item->title_column]).'" target="_blank">
												<img src="'.urldecode($value[$item->title_column]).'" class="rounded" style="width:60px; height:60px; object-fit: cover; object-position:center;">
											</a>';

										/*=============================================
										Contenido tipo Video
										=============================================*/

										}else if($item->type_column == "video"){

											echo '<a href="'.urldecode($value[$item->title_column]).'" target="_blank">
												<img src="/views/assets/img/video.png" class="rounded" style="width:60px; height:60px; object-fit: cover; object-position:center;">
											</a>';

										/*=============================================
										Contenido tipo otros Archivos
										=============================================*/

										}else if($item->type_column == "file"){

											echo '<a href="'.urldecode($value[$item->title_column]).'" target="_blank">
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

											echo '<div class="form-check form-switch">
											<input class="form-check-input px-3" type="checkbox" id="mySwtich" '.$checked.'>
											<label class="form-check-label ps-1 align-middle" for="mySwitch">'.$label.'</label>
											</div>';

										/*=============================================
										Contenido tipo Array
										=============================================*/
									    }else if($item->type_column == "array"){

									    	$typeArray = explode(",",urldecode($value[$item->title_column]));

									    	foreach ($typeArray as $num => $elem){
										
												echo '<span class="badge badge-sm badge-default rounded bg-dark py-1 px-2 mx-1 mt-1 border small">'.TemplateController::reduceText($elem,25).'</span>';

											}

										/*=============================================
										Contenido tipo Objetos
										=============================================*/

										}else if($item->type_column == "object"){

									    	$typeJSON = json_decode(urldecode($value[$item->title_column]));

									    	foreach ($typeJSON as $num => $elem){

									    		echo '<span class="badge badge-sm badge-default rounded py-1 px-2 mx-1 mt-1 border text-dark text-uppercase small">'.$num.': '.$elem.'</span>';

									    	}

									    /*=============================================
										Contenido tipo Enlace
										=============================================*/

										}else if($item->type_column == "link"){

									    	echo '<a href="'.$value[$item->title_column].'" target="_blank" class="badge badge-default border rounded bg-indigo">'.TemplateController::reduceText(urldecode($value[$item->title_column]), 20).'</a>';

										/*=============================================
										Contenido tipo Color
										=============================================*/

										}else if($item->type_column == "color"){

									    	echo '<div class="rounded" style="width:25px; height:25px; background:'.urldecode($value[$item->title_column]).'"></div>';

									    /*=============================================
										Contenido tipo Double
										=============================================*/

										}else if($item->type_column == "money"){

									    	echo '$'.number_format(urldecode($value[$item->title_column]),2);

										}else{

			        						echo TemplateController::reduceText(urldecode($value[$item->title_column]),25); 

			        					}


		        						?> 

		        						</td>

		        					<?php endif ?>
						
	        					<?php endforeach ?>

	        				 <?php if ($_SESSION["admin"]->rol_admin == "superadmin" || $module->editable_module == 1): ?>

	        					<td class="text-center">
		        					<a href="/<?php echo $module->url_page ?>/manage/<?php echo base64_encode($value["id_".$module->suffix_module]) ?>/copy" class="btn btn-sm text-dark rounded m-0 p-0 border-0">
		        						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
										  <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
										</svg>
		        					</a>
		        					<a href="/<?php echo $module->url_page ?>/manage/<?php echo base64_encode($value["id_".$module->suffix_module]) ?>" class="btn btn-sm text-primary rounded m-0 p-0 border-0">
		        						<i class="bi bi-pencil-square"></i>
		        					</a>
		        					<button type="button" class="btn btn-sm text-maroon rounded m-0 p-0 border-0 deleteItem" idItem="<?php echo base64_encode($value["id_".$module->suffix_module]) ?>" table="<?php echo $module->title_module ?>" suffix="<?php echo $module->suffix_module ?>">
		        						<i class="bi bi-trash"></i>
		        					</button>
		        				</td>

		        				<?php endif ?>

	        				</tr>
	        					
	        				<?php endforeach ?>	

	        			<?php else: ?>

	        				<tr>
	        					<td colspan="1">No hay registros disponibles</td>
	        				</tr>
	        				
	        			<?php endif ?>
	        			
	        		</tbody>

	        	</table>
	        </div>	

	        <!--=========================================
	        Bloque final
	        ===========================================-->	

	        <div class="d-lg-flex justify-content-lg-between mt-2 mb-0">

	        	<!--=========================================
	        	Visualización de registros
	        	===========================================-->	

	        	<div class="mb-3">

	        		<small>Mostrando
	        			<span>1</span> a 
	        			<span>3</span> de
	        			<span>3</span>
	        		</small>
	        		
	        	</div>

	        	<!--=========================================
	        	Paginación
	        	===========================================-->	

	        	<div class="mb-3">

		        	<ul class="pagination">
		        		<li class="page-item"><a class="page-link" href="#">Previous</a></li>
		        		<li class="page-item"><a class="page-link" href="#">1</a></li>
		        		<li class="page-item"><a class="page-link" href="#">2</a></li>
		        		<li class="page-item"><a class="page-link" href="#">3</a></li>
		        		<li class="page-item"><a class="page-link" href="#">Next</a></li>
		        	</ul>

		        </div>
	        	
	        </div>

		</div>

	</div>

</div>

<?php endif ?>
