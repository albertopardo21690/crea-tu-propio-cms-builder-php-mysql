<?php if ($module->columns[$i]->type_column == "object"): ?>


	<div class="itemsObject">

		<?php if (!empty($data) && !empty(json_decode(urldecode($data[$module->columns[$i]->title_column])))): ?>

		<?php foreach (json_decode(urldecode($data[$module->columns[$i]->title_column])) as $key => $value): ?>

			<div class="row row-cols-1 row-cols-sm-2 itemObject">
				
				<div class="col">
					
					<div class="form-floating mb-3">
						<input 
						type="text"
						class="form-control rounded changeItemObject propertyObject"
						titleColumn="<?php echo $module->columns[$i]->title_column ?>"
						value="<?php echo $key ?>"
						>

						<label>Propiedad</label>

					</div>

				</div>

				<div class="col">
					
					<div class="form-floating mb-3">
						
						<input 
						type="text"
						class="form-control rounded position-relative changeItemObject valueObject"
						value="<?php echo $value ?>"
						>

						<label>Valor</label>

						<button type="button" class="btn btn-sm position-absolute removeObject" position="_<?php echo $key ?>" style="top:0; right:0;">
							<i class="bi bi-x"></i>
						</button>

					</div>
					
				</div>

			</div>	
			
		<?php endforeach ?>


		<?php else: ?>
		
			<div class="row row-cols-1 row-cols-sm-2 itemObject">
				
				<div class="col">
					
					<div class="form-floating mb-3">
						<input 
						type="text"
						class="form-control rounded changeItemObject propertyObject"
						titleColumn="<?php echo $module->columns[$i]->title_column ?>"
						>

						<label>Propiedad</label>

					</div>

				</div>

				<div class="col">
					
					<div class="form-floating mb-3">
						
						<input 
						type="text"
						class="form-control rounded position-relative changeItemObject valueObject">

						<label>Valor</label>

						<button type="button" class="btn btn-sm position-absolute removeObject" position="_0" style="top:0; right:0;">
							<i class="bi bi-x"></i>
						</button>

					</div>
					
				</div>

			</div>	

		<?php endif ?>

	</div>

	<button type="button" class="btn btn-sm btn-default backColor rounded addObject"><small>Add Item</small></button>

	<?php if (!empty($data)): ?>

		<input type="hidden" name="<?php echo $module->columns[$i]->title_column ?>" id="<?php echo $module->columns[$i]->title_column ?>" value='<?php echo urldecode($data[$module->columns[$i]->title_column]) ?>'>

	<?php else: ?>

		<input type="hidden" name="<?php echo $module->columns[$i]->title_column ?>" id="<?php echo $module->columns[$i]->title_column ?>" value='{}'>

	<?php endif ?>	
<?php endif ?>