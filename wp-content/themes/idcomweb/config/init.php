<?php
function add_query_vars_filter( $vars ){
  $vars[] = "preview_dev";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );
function page_construction(){
	if(isset($_REQUEST['preview_dev'])&&$_REQUEST['preview_dev']=="idcomcrea"){
		setcookie("dev_idcomcrea",0);
	}
	if (!is_user_logged_in()&&!isset($_COOKIE['dev_idcomcrea'])){
		include (TEMPLATEPATH . '/en_construction.php');
		exit;
	}else{
		if(isset($_REQUEST['preview_dev'])&&$_REQUEST['preview_dev']=="idcomcrea"){
			wp_redirect(home_url("/"));
		}
	}
}

if(IDCOMCREA=="dev"){
	add_action('template_redirect', 'page_construction');
}
?>