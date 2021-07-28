<?php

global $bpsn_opts;

?>
<div class="wrap bozprod">
    
    <h1><i class="fa fa-sliders"></i> <?php echo esc_html__('Réglages','bpsocial'); ?> <span class="stamplogo"><img src="<?php echo BPSN_ROOT_URL.'/assets/img/idcom-logo.png'; ?>" alt="IDCOM"/></span></h1>
    
    <section id="settings">
        
        <div class="tabs">
            
            <ul class="boz-menu">
                
                <li id="tab_1" class="li selected">
                    <a href="javascript:void(0);">
                        <i class="fa fa-sign-in"></i>
                        <span class="tab-title"><?php echo esc_html__('Liens sociaux','bpsocial'); ?></span>
                        <span class="chevron"><i class="fa fa-chevron-right"></i></span>
                    </a>
                </li>
                
                <li id="tab_2" class="li">
                    <a href="javascript:void(0);">
                        <i class="fa fa-share-alt"></i>
                        <span class="tab-title"><?php echo esc_html__('Boutons de partage','bpsocial'); ?></span>
                        <span class="chevron"><i class="fa fa-chevron-down"></i></span>
                    </a>
                </li>
                
                <li id="tab_3" class="li">
                    <a href="javascript:void(0);">
                        <i class="fa fa-code"></i>
                        <span class="tab-title"><?php echo esc_html__('Intégration','bpsocial'); ?></span>
                        <span class="chevron"><i class="fa fa-chevron-down"></i></span>
                    </a>
                </li>
                
            </ul>
            
        </div>
        
        <div class="panels">
            
            <div class="savedata">
                <img src="<?php echo BPSN_ROOT_URL.'/assets/img/idcom-logo.png';?>" alt="Spinner" id="bozspinner" class="bozprodspinner"/>
                <button id="boznetwork_save_settings" class="btn bg-primary btn-md pull-right" data-panel="panel_1"><i class="fa fa-save"></i> <?php echo esc_html__('Enregistrer','bpsocial'); ?></button>
                <div class="boznote bg-danger pull-right">
                    <span data-saving="<?php echo esc_html__('Enregistrement en cours...','bpsocial'); ?>" data-saved="<?php echo esc_html__('Données sauvegardées !','bpsocial'); ?>"><?php echo esc_html__('Enregistrement en cours...','bpsocial'); ?></span>
                </div>
                <div class="footer"></div>
            </div>
            
            <!-- SOCIAL LINKS -->
            <div id="panel_1" class="panel selected">
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Facebook','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Lien vers votre page Facebook.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <input type="text" id="boz-facebook" class="form-control" placeholder="<?php echo esc_html__('...','bpsocial'); ?>" value="<?php echo esc_html($bpsn_opts['facebook']); ?>"/>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Twitter','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Lien vers votre page Twitter.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <input type="text" id="boz-twitter" class="form-control" placeholder="<?php echo esc_html__('...','bpsocial'); ?>" value="<?php echo esc_html($bpsn_opts['twitter']); ?>"/>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('LinkedIn','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Lien vers votre page LinkedIn.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <input type="text" id="boz-linkedin" class="form-control" placeholder="<?php echo esc_html__('...','bpsocial'); ?>" value="<?php echo esc_html($bpsn_opts['linkedin']); ?>"/>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Tumblr','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Lien vers votre page Tumblr.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <input type="text" id="boz-tumblr" class="form-control" placeholder="<?php echo esc_html__('...','bpsocial'); ?>" value="<?php echo esc_html($bpsn_opts['tumblr']); ?>"/>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Pinterest','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Lien vers votre page Pinterest.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <input type="text" id="boz-pinterest" class="form-control" placeholder="<?php echo esc_html__('...','bpsocial'); ?>" value="<?php echo esc_html($bpsn_opts['pinterest']); ?>"/>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Instagram','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Lien vers votre page Instagram.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <input type="text" id="boz-instagram" class="form-control" placeholder="<?php echo esc_html__('...','bpsocial'); ?>" value="<?php echo esc_html($bpsn_opts['instagram']); ?>"/>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('YouTube','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Lien vers votre chaîne YouTube.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <input type="text" id="boz-youtube" class="form-control" placeholder="<?php echo esc_html__('...','bpsocial'); ?>" value="<?php echo esc_html($bpsn_opts['youtube']); ?>"/>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Vimeo','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Lien vers votre chaîne Vimeo.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <input type="text" id="boz-vimeo" class="form-control" placeholder="<?php echo esc_html__('...','bpsocial'); ?>" value="<?php echo esc_html($bpsn_opts['vimeo']); ?>"/>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Flux RSS','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Lien vers le Flux RSS du site.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <input type="text" id="boz-rss" class="form-control" placeholder="<?php echo esc_html__('/feed/','bpsocial'); ?>" value="<?php echo esc_html($bpsn_opts['rss']); ?>"/>
                    </div>
                    <div class="footer"></div>
                </div>
                
            </div>
            
            <!-- SOCIAL SHARING -->
            <div id="panel_2" class="panel hidden">
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Bouton Facebook','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Activer cette option permet d\'afficher le bouton de partage Facebook.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <span class="boz-radio"><input type="checkbox" name="checkbox" id="boz-btn-facebook" class="form-control" <?php if(isset($bpsn_opts['btn-facebook']) && $bpsn_opts['btn-facebook'] == 'true'){ echo 'checked'; } ?>/> <?php echo esc_html__('Activer le bouton Facebook.','bpsocial'); ?></span>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Bouton Twitter','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Activer cette option permet d\'afficher le bouton de partage Twitter.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <span class="boz-radio"><input type="checkbox" name="checkbox" id="boz-btn-twitter" class="form-control" <?php if(isset($bpsn_opts['btn-twitter']) && $bpsn_opts['btn-twitter'] == 'true'){ echo 'checked'; } ?>/> <?php echo esc_html__('Activer le bouton Twitter.','bpsocial'); ?></span>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Bouton LinkedIn','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Activer cette option permet d\'afficher le bouton de partage LinkedIn.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <span class="boz-radio"><input type="checkbox" name="checkbox" id="boz-btn-linkedin" class="form-control" <?php if(isset($bpsn_opts['btn-linkedin']) && $bpsn_opts['btn-linkedin'] == 'true'){ echo 'checked'; } ?>/> <?php echo esc_html__('Activer le bouton LinkedIn.','bpsocial'); ?></span>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Bouton Tumblr','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Activer cette option permet d\'afficher le bouton de partage Tumblr.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <span class="boz-radio"><input type="checkbox" name="checkbox" id="boz-btn-tumblr" class="form-control" <?php if(isset($bpsn_opts['btn-tumblr']) && $bpsn_opts['btn-tumblr'] == 'true'){ echo 'checked'; } ?>/> <?php echo esc_html__('Activer le bouton Tumblr.','bpsocial'); ?></span>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Bouton Pinterest','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Activer cette option permet d\'afficher le bouton de partage Pinterest.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <span class="boz-radio"><input type="checkbox" name="checkbox" id="boz-btn-pinterest" class="form-control" <?php if(isset($bpsn_opts['btn-pinterest']) && $bpsn_opts['btn-pinterest'] == 'true'){ echo 'checked'; } ?>/> <?php echo esc_html__('Activer le bouton Pinterest.','bpsocial'); ?></span>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Bouton email','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Activer cette option permet d\'afficher le bouton de partage par email.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <span class="boz-radio"><input type="checkbox" name="checkbox" id="boz-btn-mail" class="form-control" <?php if(isset($bpsn_opts['btn-mail']) && $bpsn_opts['btn-mail'] == 'true'){ echo 'checked'; } ?>/> <?php echo esc_html__('Activer le bouton email.','bpsocial'); ?></span>
                    </div>
                    <div class="footer"></div>
                </div>
                
            </div>
            
            <!-- INTEGRATION -->
            <div id="panel_3" class="panel hidden">
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Liens vers les réseaux sociaux','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Ci-après le shortcode qui permet d\'afficher les liens vers les réseaux sociaux configurés.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <textarea rows="4">[the_social_links] // sans attribut
[the_social_links class="text-left"] // avec l'attribut class (ferré à gauche, option par défaut)
[the_social_links class="text-center"] // avec l'attribut class (centré)
[the_social_links class="text-right"] // avec l'attribut class (ferré à droite)
                        </textarea>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Boutons de partage','bpsocial'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Ci-après le shortcode qui permet d\'afficher les boutons de partage vers les réseaux sociaux activés.','bpsocial'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <textarea rows="2">[the_social_share_btn] // sans attribut
[the_social_share_btn title="Partager"] // avec l'attribut title
                        </textarea>
                    </div>
                    <div class="footer"></div>
                </div>
                
            </div>
            
        </div>
        
        <div class="footer">
            <small><?php _e('Développé par','bpsocial'); ?> <a href="https://bozprod.eu/" target="_blank" rel="noopener">Jonathan LUSY</a>.</small>
        </div>
        
    </section>
    
</div>