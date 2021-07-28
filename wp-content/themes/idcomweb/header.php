<?php



global $wp;



global $woocommerce;



global $cart_count;



$cart_count = $woocommerce->cart->cart_contents_count;



if($cart_count > 0){

        

    $cart_class = '';



}else{



    $cart_class = ' hidden';



}



global $site_data;



global $ID;



$ID = get_the_ID();



idcom_count_views();



?>

<!DOCTYPE html>

<html <?php language_attributes(); ?> xmlns:fb="http://ogp.me/ns/fb#">

<head>

<?php if($site_data['gtag'] != ''){ ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_html($site_data['gtag']); ?>"></script>

    <script>

        window.dataLayer = window.dataLayer || [];

        function gtag(){dataLayer.push(arguments);}

        gtag('js', new Date());



        gtag('config', '<?php echo esc_html($site_data['gtag']); ?>');

    </script>

<?php } ?>

    <?php if($site_data['gsc'] != '') : ?>

    <meta name="google-site-verification" content="<?php echo esc_html($site_data['gsc']); ?>" />

    <?php endif; ?>

    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="HandheldFriendly" content="true">

    <meta name="apple-touch-fullscreen" content="yes">

    <title><?php echo str_replace("[landing]","",wp_title("&raquo;",false)); ?></title>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/ie-emulation-modes-warning.js"></script>

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <?php wp_enqueue_script("jquery"); ?>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> data-barba="wrapper">

    <div class="main-container" data-barba="container" data-barba-namespace="<?php echo idcom_create_current_slug(); ?>">

        <header class="main-header">

            <div class="container">

                <div class="row">

                    <!-- Header logo -->

                    <div class="ccol ccol-25 ccol-md-25 ccol-sm-25 ccol-xs-50 ccol-xx-50">

                        <a href="<?php echo home_url('/'); ?>" class="main-logo wow fadeInDown" data-wow-duration="0.35s" data-wow-delay="0.5s" title="<?php echo get_bloginfo(); ?>">

                            <?php the_header_logo(); ?>

                        </a>

                    </div>

                    <!-- Main menu -->

                    <div class="ccol ccol-50 ccol-md-50 ccol-sm-50 ccol-xs-50 ccol-xx-50">

                        <?php idcomtheme_header_menu(3); ?>

                    </div>

                    <div class="ccol ccol-25 ccol-md-25 ccol-sm-25 ccol-xs-100 ccol-xx-100 right-buttons">

                        <!-- Search form button -->

                        <a href="javascript:void(0);" class="right-btn search-the-site"><i class="fas fa-search"></i></a>

                        <?php if(idcom_preview_cart_is_active()) : ?>

                        <!-- Preview cart button -->

                        <a href="javascript:void(0);" id="gotocheckout" class="right-btn" title="<?php echo esc_html('Mon panier','idcomcrea'); ?>">

                            <i class="fas fa-shopping-cart"></i><span class="badge<?php echo $cart_class; ?>"><?php echo $cart_count; ?></span>

                        </a>

                        <?php endif; ?>

                        <!-- Social share buttons -->

                        <?php if($site_data['facebook'] != '') : ?>

                        <a href="<?php echo esc_url($site_data['facebook']); ?>" class="right-btn" title="<?php echo esc_html('Facebook'); ?>" target="_blank" rel="noopener"><i class="fab fa-facebook"></i></a>

                        <?php endif; ?>

                        <?php if($site_data['instagram'] != '') : ?>

                        <a href="<?php echo esc_url($site_data['instagram']); ?>" class="right-btn" title="<?php echo esc_html('Instagram'); ?>" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>

                        <?php endif; ?>

                        <?php if($site_data['twitter'] != '') : ?>

                        <a href="<?php echo esc_url($site_data['twitter']); ?>" class="right-btn" title="<?php echo esc_html('Twitter'); ?>" target="_blank" rel="noopener"><i class="fab fa-twitter"></i></a>

                        <?php endif; ?>

                        <?php if($site_data['pinterest'] != '') : ?>

                        <a href="<?php echo esc_url($site_data['pinterest']); ?>" class="right-btn" title="<?php echo esc_html('Pinterest'); ?>" target="_blank" rel="noopener"><i class="fab fa-pinterest"></i></a>

                        <?php endif; ?>

                        <?php if($site_data['tumblr'] != '') : ?>

                        <a href="<?php echo esc_url($site_data['tumblr']); ?>" class="right-btn" title="<?php echo esc_html('Tumblr'); ?>" target="_blank" rel="noopener"><i class="fab fa-tumblr"></i></a>

                        <?php endif; ?>

                        <?php if($site_data['rss']) : ?>

                        <a href="/feed/" class="right-btn" title="<?php echo esc_html('Tumblr'); ?>" target="_blank"><i class="fas fa-rss"></i></a>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </header>

        <main role="main" class="main" data-gtag="<?php if($site_data['gtag'] != ''){ echo esc_html($site_data['gtag']); } ?>" data-path="<?php echo idcom_get_uri(); ?>" data-title="<?php echo wp_get_document_title(); ?>" data-location="<?php echo idcom_get_url(); ?>">