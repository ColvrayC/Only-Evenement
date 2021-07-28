<?php
date_default_timezone_set('Europe/Paris');
function the_slug_exists($post_name) {
    global $wpdb;
    if($wpdb->get_row("SELECT post_name FROM " . $wpdb->posts . " WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
        return true;
    } else {
        return false;
    }
}
add_action( 'admin_menu', 'idcomcrea_parametres' );
function idcomcrea_parametres() {
	add_menu_page( 'IDCOMCREA', 'IDCOMCREA', 'manage_options', 'admin_idcomcrea', 'admin_idcomcrea', 'dashicons-welcome-view-site', 99 );
	add_submenu_page( 'admin_idcomcrea','Thème', '<i class="dashicons dashicons-admin-customizer"></i> Thème', 'update_core', 'admin_idcomcrea#theme','admin_idcomcrea');
	add_submenu_page( 'admin_idcomcrea','Plugins', '<i class="dashicons 
dashicons-feedback"></i> Plugins', 'update_core', 'admin_idcomcrea#plugins','admin_idcomcrea');
	add_submenu_page( 'admin_idcomcrea','Pages', '<i class="dashicons 
dashicons-networking"></i> Pages', 'update_core', 'admin_idcomcrea#pages','admin_idcomcrea');
	add_submenu_page( 'admin_idcomcrea','Pages', '<i class="dashicons dashicons-lock"></i> Verrouillage pages', 'update_core', 'admin_idcomcrea#pages','admin_idcomcrea');
	add_submenu_page( 'admin_idcomcrea','Mise en ligne', '<i class="dashicons 
dashicons-admin-site"></i> Mise en ligne', 'update_core', 'admin_idcomcrea#mel','admin_idcomcrea');

}

/* Initialisation des fonctionnalités du theme */
add_action( 'after_setup_theme', 'idcomcrea_installation' );
function idcomcrea_installation() {
	
	load_theme_textdomain( 'idcomcrea', get_template_directory() . '/languages' );
	add_theme_support( 'post-thumbnails', array( 'post','page' ) ); 
	add_action('admin_head', 'link_to_stylesheet');
	remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu' );
	add_image_size( 'mini', 250, 250, array( 'center', 'center' ));
	add_filter( 'jpeg_quality', function(){return 80;} );
	register_nav_menu( 'primary', __( 'Menu principal', 'idcomcrea' ) );
	register_nav_menu( 'secondary', __( 'Sous menu', 'idcomcrea' ) );
	$nouveauRole = add_role(
		'client_idcom',
		__( 'Client IDCOMCREA' ),
		array(
			"switch_themes" => 0,
			"edit_themes" => 0,
			"activate_plugins" => 0,
			"edit_plugins" => 0,
			"edit_users" => 0,
			"edit_files" => 1,
			"manage_options" => 0,
			"moderate_comments" => 0,
			"manage_categories" => 1,
			"manage_links" => 1,
			"upload_files" => 1,
			"import" => 0,
			"unfiltered_html" => 0,
			"edit_posts" => 1,
			"edit_others_posts" => 1,
			"edit_published_posts" => 1,
			"publish_posts" => 1,
			"edit_pages" => 1,
			"read" => 1,
			"level_10" => 0,
			"level_9" => 0,
			"level_8" => 0,
			"level_7" => 1,
			"level_6" => 1,
			"level_5" => 1,
			"level_4" => 1,
			"level_3" => 1,
			"level_2" => 1,
			"level_1" => 1,
			"level_0" => 1,
			"edit_others_pages" => 1,
			"edit_published_pages" => 1,
			"publish_pages" => 1,
			"delete_pages" => 1,
			"delete_others_pages" => 1,
			"delete_published_pages" => 1,
			"delete_posts" => 1,
			"delete_others_posts" => 1,
			"delete_published_posts" => 1,
			"delete_private_posts" => 1,
			"edit_private_posts" => 1,
			"read_private_posts" => 1,
			"delete_private_pages" => 1,
			"edit_private_pages" => 1,
			"read_private_pages" => 1,
			"delete_users" => 0,
			"create_users" => 0,
			"unfiltered_upload" => 0,
			"edit_dashboard" => 1,
			"update_plugins" => 0,
			"delete_plugins" => 0,
			"install_plugins" => 0,
			"update_themes" => 0,
			"install_themes" => 0,
			"update_core" => 0,
			"list_users" => 0,
			"remove_users" => 0,
			"add_users" => 0,
			"promote_users" => 0,
			"edit_theme_options" => 0,
			"delete_themes" => 0,
			"export" =>0,
			"edit_comment" => 0,
			"approve_comment" => 0,
			"unapprove_comment" => 0,
			"reply_comment" => 0,
			"quick_edit_comment" => 0,
			"spam_comment" => 0,
			"unspam_comment" => 0,
			"trash_comment" => 0,
			"untrash_comment" => 0,
			"delete_comment" => 0,
			"edit_permalink" => 1,
		)
	);

}
function remove_menus(){
  
	// remove_menu_page( 'index.php' );                  //Dashboard
	remove_menu_page( 'jetpack' );                    //Jetpack*
	if(the_slug_exists("actualites")==false){
		remove_menu_page( 'edit.php' );   
	}
	//Posts
	//remove_menu_page( 'upload.php' );                 //Media
	// remove_menu_page( 'edit.php?post_type=page' );    //Pages
	remove_menu_page( 'edit-comments.php' );          //Comments
	remove_menu_page( 'themes.php' );                 //Appearance
	remove_menu_page( 'plugins.php' );                //Plugins
	remove_menu_page( 'users.php' );                  //Users
	remove_menu_page( 'tools.php' );                  //Tools
	remove_menu_page( 'options-general.php' );        //Settings
  
}
if( is_user_logged_in() ) {
    $user = wp_get_current_user();
    $role = ( array ) $user->roles;
	if($role[0]=="client_idcom"){
		add_action( 'admin_menu', 'remove_menus' );
	}
}
function admin_idcomcrea(){
	if(isset($_POST['valid'])){
		$fields=explode(",",$_POST['fields']);
		foreach($fields as $c){
			update_option($c,isset($_POST[$c])?$_POST[$c]:"");
		}
	}
	if(isset($_POST['valid_pages'])){
		foreach($_POST as $c=>$v){
			switch($c){
				case "accueil":if(the_slug_exists("accueil")==false){ $pid=wp_insert_post(array('guid'=>get_site_url(null,"/accueil/"),'post_content' => '','post_title' => 'Accueil',	'post_status' => 'publish','post_name' => 'accueil','post_type' => 'page'));update_option("show_on_front","page");update_option("page_on_front",$pid);} break;
				case "actus":if(the_slug_exists("actualites")==false){$pid=wp_insert_post(array('guid'=>get_site_url(null,"/actualites/"),'post_content' => '','post_title' => 'Actualités','post_name' => 'actualites','post_status' => 'publish','post_type' => 'page'));update_option("show_on_front","page");update_option("page_for_posts",$pid);}break;
				case "galerie":if(the_slug_exists("galerie")==false){$pid=wp_insert_post(array('guid'=>get_site_url(null,"/galerie/"),'post_content' => '','post_title' => 'Galerie des réalisations','post_name' => 'galerie','post_status' => 'publish','post_type' => 'page'));}break;
				case "mentions":if(the_slug_exists("mentions")==false){$pid=wp_insert_post(array('guid'=>get_site_url(null,"/mentions/"),'post_content' => '[mentions_legales]','post_name' => 'mentions','post_title' => 'Mentions légales','post_status' => 'publish','post_type' => 'page'));}break;
			}
		}
	}
	?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<h1 class="mdl-layout-title">Administration IDCOMCREA</h1>
	
	<div class="container mdl-tabs mdl-js-tabs mdl-js-ripple-effect" id="myTabs">
		<div class="mdl-tabs__tab-bar">
		  <a href="#theme" class="mdl-tabs__tab is-active">Thème</a>
		  <a href="#plugins" class="mdl-tabs__tab">Plugins</a>
		  <a href="#pages" class="mdl-tabs__tab">Pages</a>		  
		  <a href="#mel" class="mdl-tabs__tab">Mise en ligne</a>
		  <a href="#checklist" class="mdl-tabs__tab">Checklist</a>
		  <a href="#infos" class="mdl-tabs__tab">Informations</a>
		</div>
	 	<div class="mdl-tabs__panel is-active" id="theme">
	 	<h2 class="mdl-layout-title">Plugins</h2>
	 	<form action="admin.php?page=admin_idcomcrea#theme" method="post" class="form_idcom">
	 	<input type="hidden" name="fields" value="" />
	 	<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
		  <thead>
			<tr>
		  		<th></th>
				<th class="mdl-data-table__cell--non-numeric">Plugin</th>
				<th class="mdl-data-table__cell--non-numeric">Description</th>
				<th>Version</th>
				<th>Documentation</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php
		foreach(json_decode(IDCOM_OUTILS,true) as $c=>$v){
		?>
		<tr>
		  	<td>
		  		<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-<?php echo $c; ?>">
				  <input type="checkbox" id="switch-<?php echo $c; ?>" name="<?php echo "idcom_plugin_".$c; ?>" class="mdl-switch__input" value="true" <?php echo get_option("idcom_plugin_".$c,"false")=="true"?"checked":""; ?>>
				  <span class="mdl-switch__label"></span>
				</label>
		  	</td>
			<td class="mdl-data-table__cell--non-numeric"><?php echo $v['name']; ?></td>
			<td class="mdl-data-table__cell--non-numeric"><?php echo $v['desc']; ?></td>
			<td><?php echo $v['ver']; ?></td>
			<td><a href="<?php echo $v['doc']; ?>" target="_blank">voir la doc</a></td>
			</tr>
	<?php
		}
	?>
			
			
		  </tbody>
		</table>
			<div class="mdl-cell mdl-cell--12-col">
				<button class="mdl-button mdl-js-button mdl-button--raised" type="submit" name="valid">
				  Enregistrer les plugins
				</button>
			</div>
			</form>
		</div>
		<div class="mdl-tabs__panel" id="pages">
		<div class="mdl-grid">
		<div class="mdl-cell mdl-cell--6-col mdl-cell--6-col-tablet">
		<h2 class="mdl-layout-title">Pages de contenu</h2>
	 	<form action="admin.php?page=admin_idcomcrea#pages" method="post" class="form_idcom">
			<input type="hidden" name="fields" value="" />
			<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 90%">
				<thead>
					<tr>
						<th></th>
						<th class="mdl-data-table__cell--non-numeric">Pages</th>
					</tr>
				</thead>
			<tbody>
				<tr>
					<td>
						<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-accueil">
						<input type="checkbox" id="switch-accueil" name="accueil" class="mdl-switch__input" value="true" <?php echo the_slug_exists("accueil")!=false?"checked":"";?>>
						<span class="mdl-switch__label"></span>
						</label>
					</td>
					<td class="mdl-data-table__cell--non-numeric"><label for="switch-accueil">Page d'accueil</label></td>
				</tr>
				<tr>
					<td>
						<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-actus">
						<input type="checkbox" id="switch-actus" name="actus" class="mdl-switch__input" value="true" <?php echo the_slug_exists("actualites")!=false?"checked":"";?>>
						<span class="mdl-switch__label"></span>
						</label>
					</td>
					<td class="mdl-data-table__cell--non-numeric"><label for="switch-actus">Page d'actualités</label></td>
				</tr>
				<tr>
					<td>
						<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-galerie">
						<input type="checkbox" id="switch-galerie" name="galerie" class="mdl-switch__input" value="true" <?php echo the_slug_exists("galerie")!=false?"checked":"";?>>
						<span class="mdl-switch__label"></span>
						</label>
					</td>
					<td class="mdl-data-table__cell--non-numeric"><label for="switch-galerie">Page de galerie</label></td>
				</tr>
				<tr>
					<td>
						<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-mentions">
						<input type="checkbox" id="switch-mentions" name="mentions" class="mdl-switch__input" value="true" <?php echo the_slug_exists("mentions")!=false?"checked":"";?>>
						<span class="mdl-switch__label"></span>
						</label>
					</td>
					<td class="mdl-data-table__cell--non-numeric"><label for="switch-mentions">Mentions légales</label></td>
				</tr>
			</tbody>
			</table>
			<div class="mdl-cell mdl-cell--12-col">
				<button class="mdl-button mdl-js-button mdl-button--raised" type="submit" name="valid_pages">
				Créer les pages de contenus
				</button>
			</div>
		</form>
			</div>
			<div class="mdl-cell mdl-cell--6-col mdl-cell--6-col-tablet">
			<?php
			global $SLT_LockPages_var;
			$SLT_LockPages_var->admin_options_page();
			?>
			</div>
			</div>
		</div>
		</div>
	 	<div class="mdl-tabs__panel" id="plugins">
	 	<?php
		$t=new TGM_Plugin_Activation();
		//$t->init();
		$t->install_plugins_page();
		?>
		</div>
	 	<div class="mdl-tabs__panel" id="mel">
			<form action="admin.php?page=admin_idcomcrea#mel" method="post" class="form_idcom">
			<input type="hidden" name="fields" value="" />
			<div class="mdl-cell mdl-cell--12-col">
				<div class="mdl-textfield mdl-js-textfield">
					<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="en_ligne">
					  <input type="checkbox" name="en_ligne" id="en_ligne" class="mdl-switch__input" value="prod" <?php echo get_option("en_ligne","dev")=="prod"?"checked":""; ?>>
					  <span class="mdl-switch__label">Site en ligne ?</span>
					</label>
				</div>
			</div>
			<div class="mdl-cell mdl-cell--12-col">
			<label>Texte de la page en construction</label>
			<?php wp_editor(get_option('en_contruction'),"en_contruction",array("teeny"=>true,"editor_height"=>150)); ?>
			</div>
			<div class="mdl-cell mdl-cell--12-col">
			<label>Mentions légales</label>
			<?php
			include("mentions.php");
			wp_editor(empty(get_option('mentions_legales',''))?$mentions:stripslashes(get_option("mentions_legales","")),"mentions_legales",array("teeny"=>true,"editor_height"=>450)); ?>
			</div>
			<div class="mdl-cell mdl-cell--12-col">
				<button class="mdl-button mdl-js-button mdl-button--raised" type="submit" name="valid">
				  Enregistrer les paramètres
				</button>
			</div>
			</form>
		</div>
		
		<div class="mdl-tabs__panel" id="infos">
			<h2 class="mdl-layout-title">Plugins intégrés au thème</h2>
			<p>Pour ajouter un plugin dans le thème il faut l'ajouter dans le fichier /config/plugins.php</p>
			<p>&nbsp;</p>
			<hr />
			<h3 class="mdl-layout-title">Installation</h3>
<p>Une fois le thème installé et activé, il personnalise  l&rsquo;administration et la page de connexion aux couleurs IDCOMCREA.<br>
<strong>Il faut penser à  mettre un fichier logo.png dans le dossier «&nbsp;img&nbsp;» afin qu&rsquo;il  apparaisse sur la page d&rsquo;attente.</strong><br>
Lorsque le thème est installé il ajoute deux liens  supplémentaires dans le back-office&nbsp;: </p>
            <ul>
              <li><strong>«&nbsp;Coordonnées  client&nbsp;»</strong>&nbsp;: qui permet de stocker les coordonnées pour les  réutiliser sur le site et elles sont également utilisées dans les mentions  légales automatiques.</li>
              <li><strong>«&nbsp;Apparence  &gt; Extensions requises&nbsp;»&nbsp;</strong>: c&rsquo;est une page permettant  d&rsquo;installer rapidement plusieurs extensions que nous utilisons.</li>
            </ul>
            <p><strong>Accéder au  site sans avoir la page d&rsquo;attente</strong><br>
              Si le site n&rsquo;est pas en ligne, il y a par défaut une page  d&rsquo;attente, pour voir le site il faut soit être connecté au «&nbsp;back  office&nbsp;» soit utiliser l&rsquo;URL&nbsp;: http://www.mondomaine.fr<strong>/?preview_dev=idcomcrea</strong><br>
  <strong>Le fichier  de style&nbsp;: style.less</strong><br>
              Ce fichier est rédigé en LESS CSS et est déjà appelé dans le  header.php, c&rsquo;est directement le thème qui le traduit en CSS.<br>
              Ce fichier inclut le fichier <strong>utils.less</strong> qui contient différentes fonctions utiles et un reset  css.</p>
            <div>
             <ul>
              <li>.ombre(x,y,taille,couleur)&nbsp;:  génère une ombre, exemple d&rsquo;utilisation&nbsp;: .ombre(0,0,10px,#333)&nbsp;;</li>
               <li>.arrondi(taille)&nbsp;:  pour créer des arrondis</li>
               <li>.transition(duree)&nbsp;:  pour activer les transitions CSS</li>
               <li>.transitionSpe(duree,propriété)&nbsp;:  pour activer les transitions CSS sur un propriété&nbsp;CSS spécifique</li>
               <li>.agrandir(x,y)&nbsp;: pour  faire un zoom</li>
               <li>.rotation(angle)&nbsp;:  pour faire une rotation</li>
				</ul>
             </div>
            <p>Plus d&rsquo;infos sur le LESS&nbsp;: <a href="https://openclassrooms.com/courses/simplifiez-vous-la-vie-avec-less">https://openclassrooms.com/courses/simplifiez-vous-la-vie-avec-less</a><br>
              <strong>Le fichier  main.js</strong><br>
              C&rsquo;est le fichier qui est chargé dans le footer.php, pour  utiliser jQuery en JS il faut utiliser la variable «&nbsp;jQuery&nbsp;» et pas  «&nbsp;$&nbsp;»<br>
              Le fichier functions.js ajoute des méthodes jQuery  permettant de tester si l&rsquo;on est sur mobile ou tablette&nbsp;:</p>
            <div><br>
              jQuery.browser.mobile  (TRUE|FALSE) indique si on est sur mobile ou non<br>
              jQuery.browser.tablet  (TRUE|FALSE) indique si on est sur tablette ou non </div>
            <br clear="all">
            <h3 class="mdl-layout-title">Les bonnes  méthodes</h3>
            <ul>
              <li>On évite  les noms de variables en anglais ou genre «&nbsp;var1, var2&nbsp;»</li>
              <li>On utiliser  la documentation du Codex Wordpress afin de créer des requêtes SQL sécurisées</li>
              <li>On ne  modifie pas un plugin directement, on favorise l&rsquo;utilisation des Hooks (action  et filtres) sinon on renomme le plugin pour éviter des erreurs lors des mises à  jour</li>
              <li>Penser que  le client utilisera le «&nbsp;back office&nbsp;» donc réfléchir aux méthodes de  saisie les plus simples possibles</li>
              <li>Ne pas  hésiter à utiliser ACF pour simplifier la saisie</li>
              <li>Bien  utiliser les méthodes, classes CSS et autres outils fournis par Bootstrap pour  garantir un bon «&nbsp;responsive&nbsp;» </li>
              <li>Ne pas  réinventer la roue et toujours vérifier si un plugin ne peut pas être installé  pour gagner du temps (vérifier qu&rsquo;il est mis à jour régulièrement avant)</li>
              <li>Pour les  templates de page (mises en page Wordpress), ne les utiliser que si le modèle  est destiné à être utiliser plusieurs page sinon utiliser la méthode  «&nbsp;page-ID.php&nbsp;» pour surcharger le thème d&rsquo;une page avec son ID</li>
              <li>On ne  modifie pas le fichier functions.php on utilise custom.php si besoin</li>
              <li>On ne met pas d&rsquo;options pour le client s&rsquo;il n&rsquo;en a pas  l&rsquo;utilité, par exemple qu&rsquo;il voit un bouton dont il n&rsquo;est pas censé se servir.</li>
            </ul>
            <p>&nbsp;</p>
            <p><strong>Toute  amélioration ou idée d&rsquo;amélioration est bonne à prendre&nbsp;: <br>
              Soyons curieux et innovant&nbsp;!</strong></p>
        </div>
		<div class="mdl-tabs__panel" id="checklist">
			<h2 class="mdl-layout-title">A vérifier avant la mise en ligne</h2>
			<form action="admin.php?page=admin_idcomcrea#checklist" method="post" class="form_idcom">
			<input type="hidden" name="fields" value="" />
			<ol class="demo-list-control mdl-list">
				<?php
				$checklist=array(
					"Création/Vérification des mentions légales",
					"Vérification fonctionnement Mobile et Tablette",
					"Changement des adresses emails de destination des formulaires de contact",
					"En cas de refonte, penser à faire les redirections des anciennes URL vers les nouvelles URL",
					"Changement du nom de domaine dans les réglages WP",
					"Vérification de la case à cocher bloquant l’indexation du site par Google (Réglages > Lecture)",
					"Remplacement du nouveau nom de domaine dans la base de données (DB Search and Replace)",
					"OVH Changement du pointage des DNS (champ A)",
					"Une fois le site en ligne, vérification des liens",
					"Ajout du code Google Analytics",
					"Liens avec la Console de Recherche Google et soumission du sitemap.xml ",
					"Si installé sur le dédié penser à installer un plugin SMTP",
				);
				foreach($checklist as $c=>$v){
				?>
				<li class="mdl-list__item"><label><input type="checkbox" value="ok" name="checklist_<?php echo $c; ?>" <?php echo get_option("checklist_".$c,"false")=="ok"?"checked":"";?> /> <?php echo $v;?></li>
				<?php
				}
				?>
			</ol>
			<div class="mdl-cell mdl-cell--12-col">
				<button class="mdl-button mdl-js-button mdl-button--raised" type="submit" name="valid">
				  Enregistrer la checklist
				</button>
			</div>
			</form>
		</div>
	<script>
	jQuery("label[for='en_ligne']").on("click",function(){
		console.log("click sur en ligne");
		if(jQuery("#en_ligne").is(':checked')){
			console.log("MEL activée !");
			jQuery(".mdl-tabs__tab,.mdl-tabs__panel").removeClass('is-active');
			jQuery("#checklist").addClass('is-active');
			jQuery("a[href='#checklist']").addClass('is-active');
		}
		
	});
	jQuery(".form_idcom").on("submit",function(){
		var fields=[];
		jQuery(this).find("input[type=radio],input[type=checkbox],input[type=text],input[type=password],textarea").each(function(){
			fields.push(jQuery(this).attr("name"));
		});
		jQuery(this).find("[name=fields]").val(fields.join(","));
	})
	var hash = window.location.hash.substr(1);
	if(hash){
		jQuery(".mdl-tabs__tab,.mdl-tabs__panel").removeClass('is-active');
		jQuery("#"+hash).addClass('is-active');
		jQuery("a[href='#"+hash+"']").addClass('is-active');
	}
	</script>
	<?php
	
}

add_filter( 'mce_buttons', 'idcom_tiny_mce_buttons', 5,2 );
add_filter( 'mce_buttons_2', 'idcom_tiny_mce_buttons_2',  5,2 );	


/***************************************************************
 * First editor row buttons - 4.6
 ***************************************************************/
function idcom_tiny_mce_buttons( $buttons_array ){
	
	$mce_buttons = array( 
			'bold',				// Applies the bold format to the current selection.
			'italic',			// Applies the italic format to the current selection.
			'strikethrough',	// Applies strike though format to the current selection.
			'bullist',			// Formats the current selection as a bullet list.
			'numlist',			// Formats the current selection as a numbered list.
			'blockquote',		// Applies block quote format to the current block level element.
			'hr',				// Inserts a horizontal rule into the editor.
			'alignleft',		// Left aligns the current block or image.
			'aligncenter',		// Left aligns the current block or image.
			'alignright',		// Right aligns the current block or image.
			'alignjustify',		// Right aligns the current block or image.
			'link',				// Creates/Edits links within the editor.
			'unlink',			// Removes links from the current selection.
			'wp_more',			// Inserts the <!-- more --> tag.
			'spellchecker',		// ???
			'wp_adv',			// Toggles the second toolbar on/off.
			'dfw' 				// Distraction-free mode on/off.
		); 
	return $mce_buttons;
	
}


/***************************************************************
 * Second editor row buttons - 4.6
 ***************************************************************/
function idcom_tiny_mce_buttons_2( $buttons_array ){	
	
	$mce_buttons_2 = array( 
			'formatselect',		// Dropdown list with block formats to apply to selection.
			'underline',		// Applies the underline format to the current selection.
			'forecolor',		// Applies foreground/text color to selection.
			'pastetext',		// Toggles plain text pasting mode on/off.
			'removeformat',		// Removes the formatting from the current selection.
			'charmap',			// Inserts custom characters into the editor.
			'outdent',			// Outdents the current list item or block element.
			'indent',			// Indents the current list item or block element.
			'undo',				// Undoes the last operation.
			'redo',				// Redoes the last undoed operation.
			'wp_help'			// Opens the help.
		); 
		
	//Fix for ACF code button
	if ( in_array( 'code', $buttons_array ) ){
		$mce_buttons_2[] = 'code';
	}
	
	return $mce_buttons_2;
	
}

/*add_filter("self_admin_url",function($url, $path, $blog_id ){
	return (substr($url,0,1)=="/"&&IDCOMCREA=="dev")?"/plesk-site-preview/".$_SERVER['HTTP_HOST']."/54.37.22.7".$url:$url;
});
add_filter("admin_url",function($url, $path, $blog_id ){
	//var_dump($url, $path, $blog_id);
	return (substr($url,0,1)=="/"&&IDCOMCREA=="dev")?"/plesk-site-preview/".$_SERVER['HTTP_HOST']."/54.37.22.7".$url:$url;
});*/
?>