$(document).ready(function(){

	$(document).on("keyup","#filtro",function(){
			var url=$(this).attr('data-url');
			var buscar=$(this).val();

			$.ajax({
				url:url,
				data:"buscar="+buscar,
				type:"POST",
				success:function(datos){
					$("tbody").html(datos);
				}


			})
	});

	$(document).on("click","#cambiar",function(){
		var ruta = $("#imagen").attr("src");
		$("#cambioImagen").html("<input type='file' name='ciu_imagen'>");
		$("#cambioImagen").append("<input type='hidden' name='imagen_vieja' value='"+ruta+"'>");

	});

	$(document).on("click",".botonModal",function(){
		var title = $(this).val();

		var url=$(this).attr("data-url");
		var datos=$(this).attr("data-id");
		// var datos=$(this).val();
		if(datos==""){
			datos=0;
		}
		
		$.ajax({
			url:url,
			data:"datos="+datos,
			type:"POST",
			success:function(datos){
				$("#contenedor").html(datos);
				$("#modal-title").html(title);
				$("#modal").modal("show");
			}
		});
	});

	$("#alert").delay(4000).fadeOut();

	$(document).on("change","#selectDepto",function(){
		var id =$(this).val();
		var url=$(this).attr("data-url");
		$.ajax({
			url:url,
			data:"id="+id,
			type:"POST",
			success:function(datos){
				$("#selectCiudad").parent().removeClass("d-none");
				$("#selectCiudad").html(datos);
			}
		});
	});
});