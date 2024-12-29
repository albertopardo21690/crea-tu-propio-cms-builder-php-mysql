<!--=====================================
BUTTONS
======================================-->

<div class="col-12 col-lg-6">
  
		<div class="d-flex flex-row-reverse">

			<?php if (isset($_SESSION["admin"])): ?>

				<div class="p-1">
					<button type="button" class="btn btn-sm py-2 px-3 bg-info-50 font-weight-bold rounded" id="startAll">
						<i class="bi bi-arrow-up-circle pe-1"></i> Start All
					</button>
				</div>

			<?php else: ?>

				<div class="p-1">
					<a href="#myLogin" class="btn btn-sm py-2 px-3 bg-info-50 font-weight-bold rounded"  data-bs-toggle="modal">
						<i class="bi bi-arrow-up-circle pe-1"></i> Start All
					</a>
				</div>
				
			<?php endif ?>

			
			<div class="p-1">
				<div class="custom-file">
					<input 
					type="file" 
					class="custom-file-input d-none" 
					id="customFile"
					accept="image/*,video/*,audio/*,.pdf,.zip"
					multiple
					onchange="uploadFiles(event, 'btn', '<?php echo date("Y-m-d, H:m:s") ?>')"
					>
					<label class="btn btn-sm py-2 px-3 bg-success-50 font-weight-bold rounded" for="customFile">
						<i class="bi bi-plus-lg pe-1"></i> Add Files
					</label>
				</div>
			</div>
		</div>

</div>