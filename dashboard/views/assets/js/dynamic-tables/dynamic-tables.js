/*=============================================
Eliminar Item Individual
=============================================*/
$(document).on("click",".deleteItem",function(){

	var idItem = $(this).attr("idItem");
	var table = $(this).attr("table");
	var suffix = $(this).attr("suffix");

	fncSweetAlert("confirm","¿Está seguro de borrar este registro?","").then(resp=>{

		if(resp){

			fncMatPreloader("on");
			fncSweetAlert("loading","Eliminando registro...","");

			var data = new FormData();
			data.append("idItemDelete", idItem);
			data.append("tableDelete", table);
			data.append("suffixDelete", suffix);
			data.append("token", localStorage.getItem("tokenAdmin"));			

			$.ajax({

				url:"/ajax/dynamic-tables.ajax.php",
				method: "POST",
				data: data,
				contentType: false,
				cache: false,
				processData: false,
				success: function (response){ 
					
					if(response == 200){

						fncMatPreloader("off");
						fncSweetAlert("success", "El registro ha sido eliminado con éxito", setTimeout(()=>location.reload(),1250))

					}
				}
			
			})	

		}


	})
		
})
