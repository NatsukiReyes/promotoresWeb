$(document).ready(inicio);

function inicio(){
	cargaBusqueda2();
	busquedaAutomatica();
	$('#busqueda').submit(function(evento){
		evento.preventDefault();
	});
	$(".header .boton").click(boton);
	// $("#buscar").click(cargaBusqueda);
}

function boton(){
	// obtener el valor de un boton para encontrar un celular
	$("#busqueda").each (function(){
		this.reset();
	});
	dir=$(this).attr('value');
	$("#contenedor").load("celulares.php?marca=" + dir);
}

function busquedaAutomatica(){
	$("#busca").keyup(function(){
		$('#contenedor').html('<div class="noresultados"><h1>Cargando...</h1></div>');
		var url="noticiaBusqueda.php";
		var busqueda= $("#busca").val();
		$.ajax({
			type: "POST",
			url: url,
			data: "noticia="+busqueda,
			success: function(res){
				$("#contenedor").html(res);
			}
		});
		return false;
	});
}

function cargaBusqueda2(){
	$('#contenedor').html('<div class="noresultados"><h1>Cargando...</h1></div>');
	var url="noticiaBusqueda.php";
	$.ajax({
		type: "POST",
		url: url,
		data: ("noticia"),
		success: function(res){
			$("#contenedor").html(res);
		}
	});
	return false;
}

	// $('#contenedor').html('<div class="noresultados"><h1>Cargando...</h1></div>');
	// var url="celularBusqueda.php";
	// $.ajax({
	// 	type: "POST",
	// 	url: url,
	// 	data: ($("#busqueda").serialize()),
	// 	success: function(res){
	// 		$("#contenedor").html(res);
	// 	}
	// });
	// return false;