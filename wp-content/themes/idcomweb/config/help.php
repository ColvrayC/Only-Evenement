<?php

function idcomcrea_informations_client_page(){

	if(isset($_POST['valid'])){
            
        update_option( "entreprise", $_POST['entreprise'] );

		update_option( "proprietaire", $_POST['proprietaire'] );	
		
		update_option( "nom_prenom_responsable_publi", $_POST['nom_prenom_responsable_publi'] );
		
		update_option( "email_responsable_publi", $_POST['email_responsable_publi'] );	

		update_option( "siret", $_POST['siret'] );	

		update_option( "adresse", $_POST['adresse'] );	

		update_option( "cp", $_POST['cp'] );	

		update_option( "ville", $_POST['ville'] );	

		update_option( "tel", $_POST['tel'] );	

		update_option( "fax", $_POST['fax'] );	

		update_option( "email", $_POST['email'] );	

		update_option( "mobile", $_POST['mobile'] );		

	}

	?>

    <h1>Informations client</h1>

    <p>Veuillez indiquer ici les informations relatives à votre société.</p>

    <form action="" method="post">

    <table class="form-table">

        <tbody> 
            
            <tr>

                <th scope="row"><label for="entreprise">Entreprise</label></th>

                <td><input name="entreprise" type="text" id="entreprise" value="<?php echo get_option('entreprise') ?>" class="regular-text"></td>

            </tr>

            <tr>

                <th scope="row"><label for="proprietaire">Propriétaire</label></th>

                <td><input name="proprietaire" type="text" id="proprietaire" value="<?php echo get_option('proprietaire') ?>" class="regular-text"></td>

            </tr>  

            <tr>

                <th scope="row"><label for="siret">SIRET</label></th>

                <td><input name="siret" type="text" id="siret" value="<?php echo get_option('siret') ?>" class="regular-text"></td>

            </tr>  
            
            <tr>

                <th scope="row"><label for="nom_prenom_responsable_publi">Nom et prénom du responsable des publications</label></th>

                <td><input name="nom_prenom_responsable_publi" type="text" id="nom_prenom_responsable_publi" value="<?php echo get_option('nom_prenom_responsable_publi') ?>" class="regular-text"><div><small>Exemple : Mr Jean DUPONT</small></div></td>

            </tr> 
            
            <tr>

                <th scope="row"><label for="email_responsable_publi">Email du responsable des publications</label></th>

                <td><input name="email_responsable_publi" type="text" id="email_responsable_publi" value="<?php echo get_option('email_responsable_publi') ?>" class="regular-text"></td>

            </tr>

            <tr>

                <th scope="row"><label for="adresse">Adresse</label></th>

                <td><input name="adresse" type="text" id="adresse" value="<?php echo get_option('adresse') ?>" class="regular-text"></td>

            </tr>  

            <tr>

                <th scope="row"><label for="cp">Code postal</label></th>

                <td><input name="cp" type="text" id="cp" value="<?php echo get_option('cp') ?>" class="regular-text"></td>

            </tr>  

            <tr>

                <th scope="row"><label for="ville">Ville</label></th>

                <td><input name="ville" type="text" id="ville" value="<?php echo get_option('ville') ?>" class="regular-text"></td>

            </tr>  

            <tr>

                <th scope="row"><label for="tel">Téléphone</label></th>

                <td><input name="tel" type="text" id="tel" value="<?php echo get_option('tel') ?>" class="regular-text"></td>

            </tr>  

            <tr>

                <th scope="row"><label for="email">Email</label></th>

                <td><input name="email" type="email" id="email" value="<?php echo get_option('email') ?>" class="regular-text"></td>

            </tr>  

            <tr>

                <th scope="row"><label for="mobile">Mobile</label></th>

                <td><input name="mobile" type="text" id="mobile" value="<?php echo get_option('mobile') ?>" class="regular-text"></td>

            </tr>  

        </tbody>

    </table>

    <input type="submit" name="valid" value="Mettre à jour" />

    </form>

    <?php

}

function suppression_widgets_dashboard(){
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['side']['core']);
    unset($wp_meta_boxes['dashboard']['normal']['core']);
}

add_action('wp_dashboard_setup', 'suppression_widgets_dashboard' );

add_action('wp_dashboard_setup', 'init_widget_bienvenue');
function init_widget_bienvenue() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('widget_bienvenue', 'IDCOMWEB', 'widget_bienvenue');
	wp_add_dashboard_widget('widget_contact', 'Besoin d\'aide ?', 'widget_contact');
	$wp_meta_boxes['dashboard']['side']['core'][]["widget_bienvenue"] = array("id"=>"widget_bienvenue","title"=>"");
	$wp_meta_boxes['dashboard']['normal']['core'][]["widget_contact"] = array("id"=>"widget_contact","title"=>"");
}

function widget_bienvenue() {
?>
	
	<style type="text/css">
		#widget_bienvenue .inside{
			text-align : center;
		}
		
		#widget_bienvenue .inside img{
			width : 210px;
			height : auto;
			display : inline-block;
		} 
	</style>
	
<?php
	echo '<p><img src="'.get_stylesheet_directory_uri().'/agence/idcom-web.png" alt=""  /></p>';

}

function widget_contact() {
	echo '<div style="padding:10px;"><p>Vous souhaitez obtenir des informations complémentaires ou faire évoluer votre site internet ?<br />N\'hésitez pas à nous contacter :</p>';
	echo '<p><strong>IDCOMWEB</strong><br />7 Avenue de la Victoire, 01000 Bourg-en-Bresse</p>';
	echo '<p><strong>Téléphone</strong> : 04 69 19 34 65</p>';
	echo '<p><strong>E-Mail    </strong>: <a href="mailto:sav@groupe-idcom.fr">sav@groupe-idcom</a></p></div>';
}

function logo_idcomcrea() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/agence/idcom-web.png) !important;
            padding: 20px !important;
			width:150px !important;
			height:150px !important;
			background-size:100% 100% !important;
			display: block;
			margin:0 auto;
        }
		body,html {
			background: #000028 !important;
		}
		#wp-submit{
			background:#000028 !important;
			color:#fff;
			text-shadow: none;
			font-size:1.2em;
			border-radius:0;
			border:none;
			transition:0.4s all;
			-webkit-transition:0.4s all;
			-moz-transition:0.4s all;
		}
		#wp-submit:hover{
			background:#1faeb2 !important;
		}
		.loginform{
			box-shadow: 0 0 10px #000028;
		}
		.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover,.wp-core-ui .button-primary{
			background: #ba1f53 !important;
			border-color: #ba1f53 !important;
			-webkit-box-shadow: inset 0 1px 0 rgba(120,200,230,.6) !important;
			box-shadow: inset 0 1px 0 rgba(120,200,230,.6) !important;
			color: #fff !important;
		}
		.login .message{
			border-color: #ba1f53 !important;
		}
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'logo_idcomcrea' );

function logo_idcomcrea_url() {
    return home_url();
}

add_filter( 'login_headerurl', 'logo_idcomcrea_url' );

function link_to_stylesheet() {
        if ( is_user_logged_in() ) {
        ?>

        <style type="text/css">
			#wpadminbar,#adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {
				background: #000 !important;
			}
			#adminmenu .wp-submenu a:focus, #adminmenu .wp-submenu a:hover, #adminmenu a:hover, #adminmenu li.menu-top>a:focus,#adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus,#adminmenu li a:focus div.wp-menu-image:before, #adminmenu li.opensub div.wp-menu-image:before, #adminmenu li:hover div.wp-menu-image:before{
				color:#ba1f53 !important;
			}

			#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu{
				background: #ba1f53 !important;
				color:#fff !important;
			}

			#wp-admin-bar-wpseo-menu,#wp-admin-bar-comments{
				display:none !important;	
			}

			.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover,.wp-core-ui .button-primary{
				background: #ba1f53 !important;
				border-color: #ba1f53 !important;
				-webkit-box-shadow: inset 0 1px 0 rgba(120,200,230,.6) !important;
				box-shadow: inset 0 1px 0 rgba(120,200,230,.6) !important;
				color: #fff !important;
			}
			#wpfooter{
				display:none !important;	
			}
        </style>
<?php 

	} 

}


add_action( 'admin_menu', 'idcomcrea_informations_client' );
function idcomcrea_informations_client(){

	add_menu_page( 'Coordonnées client', 'Coordonnées client', 'edit_posts', 'idcomcrea_informations_client_page', 'idcomcrea_informations_client_page','dashicons-id',1); 

}
?>