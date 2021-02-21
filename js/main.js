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
			formRegistro.addEventListener('submit', validarSingIn);
	
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
					if((event.keyCode < 48 || event.keyCode > 57) && event.keyCode !==8){
						return false;
					}
				});
			});
	
			$(function(){
				$(".no-numeros").keydown(function(event){
					//alert(event.keyCode);
					if((event.keyCode < 65 || event.keyCode > 90) && (event.keyCode < 97 || event.keyCode > 122) && event.keyCode !==32 && event.keyCode !==8){
						return false;
					}
				});
			});
	
			function validarLogIn(e){
				e.preventDefault();
			
				var usuarioLogIn = document.getElementById('tel').value;
	
				if(!(usuarioLogIn.length === 10)){
					mostrarNotificacion('Número telefonico de 10 caracteres', 'error');
				}
			}
	
			function validarSingIn(e){
				e.preventDefault();
				var erroresRegistro = '';
	
				var newTel = document.getElementById('nw-tel').value;
				if(!(newTel.length === 10)){
					erroresRegistro = 'Número telefonico de 10 caracteres.';
				}

				const FechaNa = document.getElementById('fechaNa').value;
				var anoNa = parseInt(FechaNa[0]+FechaNa[1]+FechaNa[2]+FechaNa[3], 10);
				var mesNa = parseInt(FechaNa[5]+FechaNa[6], 10);
				var diaNa = parseInt(FechaNa[8]+FechaNa[9], 10);
				var f = new Date();
				var adulto = false;
				if(f.getFullYear() - anoNa>=18){
					if(f.getMonth()+1>mesNa){
						adulto = true;
					}else if(f.getMonth()+1 === mesNa && f.getDate() >= diaNa){
						adulto = true;
					}
				}
		
				if(!adulto){
					erroresRegistro = erroresRegistro + ' Edad minima de 18 años.';
				}
	
				var newPass = document.getElementById('nw-pass').value;
				var ConfirPass  = document.getElementById('cf-pass').value;
				if(newPass.length<8){
					erroresRegistro = erroresRegistro + ' La contraseña debe contener almenos 8 caracteres.';
				}else if(!(newPass === ConfirPass)){
					erroresRegistro = erroresRegistro + ' La contraseña no coinciden.';
					$('#nw-pass').val('');
					$('#cf-pass').val('');
				}
	
				if(!(erroresRegistro === '')){
					mostrarNotificacion(erroresRegistro, 'error');
				}else{
					mostrarNotificacion('Chi', 'correcto');
				}
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
