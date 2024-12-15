<?php if ($module->columns[$i]->type_column == "json"): ?>

	<?php if (!empty($data) && !empty(json_decode(urldecode($data[$module->columns[$i]->title_column])))):?>

		<?php foreach (json_decode(urldecode($data[$module->columns[$i]->title_column])) as $key => $value): ?>

			<div class="rounded p-2 border mb-3 jsonGroup" position="<?php echo $key ?>_" titleColumn="<?php echo $module->columns[$i]->title_column ?>">

				<?php foreach ($value as $index => $item): ?>
	
					<div class="itemsJson">

						<div class="row row-cols-1 row-cols-sm-2 itemJson">

							<div class="col">
							
								<div class="form-floating mb-3">
									
									<input 
									type="text"
									class="form-control rounded changeItemJson <?php echo $key ?>_propertyJson"
									value="<?php echo $index ?>" 
									>

									<label>Propiedad</label>

								</div>

							</div>

							<div class="col">
								
								<div class="form-floating mb-3">
									
									<input 
									type="text"
									class="form-control rounded position-relative changeItemJson <?php echo $key ?>_valueJson"
									value="<?php echo $item ?>" 
									>

									<label>Valor</label>

									<button type="button" class="btn btn-sm position-absolute removeJson" position="_<?php echo $index ?>" style="top:0; right:0;">
										<i class="bi bi-x"></i>
									</button>

								</div>
								
							</div>

						</div>

					</div>

				<?php endforeach ?>

				<button type="button" class="btn btn-sm btn-default backColor rounded addJson float-start">
					<small>Add Item</small>
				</button>
				<button type="button" class="btn btn-sm btn-default border rounded removeJsonGroup float-end">
					<small>Remove Group</small>
				</button>
				<div class="clearfix"></div>

			</div>

		<?php endforeach ?>		

	<?php else: ?>	

		<div class="rounded p-2 border mb-3 jsonGroup" position="0_" titleColumn="<?php echo $module->columns[$i]->title_column ?>">
			
			<div class="itemsJson">

				<div class="row row-cols-1 row-cols-sm-2 itemJson">

					<div class="col">
					
						<div class="form-floating mb-3">
							
							<input 
							type="text"
							class="form-control rounded changeItemJson 0_propertyJson"
							>

							<label>Propiedad</label>

						</div>

					</div>

					<div class="col">
						
						<div class="form-floating mb-3">
							
							<input 
							type="text"
							class="form-control rounded position-relative changeItemJson 0_valueJson">

							<label>Valor</label>

							<button type="button" class="btn btn-sm position-absolute removeJson" position="_0" style="top:0; right:0;">
								<i class="bi bi-x"></i>
							</button>

						</div>
						
					</div>

				</div>
				

			</div>

			<button type="button" class="btn btn-sm btn-default backColor rounded addJson float-start">
				<small>Add Item</small>
			</button>
			<button type="button" class="btn btn-sm btn-default border rounded removeJsonGroup float-end">
				<small>Remove Group</small>
			</button>
			<div class="clearfix"></div>

		</div>

	<?php endif ?>

	<button type="button" class="btn btn-sm btn-default backColor rounded addJsonGroup float-end">
		<small>Add Group</small>
	</button>

	<?php if (!empty($data)): ?>

		<input type="hidden" name="<?php echo $module->columns[$i]->title_column ?>" id="<?php echo $module->columns[$i]->title_column ?>" value='<?php echo urldecode($data[$module->columns[$i]->title_column]) ?>'>

	<?php else: ?>

		<input type="hidden" name="<?php echo $module->columns[$i]->title_column ?>" id="<?php echo $module->columns[$i]->title_column ?>" value='[]'>

	<?php endif ?>	

<?php endif ?>