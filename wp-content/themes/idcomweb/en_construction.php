<?php
if(isset($_REQUEST['preview_dev'])&&$_REQUEST['preview_dev']=="idcomcrea"){
	wp_redirect(home_url("/"));

}
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
       <meta charset="utf-8">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo get_bloginfo( 'name' ); ?> - <?php echo get_bloginfo( 'description' ); ?></title>
        <meta name="description" content="<?php echo get_bloginfo( 'name' ); ?> - <?php echo get_bloginfo( 'description' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/agence/construction/css/normalize.css">
        <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/agence/construction/css/main.css">
        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/agence/construction/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body style="">

        <!--[if lte IE 9]>

            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>

        <![endif]-->

		<h1 style="margin-top: 15%;text-align: center"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.png" alt="<?php echo get_bloginfo( 'name' ); ?>" /><br /><br /><?php echo get_option("en_contruction","Site en construction..."); ?></h1>

        <script src="https://code.jquery.com/jquery-3.2.0.min.js" integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I=" crossorigin="anonymous"></script>

        <script>window.jQuery || document.write('<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/agence/construction/js/vendor/jquery-3.2.0.min.js"><\/script>')</script>

        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/agence/construction/js/plugins.js"></script>

        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/agence/construction/js/main.js"></script>

        

    </body>

</html>

