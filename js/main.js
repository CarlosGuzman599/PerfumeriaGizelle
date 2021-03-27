(function() {
	'use strict';

	document.addEventListener('DOMContentLoaded', function() {

		// Mapa
		if (document.getElementById('mapa')) {
			var map = L.map('mapa').setView([ 19.7041317,-103.4637139 ], 16);

			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

			L.marker([ 19.7041317,-103.4637139 ]).addTo(map).bindPopup('Perfumeria Gizelle').openPopup()
			 .bindTooltip('Plaza el Portal');
		}

		//menu mobil
		$('.menu-movil').on('click', function() {
			$('.navegacion-principal').slideToggle();
		});

		//Valida Fomularios inicio sesion
		if(document.getElementById('contenedor-formulario')){
			const btInicio = document.getElementById('btn-inicio');
			const btnRegistro = document.getElementById('btn-registro');
			const formInicio = document.getElementById('form-inicio');
			const formRegistro = document.getElementById('form-registro');
			const formularioLogIn = document.getElementById('form-inicio');
			formularioLogIn.addEventListener('submit', validarLogIn);
			formRegistro.addEventListener('submit', validarRegistro);
	
			btInicio.addEventListener('click', function(){
				btInicio.style.color = '#FFFFFF';
				btnRegistro.style.color = '#20B900';
				formInicio.classList.remove('ocultar');
				formRegistro.classList.add('ocultar');
			});
	
			btnRegistro.addEventListener('click', function(){
				btnRegistro.style.color = '#FFFFFF';
				btInicio.style.color = '#20B900';
				formRegistro.classList.remove('ocultar');
				formInicio.classList.add('ocultar');
			});
	
			$(function(){
				$(".no-letras").keydown(function(event){
					//alert(event.keyCode);
					if((event.keyCode < 48 || event.keyCode > 57) && event.keyCode !==8 && event.keyCode !==9 && event.keyCode !==94){
						return false;
					}
				});
			});
	
			$(function(){
				$(".no-numeros").keydown(function(event){
					//alert(event.keyCode);
					if((event.keyCode < 65 || event.keyCode > 90) && (event.keyCode < 97 || event.keyCode > 122) && event.keyCode !==32 && event.keyCode !==8 && event.keyCode !==9 && event.keyCode !==94){
						return false;
					}
				});
			});
	
			function validarLogIn(e){
				e.preventDefault();
			
				var usuarioLogIn = document.getElementById('tel').value;
	
				if(!(usuarioLogIn.length === 10)){
					mostrarNotificacion("Error!: "+'Número telefonico de 10 caracteres', 'error');
				}else{
					logIn_registro($('#form-inicio').serialize());
				}
			}
	
			function validarRegistro(e){
				e.preventDefault();
				var erroresRegistro = '';

				var nwNombre = document.getElementById('nombre').value;
				var newApellido = document.getElementById('apellido').value;
				var newTel = document.getElementById('nw-tel').value;
				var nwemail = document.getElementById('email').value;
				var fechaNa = document.getElementById('fechaNa').value;
				var newPass = document.getElementById('nw-pass').value;
				//Solo para confirmar
				var confirPass  = document.getElementById('cf-pass').value;
				//hasta aqui


				if(nwNombre.length>30){
					erroresRegistro = 'Nombre menor de 30 caracteres.';
				}

				
				if(newApellido.length>30){
					erroresRegistro = erroresRegistro + ' Apellido menor de 30 caracteres.';
				}

	
				
				if(!(newTel.length === 10)){
					erroresRegistro = erroresRegistro +' Número telefonico de 10 caracteres.';
				}

				
				if(nwemail.length>50){
					erroresRegistro = erroresRegistro +' Correo menor de 50 caracteres.';
				}

				
				var anoNa = parseInt(fechaNa[0]+fechaNa[1]+fechaNa[2]+fechaNa[3], 10);
				var mesNa = parseInt(fechaNa[5]+fechaNa[6], 10);
				var diaNa = parseInt(fechaNa[8]+fechaNa[9], 10);
				var f = new Date();
				var adulto = false;
				if(parseInt(f.getFullYear()) - anoNa>=18){
					if((parseInt(f.getFullYear()) - anoNa>18)){
						adulto = true;
					}else if(parseInt(f.getMonth())+1>mesNa){
						adulto = true;
					}else if(parseInt(f.getMonth())+1 === mesNa && parseInt(f.getDate()) >= diaNa){
						adulto = true;
					}
				}
		
				if(!adulto){
					erroresRegistro = erroresRegistro + ' Edad minima de 18 años.';
				}
	

				if(newPass.length<8){
					erroresRegistro = erroresRegistro + ' La contraseña debe contener almenos 8 caracteres.';
					$('#nw-pass').val('');
					$('#cf-pass').val('');
				}else if(!(newPass === confirPass)){
					erroresRegistro = erroresRegistro + ' La contraseña no coinciden.';
					$('#nw-pass').val('');
					$('#cf-pass').val('');
				}
	
				if(!(erroresRegistro === '')){
					mostrarNotificacion("Error!: "+erroresRegistro, 'error');
				}else{
					logIn_registro($('#form-registro').serialize());
				}
			}

			function logIn_registro(datos){
				$.ajax({
					type:'POST',
					url:'includes/templates/funciones/login_register.php',
					data: datos,
					success:function(e){
						//console.log(e);
						var estado = JSON.parse(e);
						if(estado.respuesta == 'correcto'){
							mostrarNotificacion('Bienvenido '+estado.datos.nombre, 'correcto');
							setTimeout(function(){
								window.location.href = 'index.php'
							}, 2000)
						}else{
							mostrarNotificacion(estado.tipo, 'error');
						}
					}
				});
				return false;
			}
		}

		//Valida Fomularios me
		if(document.getElementById('formularios-me')){
			const formularioModificaCliente = document.getElementById('form-modificar-cliente');
			formularioModificaCliente.addEventListener('submit', validaModificaionPersonal);
			const formularioModificaClientDireccion = document.getElementById('form-envio');
			formularioModificaClientDireccion.addEventListener('submit', ValidaModificacionClienteDireccion);

			function validaModificaionPersonal(e){
				e.preventDefault();
				var erroresRegistro = '';
				var nwNombre = document.getElementById('nombre').value;
				var newApellido = document.getElementById('apellido').value;
				var newTel = document.getElementById('nw-tel').value;
				var nwemail = document.getElementById('email').value;
				var fechaNa = document.getElementById('fechaNa').value;
				var oldPass = document.getElementById('old-pass').value;
				var nwPass = document.getElementById('nw-pass').value;
				var cfPass = document.getElementById('cf-pass').value;

				if(nwNombre.length>30){
					erroresRegistro = 'Nombre menor de 30 caracteres.';
				}

				
				if(newApellido.length>30){
					erroresRegistro = erroresRegistro + ' Apellido menor de 30 caracteres.';
				}

	
				
				if(!(newTel.length === 10)){
					erroresRegistro = erroresRegistro +' Número telefonico de 10 caracteres.';
				}

				
				if(nwemail.length>50){
					erroresRegistro = erroresRegistro +' Correo menor de 50 caracteres.';
				}

				var anoNa = parseInt(fechaNa[0]+fechaNa[1]+fechaNa[2]+fechaNa[3], 10);
				var mesNa = parseInt(fechaNa[5]+fechaNa[6], 10);
				var diaNa = parseInt(fechaNa[8]+fechaNa[9], 10);
				var f = new Date();
				var adulto = false;
				if(parseInt(f.getFullYear()) - anoNa>=18){
					if((parseInt(f.getFullYear()) - anoNa>18)){
						adulto = true;
					}else if(parseInt(f.getMonth())+1>mesNa){
						adulto = true;
					}else if(parseInt(f.getMonth())+1 === mesNa && parseInt(f.getDate()) >= diaNa){
						adulto = true;
					}
				}
		
				if(!adulto){
					erroresRegistro = erroresRegistro + ' Edad minima de 18 años.';
				}

				var contValidaCamposPass = 0;
				if(!(oldPass==='')){contValidaCamposPass = contValidaCamposPass+1}
				if(!(nwPass==='')){contValidaCamposPass = contValidaCamposPass+1}
				if(!(cfPass==='')){contValidaCamposPass = contValidaCamposPass+1}

				if(contValidaCamposPass===1||contValidaCamposPass===2){
					erroresRegistro = erroresRegistro +' Cambio de contraseña requiere todos los campos.';
					$('#old-pass').val('');
					$('#cf-pass').val('');
					$('#nw-pass').val('');
				}else if(contValidaCamposPass===3){
					if(nwPass.length<8){
						erroresRegistro = erroresRegistro + ' La contraseña debe contener almenos 8 caracteres.';
						$('#old-pass').val('');
						$('#cf-pass').val('');
						$('#nw-pass').val('');
					}else if(!(nwPass===cfPass)){
						erroresRegistro = erroresRegistro + ' La contraseña no coinciden.';
						$('#old-pass').val('');
						$('#cf-pass').val('');
						$('#nw-pass').val('');
					}else{
						//PruevaCodigoInicio
						$.ajax({
							type:'POST',
							url:'includes/templates/funciones/modificar_cliente.php',
							data: "accion=valida_olpass&old-pass="+oldPass,
							success:function(e){
								var estado = JSON.parse(e);
								if(estado.respuesta == 'error'){
									mostrarNotificacion("Error!:SinCambioDeContraseña Contraseña anterio no coinciden ", 'alerta');
									$('#old-pass').val('');
									$('#cf-pass').val('');
									$('#nw-pass').val('');
								}
							}
						});
						//PruevaCodigoFin
					}
				}

				setTimeout(function(){
					if(!(erroresRegistro === '')){
						mostrarNotificacion("Error!: "+erroresRegistro, 'error');
					}else{
						modificaInformacionPersonal($('#form-modificar-cliente').serialize());
					}
				}, 2000)
			}

			function modificaInformacionPersonal(datos){
				$.ajax({
					type:'POST',
					url:'includes/templates/funciones/modificar_cliente.php',
					data: datos,
					success:function(e){
						//console.log(e);
						var estado = JSON.parse(e);
						if(estado.respuesta == 'correcto' && estado.pass==='si'){
							mostrarNotificacion("Modificacion de información y password !!!Correcta¡¡¡", 'correcto');
						}else if(estado.respuesta == 'correcto' && estado.pass==='no'){
							mostrarNotificacion("Modificacion de información !!!Correcta¡¡¡", 'correcto');
						}else{
							mostrarNotificacion(estado.tipo, 'error');
							if(estado.old_tel){
								$('#nw-tel').val(estado.old_tel);
							}
						}
						$('#old-pass').val('');
						$('#cf-pass').val('');
						$('#nw-pass').val('');
					}
				});
				return false;
			}

			function ValidaModificacionClienteDireccion(e){
				e.preventDefault();
				var erroresRegistro = '';
				var Pais = document.getElementById('pais').value;
				var Estado = document.getElementById('entidad-f').value;
				var Ciudad  = document.getElementById('ciudad').value;
				var Cp = document.getElementById('cp').value;
				var Calle = document.getElementById('calle').value;
				var NumExte = document.getElementById('numero-ext').value;
				var NumInt = document.getElementById('numero-int').value;

				if(Pais.length>30){erroresRegistro=erroresRegistro+"Pais debe contener máximo 30 caracteres."}

				if(Estado.length>40){erroresRegistro=erroresRegistro+" Estado debe contener máximo 40 caracteres."}

				if(Ciudad.length>50){erroresRegistro=erroresRegistro+" Ciudad debe contener máximo 50 caracteres."}
				
				if(!(Cp.length===5)){erroresRegistro=erroresRegistro+" Código postal debe contener 5 caracteres."}

				if(Calle.length>50){erroresRegistro=erroresRegistro+" Calle debe contener máximo 50 caracteres."}

				if(NumExte.length>6){erroresRegistro=erroresRegistro+" Número exterior debe contener máximo 6 caracteres."}

				if(NumInt.length>6){erroresRegistro=erroresRegistro+" Número interior debe contener máximo 6 caracteres."}

				if(!(erroresRegistro === '')){
					mostrarNotificacion("Error!: "+erroresRegistro, 'error');
				}else{
					modificaInformacionEnvioCliente($('#form-envio').serialize());
				}
			}

			function modificaInformacionEnvioCliente(datos){
				$.ajax({
					type:'POST',
					url:'includes/templates/funciones/modificar_cliente.php',
					data: datos,
					success:function(e){
						//console.log(e);
						var estado = JSON.parse(e);
						if(estado.respuesta == 'correcto'){
							//console.log(estado);
							mostrarNotificacion("Datos domiciliarios almacenados correctamente", 'correcto');
						}else{
							mostrarNotificacion(estado.tipo, 'error');
						}
					}
				});
				return false;
			}
		}

		if(document.getElementById('productos-mostrar')){
			$(document).ready(function(){
				$('body').on('click', '#contenido-muestra .btn-addcar', function(){
				  //alert($(this).attr('id'))
				  agregarCarrito($(this).attr('id'))
				})
			})

			function agregarCarrito(id){
				$.ajax({
					type:'POST',
					url:'includes/templates/funciones/carrito.php',
					data: "accion=add&id="+id,
					success:function(e){
						//console.log(e);
						var estado = JSON.parse(e);
						if(estado.respuesta == 'correcto'){
							//console.log(estado);
							document.getElementById('total_items').innerHTML = estado.datos.total_items;
							mostrarNotificacion("Nuevo articulo en carrito", 'correcto');
						}else{
							mostrarNotificacion(estado.tipo, 'error');
							setTimeout(function(){
								window.location.href = 'productos.php'
							}, 1000)
						}
					}
				});
				return false;
			}
		}

		function mostrarNotificacion(mensaje, clase) {
			const formularioContenedor = document.getElementById('barra');
			var notificacion = document.createElement('div');
			notificacion.classList.add(clase, 'notificacion', 'sombra');
			notificacion.textContent = mensaje;
			// formulario
			formularioContenedor.insertBefore(notificacion, document.querySelector('barra'));
	   
			// Ocultar y Mostrar la notificacion
			setTimeout(() => {
				 notificacion.classList.add('visible');
				 setTimeout(() => {
					  notificacion.classList.remove('visible');           
					  setTimeout(() => {
						   notificacion.remove();
					  }, 500)
				 }, 3000);
			}, 100);
	   
	   	}

	});

})();
