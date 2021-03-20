(function() {
	'use strict';
	document.addEventListener('DOMContentLoaded', function() {
        var session = {
            'total': 0,
            'catidad': 0,
            'productos': []
        };

        $(document).ready(function(){
            $('body').on('click', '#contenido-muestra .btn-addcar', function(){
              //alert($(this).attr('id'))
              agregarCarrito($(this).attr('id'));
            })
        })

        function agregarCarrito(id){
            session.productos.push({ 'id': id, 'precio': 450, 'cantidad': 1 });

            // Convirte el JSON string con JSON.stringify()
            // entonces guarda con localStorage con el nombre de la sesión
            localStorage.setItem('session', JSON.stringify(session));

            // Ejemplo de como transformar el String generado usando
            // JSON.stringify() y guardándolo en localStorage como objeto JSON otra vez
            var restoredSession = JSON.parse(localStorage.getItem('session'));

            // Ahora la variable restoredSession contiene el objeto que fue guardado
            // en localStorage
            console.log(restoredSession);
        }

	});

})();
