
//JQUERY EJECUTARA LA FUNCION DOCUMENTOCARADO CUANDO ESTE LISTO
$(document).ready(documentoCargado);



function documentoCargado(){

$("#contenedorInicioSesion").hide().show(300);

$("#formu-inicio").submit(inicioSesion);

$("#formu-registro").submit(registroUsuario);

$("#btnRegistrarse").click(limpiarLogo);

$("#crearProyecto").submit(crearProyecto);

}


function crearProyecto(eventoSubmit){
	//Con prevent default se desactiva la accion por defecto en este caso refrescar la pagina 
	eventoSubmit.preventDefault();

	//Se crea una tabla hash con los nombres asignados en los input del html
	var tablaHashDatos = $("#crearProyecto").serialize();

	//AJAX, la idea es que los datos viajen hasta el controlador

	$.ajax({
		url : "controlador.php",
		type : "POST",
		data : tablaHashDatos,
		beforeSend : function(){
			$("#creandoProyecto").html("<img class='miImagen' src='../img/load.gif'>");
		},
		success : function (res){
			if(res == 1){
				$("#creandoProyecto").html("<img class='miImagen' src='../img/done.png'>");
			}else{
				$("#creandoProyecto").html("<img class='miImagen' src='../img/error.png'>");;
				//$("#creandoProyecto").html(res);;
			}
		}

	});
}



function inicioSesion(eventoSubmit){

	//Con prevent default se desactiva la accion por defecto en este caso refrescar la pagina 
	eventoSubmit.preventDefault();

	//Se crea una tabla hash con los nombres asignados en los input del html
	var tablaHashDatos = $("#formu-inicio").serialize();

	//AJAX, la idea es que los datos viajen hasta el controlador

	$.ajax({
		url : "admin/controlador.php",
		type : "POST",
		data : tablaHashDatos,
		beforeSend : function(){
			$("#cargando").html("<img class='miImagen' src='img/load.gif'>");
		},
		success : function (res){
			if(res == 1){
				window.location = "admin/index.php";
				//$("#cargando").html("<img class='miImagen' src='img/done.png'>");

			}else{
				$("#cargando").html("<img class='miImagen' src='img/error.png'>");;
			}
		}

	});

}


function limpiarLogo(eventoSubmit){
	//Con prevent default se desactiva la accion por defecto en este caso refrescar la pagina 
	eventoSubmit.preventDefault();

	
	$("#cargando").html("<span></span>");

}

function registroUsuario(eventoSubmit){
	//Con prevent default se desactiva la accion por defecto en este caso refrescar la pagina 
	eventoSubmit.preventDefault();

	//Se crea una tabla hash con los nombres asignados en los input del html
	var tablaHashDatos = $("#formu-registro").serialize();

	//AJAX, la idea es que los datos viajen hasta el controlador

	$.ajax({
		url : "admin/controlador.php",
		type : "POST",
		data : tablaHashDatos,
		beforeSend : function(){
			$("#registrando").html("<img class='miImagen' src='img/load.gif'>");
		},
		success : function (res){
			if(res == 1){
				$("#registrando").html("<img class='miImagen' src='img/done.png'>");
			}else{
				$("#registrando").html(res);
			}
		}

	});

}
