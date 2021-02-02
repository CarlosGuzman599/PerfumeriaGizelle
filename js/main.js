(function() {
	'use strict';
	var regalo = document.getElementById('regalo');

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

	});

})();
