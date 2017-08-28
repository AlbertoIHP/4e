
//JQUERY EJECUTARA LA FUNCION DOCUMENTOCARADO CUANDO ESTE LISTO
$(document).ready(documentoCargado);



	function documentoCargado(){

		$(document.body).hide(0).show(300);

		$(".btn").hide(0).show(300);

		$("#contenedorInicioSesion").hide(0).show(300);

		$("#formu-inicio").submit(inicioSesion);

		$("#formu-registro").submit(registroUsuario);

		$("#btnRegistrarse").click(limpiarLogo);

		$("#crearProyecto").submit(crearProyecto);

		$("#agregarStakeholder").submit(agregarStakeholder);

		$("#cargarProyecto").submit(cargarProyecto);

		$('[data-toggle="tooltip"]').tooltip();

		$(".stakeholders").click(abrirVetanaAgregarGoal);

		$(".goals").click(abrirVentanaAgregarSoftgoal);

		$(".softgoals").click(abrirVentanaAgregarNfr);

		$("#agregarGoal").submit(agregarGoal);

		$("#agregarSoftgoal").submit(agregarSoftgoal);

		$("#agregarNfr").submit(agregarNfr);

		$(".jerarquizar").click(abrirVentanaJerarquizar);


		$("#jerarquizar").submit(jerarquizarProyecto);
	}


		function jerarquizarProyecto(eventoSubmit){
			eventoSubmit.preventDefault();
			$("#jerarquizando").html("<img class='miImagen' src='../img/load.gif'>");
		}



		function abrirVentanaJerarquizar(eventoSubmit){
			//Con prevent default se desactiva la accion por defecto en este caso refrescar la pagina 
			eventoSubmit.preventDefault();
			//Se crea una tabla hash con los nombres asignados en los input del html
			var id = $(this).val();
			//alert(id+" "+nombre);
			$('#modalJerarquizar').modal('show');

			$(".valorNombreJerarquizar").html("<input type='hidden' id='nombreJerarquizar' name='nombreJerarquizar' value='"+id+"'>");

			$(".nombreJerarquizar").html("<label>Jerarquizando proyecto "+id+" </label>");



		}

		function agregarNfr(eventoSubmit){
			//Con prevent default se desactiva la accion por defecto en este caso refrescar la pagina 
			eventoSubmit.preventDefault();

			//Se crea una tabla hash con los nombres asignados en los input del html
			var tablaHashDatos = $("#agregarNfr").serialize();

			//alert(tablaHashDatos);

			$.ajax({
				url : "controlador.php",
				type : "POST",
				data : tablaHashDatos,
				beforeSend : function(){
					$("#agregandoNfr").html("<img class='miImagen' src='../img/load.gif'>");
				},
				success : function (res){
					if(res == 1){
						$("#agregandoNfr").html("<img class='miImagen' src='../img/done.png'>");
						window.location = "index.php";
					}else{
						$("#agregandoNfr").html("<img class='miImagen' src='../img/error.png'>");;
						//$("#agregandoGoal").html(res);
					}
				}

			});
		}

		function abrirVentanaAgregarNfr(eventoSubmit){
			//Con prevent default se desactiva la accion por defecto en este caso refrescar la pagina 
			eventoSubmit.preventDefault();
			//Se crea una tabla hash con los nombres asignados en los input del html
			var id = $(this).val();
			var nombre = $(this).text();
			//alert(id+" "+nombre);
			$('#modalAgregarNfr').modal('show');

			$(".valorIdSubgoal").html("<input type='hidden' id='idSubgoal' name='idSubgoal' value='"+id+"'>");

			$(".nombreAgregarNfr").html("<label>Agregar NFR a "+nombre+" </label>");
		}


		function agregarSoftgoal(eventoSubmit){
			//Con prevent default se desactiva la accion por defecto en este caso refrescar la pagina 
			eventoSubmit.preventDefault();

			//Se crea una tabla hash con los nombres asignados en los input del html
			var tablaHashDatos = $("#agregarSoftgoal").serialize();

			//alert(tablaHashDatos);

			$.ajax({
				url : "controlador.php",
				type : "POST",
				data : tablaHashDatos,
				beforeSend : function(){
					$("#agregandoSoftgoal").html("<img class='miImagen' src='../img/load.gif'>");
				},
				success : function (res){
					if(res == 1){
						$("#agregandoSoftgoal").html("<img class='miImagen' src='../img/done.png'>");
						window.location = "index.php";
					}else{
						$("#agregandoSoftgoal").html("<img class='miImagen' src='../img/error.png'>");;
						//$("#agregandoGoal").html(res);
					}
				}

			});

			}


		function abrirVetanaAgregarGoal(eventoSubmit){
			//Con prevent default se desactiva la accion por defecto en este caso refrescar la pagina 
			eventoSubmit.preventDefault();
			//Se crea una tabla hash con los nombres asignados en los input del html
			var id = $(this).val();
			var nombre = $(this).text();
			//alert(id+" "+nombre);
			$('#modalAgregarGoal').modal('show');

			$(".valorid").html("<input type='hidden' id='idStakeholder' name='idStakeholder' value='"+id+"'>");

			$(".nombreAgrega").html("<label>Agregar Goal a "+nombre+" </label>");

		}


		function abrirVentanaAgregarSoftgoal(eventoSubmit){
			//Con prevent default se desactiva la accion por defecto en este caso refrescar la pagina 
			eventoSubmit.preventDefault();
			//Se crea una tabla hash con los nombres asignados en los input del html
			var id = $(this).val();
			var nombre = $(this).text();
			//alert(id+" "+nombre);
			$('#modalAgregarSoftgoal').modal('show');

			$(".valorIdGoal").html("<input type='hidden' id='idGoal' name='idGoal' value='"+id+"'>");

			$(".nombreAgregaGoal").html("<label>Agregar Softgoal a "+nombre+" </label>");
		}

		function agregarGoal(eventoSubmit){

			//Con prevent default se desactiva la accion por defecto en este caso refrescar la pagina 
			eventoSubmit.preventDefault();

			//Se crea una tabla hash con los nombres asignados en los input del html
			var tablaHashDatos = $("#agregarGoal").serialize();


			$.ajax({
				url : "controlador.php",
				type : "POST",
				data : tablaHashDatos,
				beforeSend : function(){
					$("#agregandoGoal").html("<img class='miImagen' src='../img/load.gif'>");
				},
				success : function (res){
					if(res == 1){
						$("#agregandoGoal").html("<img class='miImagen' src='../img/done.png'>");
						window.location = "index.php";
					}else{
						$("#agregandoGoal").html("<img class='miImagen' src='../img/error.png'>");;
						//$("#agregandoGoal").html(res);
					}
				}

			});

		}


		function cargarProyecto(eventoSubmit){
			//Con prevent default se desactiva la accion por defecto en este caso refrescar la pagina 
			eventoSubmit.preventDefault();

			//Se crea una tabla hash con los nombres asignados en los input del html
			var tablaHashDatos = $("#cargarProyecto").serialize();

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
						window.location = "miProyecto.php";
					}else{
						$("#creandoProyecto").html("<img class='miImagen' src='../img/error.png'>");;
						//$("#creandoProyecto").html(res);
					}
				}

			});
		}


		function agregarStakeholder(eventoSubmit){
			//Con prevent default se desactiva la accion por defecto en este caso refrescar la pagina 
			eventoSubmit.preventDefault();

			//Se crea una tabla hash con los nombres asignados en los input del html
			var tablaHashDatos = $("#agregarStakeholder").serialize();


			//AJAX, la idea es que los datos viajen hasta el controlador

			$.ajax({
				url : "controlador.php",
				type : "POST",
				data : tablaHashDatos,
				beforeSend : function(){
					$("#agregandoStake").html("<img class='miImagen' src='../img/load.gif'>");
				},
				success : function (res){
					if(res == 1){
						$("#agregandoStake").html("<img class='miImagen' src='../img/done.png'>");
						window.location = "index.php";
					}else{
						$("#agregandoStake").html("<img class='miImagen' src='../img/error.png'>");
					}
				}

			});

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
						window.location = "miProyecto.php";
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
