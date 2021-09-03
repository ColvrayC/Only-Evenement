<?php

global $wp;

global $woocommerce;

global $cart_count;

global $site_data;

global $ID;

?>
        </main>
        <footer>
            <div class="content-logos container mt-0">
                <div class="d-flex justify-content-center align-items-center flex-wrap">
                    <img class="" src="<?= home_url(); ?>/wp-content/uploads/2021/08/logo-footer-onlyday.png"/>
                    <img src="<?= home_url(); ?>/wp-content/uploads/2021/08/logo-footer-coaching-mariage-2.jpg"/>
                    
                    <img src="<?= home_url(); ?>/wp-content/uploads/2021/08/logo-footer-coaching-expert.png"/>
                    
                    
                </div>
                <div class="d-flex justify-content-center align-items-center flex-wrap">
                    <img class="logo-letters" src="<?= home_url(); ?>/wp-content/uploads/2021/08/logo-footer-mariage-net.png"/>
                    <img src="<?= home_url(); ?>/wp-content/uploads/2021/08/logo-footer-zank-you.png"/>
                </div>
            </div>
            <div class="content-footer">
                <div class="container">
                    <div class="row content-menus mx-auto me-lg-auto">
                        <div class="col-12 col-md-6 col-lg-3 px-0 px-md-2 pt-5">
                            <div class="footer-menu wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1.05s">
                                <div class="fm-title">
                                    <h5>Plan du site</h5>
                                </div>
                                <div class="fm-menu">
                                    <?php idcomtheme_footer_menu(29); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-0 px-md-2 pt-5">
                            <div class="footer-menu wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1.05s">
                                <div class="fm-title">
                                    <h5 class="title-color-second">Organisation mariage</h5>
                                </div>
                                <div class="fm-menu">
                                    <?php idcomtheme_footer_menu(30); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-0 px-md-2 pt-5">
                            <div class="footer-menu wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1.05s">
                                <div class="fm-title">
                                    <h5 class="title-color-second">Coaching mariage</h5>
                                </div>
                                <div class="fm-menu">
                                    <?php idcomtheme_footer_menu(31); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-0 px-md-2 pt-5">
                            <div class="footer-menu wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1.05s">
                                <div class="fm-title">
                                    <h5>Contact</h5>
                                </div>
                                <div class="row">
                                    <div class="col-12 content-contact">
                                        <h6>Email</h6>
                                        <a href="mailto:<?php echo $site_data['email'] ?>"><?php echo $site_data['email']?></a>
                                    </div>
                    
                                    <div class="col-12 col-lg-6 content-contact">
                                        <h6>Téléphone</h6>
                                        <a href="tel:<?php echo $site_data['mobile'] ?>"><?php echo $site_data['mobile']?></a>
                                    </div>
                                    <div class="col-12 col-lg-6 content-contact">
                                        <h6>Adresse</h6>
                                        <span><?= $site_data['codepostal'] ?> <?= $site_data['ville'] ?></span>
                                    </div>
                                    <div class="col-12 content-contact">
                                        <div class="social-icons d-flex">
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
                            </div>
                        </div>
                    </div>
                    <div class="content-credits d-flex align-items-center mt-5 pb-2 pb-lg-5">
                        <p class=" credits text-center">
                            <a href="<?php echo esc_url('https://www.groupe-idcom.fr'); ?>" class="idcom-logo" target="_blank" rel="noopener">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/idcomweb-footer-logo.svg" alt="Groupe IDCOM : création de sites Internet vitrine et e-commerce" class=""/>
                            </a>
                            <div class="credits-text">
                                <a class="link-website-creator" href="<?php echo esc_url('https://www.groupe-idcom.fr'); ?>" target="_blank" rel="noopener"><?php echo esc_html('Création Site internet : www.groupe-idcom.fr','idcomcrea'); ?></a>
                                <span class="separator first">|</span>
                                Copyright <?php idcom_copyright(); ?>
                                <span class="separator">|</span>
                                <a href="<?php echo get_permalink(6); ?>"><?php echo esc_html('Mentions légales','idcomcrea'); ?></a>
                            </div>
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
        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/imagesloaded.pkgd.min.js"></script>
        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/isotope.pkgd.min.js"></script>
        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/infinite-scroll.pkgd.min.js"></script>
        
        
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