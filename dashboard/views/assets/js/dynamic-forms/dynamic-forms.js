/*=============================================
Actualizar la matriz del select
=============================================*/

$(document).on("change",".changeSelectType",function(){

	var matrix_column = $(this).val();
	var id_column = $(this).attr("idColumn");
	var title_column = $(this).attr("titleColumn");
	var pre_value = $(this).attr("preValue");
	
	var data = new FormData();
	data.append("matrix_column",matrix_column);
	data.append("id_column",id_column);
	data.append("pre_value",pre_value);
	data.append("token", localStorage.getItem("tokenAdmin"));

	$.ajax({
		url:"/ajax/dynamic-forms.ajax.php",
		method: "POST",
		data: data,
		contentType: false,
		cache: false,
		processData: false,
		success: function (response){

			$("#"+title_column).html(response);
			
		}

	})

})

/*=============================================
Adicionar un nuevo objeto
=============================================*/

$(document).on("click",".addObject",function(){

	var itemObjectLength = $(".itemObject").length;
	
	$(".itemsObject:last").append($(".itemsObject .itemObject:first")[0].outerHTML.replace(/_0/g, "_"+itemObjectLength));

})


/*=============================================
Quitar un objeto
=============================================*/

$(document).on("click",".removeObject",function(){

	if($(this).attr("position") == "_0"){

		fncToastr("error", "Debe existir un item de objeto");

		return;
	}

	$(this).parent().parent().parent().remove();

	changeItemObject();

})

/*=============================================
Cuando ingresamos datos al objeto
=============================================*/

$(document).on("change",".changeItemObject",function(){

	changeItemObject();

})

/*=============================================
Función cuando cambia el objeto
=============================================*/

function changeItemObject(){

	var propertyObject = $(".propertyObject");
	var valueObject = $(".valueObject");

	var object = '{';

	propertyObject.each((i)=>{

		object +='"'+ $(propertyObject[i]).val()+'":"'+$(valueObject[i]).val()+'",';
		
	})

	object = object.slice(0, -1);
	object += '}';
	
	$("#"+$(propertyObject[0]).attr("titleColumn")).val(object);
}

/*=============================================
Adicionar un nuevo item para el json
=============================================*/

$(document).on("click",".addJson",function(){

	var itemJsonLength = $(".itemJson").length;
	
	$(".itemsJson").append($(".itemsJson .itemJson:first")[0].outerHTML.replace(/_0/g, "_"+itemJsonLength));

})

/*=============================================
Quitar un objeto
=============================================*/

$(document).on("click",".removeJson",function(){

	if($(this).attr("position") == "_0"){

		fncToastr("error", "Debe existir un item de objeto");

		return;
	}

	$(this).parent().parent().parent().remove();

	changeItemJson();

})

/*=============================================
Cuando ingresamos datos al Json
=============================================*/

$(document).on("change",".changeItemJson",function(){

	changeItemJson();

})

/*=============================================
Adicionar un grupo de objetos
=============================================*/

$(document).on("click",".addJsonGroup",function(){

	var jsonGroupLength = $(".jsonGroup").length;

	$(".jsonGroup:last").after($(".jsonGroup:first")[0].outerHTML.replace(/0_/g, jsonGroupLength+"_"));

})

/*=============================================
Remover un grupo de objetos
=============================================*/
$(document).on("click",".removeJsonGroup",function(){

	if($(".jsonGroup").length == 1){

		fncToastr("error", "Debe existir un grupo de objetos");

		return;

	}

	$(this).parent().remove();

	changeItemJson();

})

/*=============================================
Función cuando cambia el Json
=============================================*/

function changeItemJson(){

	var jsonGroup = $(".jsonGroup");

	var jSon = '[';

	jsonGroup.each((f)=>{

		var propertyJson = $("."+$(jsonGroup[f]).attr("position")+"propertyJson");
		var valueJson = $("."+$(jsonGroup[f]).attr("position")+"valueJson");

		jSon += '{';

		propertyJson.each((i)=>{

			jSon +='"'+$(propertyJson[i]).val()+'":"'+$(valueJson[i]).val()+'",';
			
		})

		jSon = jSon.slice(0, -1);
		jSon += '},';

	})

	jSon = jSon.slice(0, -1);
	jSon += ']';
	
	$("#"+$(jsonGroup[0]).attr("titleColumn")).val(jSon);
}

/*=============================================
Abrir ventana modal de archivos
=============================================*/

$(document).on("click",".myFiles",function(){

	$("#myFiles").modal("show");

	var input = $(this).parent().find("input");

	$("#myFiles").on('shown.bs.modal', function() {

		$(".modal-body").find(".copyLink").append().html(`<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
			<path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708"/>
		</svg>`);

		$(document).on("click",".copyLink",function(){

			$(input).val($(this).attr("copy"));

			$("#myFiles").modal("hide");

		})

	})

})