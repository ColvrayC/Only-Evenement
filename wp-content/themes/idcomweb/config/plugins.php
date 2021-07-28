<?php
$outils=array(
	"lightbox"=>array(
		"name"=>"Lighbox 2",
		"desc"=>"Pour afficher des images en lightbox",
		"doc"=>"http://lokeshdhakar.com/projects/lightbox2/#getting-started",
		"ver"=>"2.10.0",
		"cdn"=>array(
			"js"=>"https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js",
			"css"=>"https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css"
		)
	),
	"mixitup"=>array(
		"name"=>"MixItUp",
		"desc"=>"Permet de charger des galerie en masonry avec filtres",
		"doc"=>"https://www.kunkalabs.com/mixitup/docs/get-started/",
		"ver"=>"3.3.0",
		"cdn"=>array(
			"js"=>"https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.0/mixitup.min.js",
			"css"=>""
		)
	),
	"fontawesome"=>array(
		"name"=>"FontAwesome",
		"desc"=>"Charger la police d'icones FontAwesome",
		"doc"=>"https://fontawesome.com/icons",
		"ver"=>"5.0.10",
		"cdn"=>array(
			"js"=>"",
			"css"=>"https://use.fontawesome.com/releases/v5.0.10/css/all.css"
		)
	),
	"hyphenator"=>array(
		"name"=>"Hyphenator",
		"desc"=>"Pour avoir des textes correctement justifiés",
		"doc"=>"https://github.com/mnater/Hyphenator/blob/wiki/en_HowToUseHyphenator.md",
		"ver"=>"5.3.0",
		"cdn"=>array(
			"js"=>"https://cdnjs.cloudflare.com/ajax/libs/Hyphenator/5.3.0/Hyphenator.min.js",
			"css"=>""
		)
	),
	"animate"=>array(
		"name"=>"Animate.css",
		"desc"=>"charger la librairie d'animation CSS",
		"doc"=>"https://daneden.github.io/animate.css/",
		"ver"=>"3.5.2",
		"cdn"=>array(
			"js"=>"",
			"css"=>"https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"
		)
	),
	"wow"=>array(
		"name"=>"Wow.js",
		"desc"=>"Pour charger les animations de 'animate.css' au défilement des pages",
		"doc"=>"http://mynameismatthieu.com/WOW/docs.html",
		"ver"=>"3.5.2",
		"cdn"=>array(
			"js"=>"https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js",
			"css"=>""
		)
	),
	"fullpage"=>array(
		"name"=>"Fullpage.js",
		"desc"=>"Pour créer des pages en plein écran",
		"doc"=>"https://github.com/alvarotrigo/fullPage.js/#fullpagejs",
		"ver"=>"2.9.7",
		"cdn"=>array(
			"js"=>"https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.min.js",
			"css"=>"https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.min.css"
		)
	),
	"owl"=>array(
		"name"=>"Owl carrousel",
		"desc"=>"Pour créer diaporama simple",
		"doc"=>"https://owlcarousel2.github.io/OwlCarousel2/docs/started-welcome.html",
		"ver"=>"2.3.4",
		"cdn"=>array(
			"js"=>"https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js",
			"css"=>"https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
		)
	),
	"jquery-mask-input"=>array(
		"name"=>"jQuery Mask Input",
		"desc"=>"Pour faire des masques de saisie sur des champs de formulaires",
		"doc"=>"https://igorescobar.github.io/jQuery-Mask-Plugin/docs.html",
		"ver"=>"1.14.15",
		"cdn"=>array(
			"js"=>"https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.15/dist/jquery.mask.min.js",
			"css"=>""
		)
	),
);
define("IDCOM_OUTILS",json_encode($outils));
?>