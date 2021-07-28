<?php

global $wp;

global $woocommerce;

global $cart_count;

global $site_data;

global $ID;

?>
        </main>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xs-6 col-sm-12 col-md-12 col-lg-3">
                        <a href="<?php echo home_url('/'); ?>" class="footer-logo wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.75s" title="<?php echo get_bloginfo(); ?>">
                            <?php the_footer_logo(); ?>
                        </a>
                    </div>
                    <div class="col-12 col-xs-6 col-sm-4 col-md-4 col-lg-3">
                        2
                    </div>
                    <div class="col-12 col-xs-6 col-sm-4 col-md-4 col-lg-3">
                        3
                    </div>
                    <div class="col-12 col-xs-6 col-sm-4 col-md-4 col-lg-3">
                        4
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="credits text-center">
                            <a href="<?php echo esc_url('https://www.groupe-idcom.fr'); ?>" class="idcom-logo" target="_blank" rel="noopener">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/idcomweb-footer-logo.svg" alt="Groupe IDCOM : création de sites Internet vitrine et e-commerce" class=""/>
                            </a>
                            <span class="separator"></span>
                            <a href="<?php echo esc_url('https://www.groupe-idcom.fr'); ?>" target="_blank" rel="noopener"><?php echo esc_html('Création IDCOMWEB','idcomcrea'); ?></a>
                            <span class="separator">|</span>
                            <?php idcom_copyright(); ?>
                            <span class="separator">|</span>
                            <a href="<?php echo get_permalink(6); ?>"><?php echo esc_html('Mentions légales','idcomcrea'); ?></a>
                            <span class="separator">|</span>
                            <a href="<?php echo get_permalink(3); ?>"><?php echo esc_html('Confidentialité','idcomcrea'); ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- preview cart -->
        <div id="idcom-cart">
            <div class="header">
                <p><i id="close-preview-cart" class="far fa-times-circle"></i> <?php echo esc_html('Mon panier','idcomcrea'); ?> <strong>(<span class="woo-cart-count"><?php echo $cart_count; ?></span>)</strong></p>
            </div>
            <div class="basket">
                <div class="data">
                    <?php echo idcom_get_preview_cart(); ?>
                </div>
            </div>
            <div class="tbtn">
                <div class="data">
                    <p><?php echo esc_html('Total :','idcomcrea'); ?> <span class="total-price" data-amount="<?php echo $woocommerce->cart->total; ?>"><?php echo number_format($woocommerce->cart->total, 2, ',', ' '); ?>€</span></p>
                    <a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-lg btn-primary btn100 uppercase">
                        <?php echo esc_html('Valider et payer','idcomcrea'); ?>
                    </a>
                </div>
            </div>
        </div>
        <!-- Preloader -->
        <?php if($site_data['preloader_display'] && !$site_data['barba_preloader']) : ?>
        <div id="idcom-loader" data-loading="0" data-timeout="10">
            <div class="progress"></div>
            <div class="counter"><p></p></div>
        </div>
        <?php endif; ?>
        <!-- overlay -->
        <div id="idcom-overlay"></div>
        <!-- Go to top -->
        <button id="gototop" type="button"><i class="fa fa-chevron-up"></i></button>
        <!-- Search -->
        <div id="site-search">
            <form role="search" method="get" action="<?php echo site_url(); ?>">
                <input type="search" name="s" id="s" placeholder="<?php echo esc_html(__('Recherche...','idcomcrea')); ?>" value=""/>
            </form>
            <i id="closesearch" class="fa fa-times"></i>
        </div>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/ie10-viewport-bug-workaround.js"></script>
        <?php
        
        if($site_data['barba']){
        
            wp_enqueue_script('barba', get_template_directory_uri().'/js/barba.js', array ('jquery'), IDCOMv, true);

        }else{

            wp_enqueue_script('nobarba', get_template_directory_uri().'/js/nobarba.js', array ('jquery'), IDCOMv, true);

        }
        
        wp_footer();
        
        ?>
        <!-- PhotoSwipe -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" title="<?php echo esc_html('Fermer','idcomcrea') ?>"></button>
                        <button class="pswp__button pswp__button--share" title="<?php echo esc_html('Partager','idcomcrea') ?>"></button>
                        <button class="pswp__button pswp__button--fs" title="<?php echo esc_html('Plein écran','idcomcrea') ?>"></button>
                        <button class="pswp__button pswp__button--zoom" title="<?php echo esc_html('Zoom/dézoom','idcomcrea') ?>"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                              <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div> 
                    </div>
                    <button class="pswp__button pswp__button--arrow--left" title="<?php echo esc_html('Précédent','idcomcrea') ?>">
                    </button>
                    <button class="pswp__button pswp__button--arrow--right" title="<?php echo esc_html('Suivant','idcomcrea') ?>">
                    </button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PhotoSwipe -->
    </div>
    <!-- Transition loader -->
    <?php if($site_data['preloader_display'] && $site_data['barba_preloader'] && is_array($site_data['barba_img_in']) && count($site_data['barba_img_in']) > 2 && is_array($site_data['barba_img_out']) && count($site_data['barba_img_out']) > 2) : ?>
    <div id="bb-loader" data-img1="<?php echo esc_url($site_data['barba_img_in']['url']); ?>" data-img2="<?php echo esc_url($site_data['barba_img_out']['url']); ?>" data-transition="<?php echo esc_html(sanitize_title($site_data['barba_transition_type'])); ?>" data-duration="<?php echo esc_html($site_data['barba_transition_duration']); ?>" data-interval="<?php echo esc_html($site_data['barba_transition_interval']); ?>">
        <canvas id="myCanvas"></canvas>
    </div>
    <?php endif; ?>
</body>
</html>