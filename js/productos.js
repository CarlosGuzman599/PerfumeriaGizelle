(function() {
	'use strict';
	document.addEventListener('DOMContentLoaded', function() {
        
        var btnBuscar = document.getElementById('btn-buscar');
        btnBuscar.addEventListener('click', BuscarProducto);

        //AjaxNativo
        function BuscarProducto(){
            var ctnBuscar = document.getElementById('txt-buscar').value;
            var slCategoria = document.getElementById('sl-categoria').value;
            
            var xhr = new XMLHttpRequest();
            xhr.open("GET", `includes/templates/funciones/listado_productos.php?tipo=bs&bs=${ctnBuscar}&catego=${slCategoria}`, true);
            
            xhr.onload = function(){
                if(xhr.status == 200){
                    var ContenedorMuestra = document.getElementById('productos-mostrar');
                    ContenedorMuestra.innerHTML = xhr.responseText;
                }
            }
            xhr.send();
        }

        $.ajax({
            type:'GET',
            url:'includes/templates/funciones/modificar_cliente.php',
            data: datos,
            success:function(e){
                //console.log(e);
                var estado = JSON.parse(e);
                if(estado.respuesta == 'correcto'){
                    console.log(estado);
                }else{
                    mostrarNotificacion(estado.tipo, 'error');
                }
            }
        });

	});

})();
