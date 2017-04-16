<?php

	switch ($muutuja) {
		case 'galerii':
			galerii();
		break;

		case 'portfoolio':
			portfoolio();
		break;
		
		default:
			vaikimisi();
		break;
	}

	function galerii() {
	    include_once("views/head.html");
		include("views/galerii.html");
		include_once("views/foot.html");
	}

	function portfoolio() {
	    include_once("views/head.html");
		include("views/portfoolio.html");
		include_once("views/foot.html");
	}

	function vaikimisi() {
	    include_once("views/head.html");
		include("views/home.html");
		include_once("views/foot.html");
	}




?>