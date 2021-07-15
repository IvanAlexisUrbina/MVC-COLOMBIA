$(document).ready(function(){

$(document).on("keyup","#filtro1",function(){

var buscar=$(this).val();
var url="../../controller/ciudad/filtro.php";

$.ajax({
	url:url,
	data:"ciu="+buscar,
	type:"POST",
	success:function(datos){
		$("tbody").html(datos);
	}
});

});

});


