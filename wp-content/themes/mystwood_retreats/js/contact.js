$(document).ready(function($) {
	$('#google-map').gmap3({
		marker: {
			address: "117 Milsons Arm Road Wollombi NSW 2325"
		},
		map: {
			options: {
				zoom: 11
			}
		}
	});
});