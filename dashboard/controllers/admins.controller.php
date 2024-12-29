<?php 

class AdminsController{

	/*=============================================
	Login de adminstradores
	=============================================*/	

	public function login(){

		if(isset($_POST["email_admin"])){

			echo '<script>

				fncMatPreloader("on");
				fncSweetAlert("loading", "Ingresando...", "");

			</script>';

			$url = "admins?login=true&suffix=admin";
			$method = "POST";
			$fields = array(
				"email_admin" => $_POST["email_admin"],
				"password_admin" => $_POST["password_admin"]
			);

			$login = CurlController::request($url,$method,$fields);
			
			if($login->status == 200){

				/*=============================================
				Validar estado del administrador
				=============================================*/

				if($login->results[0]->status_admin == 0){

					echo '<div class="alert alert-danger mt-3 rounded">Error al ingresar: Administrador desactivado</div>

					<script>

						fncMatPreloader("off");
						fncFormatInputs();
						fncToastr("error", "Error al ingresar: Administrador desactivado");

					</script>';

					return;
				}

				/*=============================================
				Crear variable de Sesión
				=============================================*/

				$_SESSION["admin"] = $login->results[0];

				echo '<script>

					localStorage.setItem("token_admin","'.$login->results[0]->token_admin.'");
					fncMatPreloader("off");
					fncFormatInputs();
					location.reload();

				</script>';


			} else{

				if($login->results == "Wrong email") {

					$error = "El correo esta mal escrito.";

				} else {

					$error = "La contraseña esta mal escrita.";

				}

				echo '<div class="alert alert-danger mt-3 rounded">Error al ingresar: '.$error.'</div>

				<script>

					fncMatPreloader("off");
					fncFormatInputs();
					fncToastr("error", "Error al ingresar: '.$error.'");

				</script>';
			}


		}

	}

	/*=============================================
	Actualizar Administrador
	=============================================*/

	public function updateAdmin(){

		if(isset($_POST["id_admin"])){

			echo '

			<script>

				fncMatPreloader("on");
			    fncSweetAlert("loading", "Procesando...", "");

			</script>

			';

			/*=============================================
			Validar admin
			=============================================*/

			$url = "admins?linkTo=id_admin&equalTo=".base64_decode($_POST["id_admin"])."&select=id_admin,password_admin,rol_admin";
			$method = "GET";
			$fields = array();

			$admin = CurlController::request($url,$method,$fields);
			
			if($admin->status == 200){

				/*=============================================
				Si hay cambio de contraseña
				=============================================*/

				if(!empty($_POST["password_admin"])){

					$crypt = crypt($_POST["password_admin"], '$2a$07$azybxcags23425sdg23sdfhsd$');

				}else{

					$crypt = $admin->results[0]->password_admin;
					
				}

				/*=============================================
				Subir cambios a base de datos
				=============================================*/

				$url = "admins?id=".$admin->results[0]->id_admin."&nameId=id_admin&token=".$_SESSION["admin"]->token_admin."&table=admins&suffix=admin";	
				$method = "PUT";

				if($admin->results[0]->rol_admin == "superadmin"){

					$fields = "email_admin=".$_POST["email_admin"]."&password_admin=".$crypt."&title_admin=".$_POST["title_admin"]."&symbol_admin=".$_POST["symbol_admin"]."&font_admin=".urlencode($_POST["font_admin"])."&color_admin=".$_POST["color_admin"]."&back_admin=".$_POST["back_admin"];

				}else{

					$fields = "email_admin=".$_POST["email_admin"]."&password_admin=".$crypt;
				}

				$updateAdmin = CurlController::request($url,$method,$fields);

				if($updateAdmin->status == 200){

					$_SESSION["admin"]->email_admin = $_POST["email_admin"];

					echo '

					<script>

						fncMatPreloader("off");
						fncFormatInputs();
					    fncSweetAlert("success","El registro ha sido actualizado con éxito",setTimeout(()=>location.reload(),1250));
						
					</script>

					';

				}

			}else{

				echo '

				<script>

				    fncToastr("error","El registro no existe");
					fncMatPreloader("off");
					fncFormatInputs();

				</script>

				';
			}



		}

	}

}