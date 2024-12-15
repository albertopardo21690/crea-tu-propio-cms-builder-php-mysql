<div class="container-fluid backgroundImage" <?php if (!empty($admin->back_admin)): ?>
	style="background-image: url(<?php echo $admin->back_admin ?>)"
<?php else: ?>
	style="background-color:  #f0f0f5 !important"
<?php endif ?>>
	
	<div class="d-flex flex-wrap justify-content-center align-content-center vh-100">
		
		<div class="card border-0 rounded shadow p-4 w-25" style="min-width:320px !important">
			
			<form method="POST" class="needs-validation" novalidate>
				
				<h3 class="pt-3 text-center">
					<?php echo $admin->symbol_admin ?> <?php echo $admin->title_admin ?>
				</h3>

				<hr>

				<div class="form-group mb-3">
					
					<label for="email_admin">Correo</label>

					<input 
					type="email"
					class="form-control rounded"
					id="email_admin"
					name="email_admin"
					placeholder="Escribe el correo"
					required
					>

					<div class="valid-feedback">Válido.</div>
    				<div class="invalid-feedback">Campo inválido.</div>

				</div>

				<div class="form-group mb-3">

					<div class="row mb-1">
						<div class="col-5">
							<label for="password_admin">Contraseña</label>
						</div>
						<div class="col-7 text-end">
							<a href="#" class="textColor" style="font-size:12px">¿Olvidaste la contraseña?</a>
						</div>
					</div>

					<div class="input-group">
	
						<input 
						type="password"
						class="form-control rounded-start"
						id="password_admin"
						name="password_admin"
						placeholder="Escribe la contraseña"
						required
						>

						<span class="input-group-text rounded-end">
							<i class="bi bi-eye-slash" style="cursor:pointer"></i>
						</span>

					</div>

					<div class="valid-feedback">Válido.</div>
    				<div class="invalid-feedback">Campo inválido.</div>

				</div>


				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="remember">
					<label class="form-check-label" for="remember">Recordar Ingreso</label>
				</div>

				<button type="submit" class="btn btn-dark btn-block w-100 rounded mt-3 backColor">Enviar</button>


				<?php 
				
				require_once "controllers/admins.controller.php";
				$login = new AdminsController();
				$login -> login();

				?>

			</form>

		</div>

	</div>


</div>