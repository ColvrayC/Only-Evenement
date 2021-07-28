<?php

$fonts_list = bozprod_get_google_fonts();

global $bozprod_opts;

?>
<div class="wrap bozprod">
    
    <h1><i class="fa fa-sliders"></i> <?php echo esc_html__('Réglages','bozprod'); ?> <span class="stamplogo"><img src="<?php echo BOZPROD_ROOT_URL.'/assets/img/idcom-logo.png'; ?>" alt="IDCOM"/></span></h1>
    
    <section id="settings">
        
        <div class="tabs">
            
            <ul class="boz-menu">
                
                <li id="tab_1" class="li selected">
                    <a href="javascript:void(0);">
                        <i class="fa fa-id-card"></i>
                        <span class="tab-title"><?php echo esc_html__('Logo','bozprod'); ?></span>
                        <span class="chevron"><i class="fa fa-chevron-right"></i></span>
                    </a>
                </li>
                
                <li id="tab_2" class="li">
                    <a href="javascript:void(0);">
                        <i class="fa fa-paw"></i>
                        <span class="tab-title"><?php echo esc_html__('Favicon','bozprod'); ?></span>
                        <span class="chevron"><i class="fa fa-chevron-down"></i></span>
                    </a>
                </li>
                
                <li id="tab_3" class="li">
                    <a href="javascript:void(0);">
                        <i class="fa fa-font"></i>
                        <span class="tab-title"><?php echo esc_html__('Fonts','bozprod'); ?></span>
                        <span class="chevron"><i class="fa fa-chevron-down"></i></span>
                    </a>
                </li>
                
                <li id="tab_4" class="li">
                    <a href="javascript:void(0);">
                        <i class="fa fa-picture-o"></i>
                        <span class="tab-title"><?php echo esc_html__('Images','bozprod'); ?></span>
                        <span class="chevron"><i class="fa fa-chevron-down"></i></span>
                    </a>
                </li>
                
                <li id="tab_5" class="li">
                    <a href="javascript:void(0);">
                        <i class="fa fa-code"></i>
                        <span class="tab-title"><?php echo esc_html__('Intégration','bozprod'); ?></span>
                        <span class="chevron"><i class="fa fa-chevron-down"></i></span>
                    </a>
                </li>
                
            </ul>
            
        </div>
        
        <div class="panels">
            
            <div class="savedata">
                <img src="<?php echo BOZPROD_ROOT_URL.'/assets/img/idcom-logo.png';?>" alt="Spinner" id="bozspinner" class="bozprodspinner"/>
                <button id="boznetwork_save_settings" class="btn bg-primary btn-md pull-right" data-panel="panel_1"><i class="fa fa-save"></i> <?php echo esc_html__('Enregistrer','bozprod'); ?></button>
                <div class="boznote bg-danger pull-right">
                    <span data-saving="<?php echo esc_html__('Enregistrement en cours...','bozprod'); ?>" data-saved="<?php echo esc_html__('Données sauvegardées !','bozprod'); ?>"><?php echo esc_html__('Enregistrement en cours...','bozprod'); ?></span>
                </div>
                <div class="footer"></div>
            </div>
            
            <!-- LOGO -->
            <div id="panel_1" class="panel selected">
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Logo principal du site','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Logo qui sera affiché dans l\'entête du site. Formats recommandés : .svg ou .png. Largeur 512 pixels.','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <?php bozprod_image_uploader_field('bozprod_logo', $bozprod_opts['logo']); ?>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Logo du pied de page','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Logo qui sera affiché dans le pied de page du site (optionnel). Formats recommandés : .svg ou .png. Largeur 512 pixels.','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <?php bozprod_image_uploader_field('bozprod_sublogo', $bozprod_opts['sublogo']); ?>
                    </div>
                    <div class="footer"></div>
                </div>
                
            </div>
            
            <!-- FAVICON -->
            <div id="panel_2" class="panel hidden">
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Favicon du site','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Choisir ici l\'image à utiliser pour générer les favicons, impératif : 512 x 512 pixels au format .png.','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <?php bozprod_image_uploader_field('bozprod_favicon', $bozprod_opts['favicon']); ?>
                    </div>
                    <div class="footer"></div>
                </div>
                
            </div>
            
            <!-- FONTS -->
            <div id="panel_3" class="panel hidden">
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Police pour les titres','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Police de caractères utilisée pour tous les titres.','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <select id="boz-site-heading-font" class="boz-select2" name="site-heading-font">
                            <option value="none"><?php echo esc_html__('Choisir','bozprod'); ?></option>
                            <?php
                                                                                    
                            for($i=0; $i<count($fonts_list['items']); $i++){
                                
                                $selected = $bozprod_opts['titlefont'] != 'none' && $i == $bozprod_opts['titlefont'] ? ' selected' : '';
                                
                                echo '<option value="'.$i.'"'.$selected.'>'.$fonts_list['items'][$i]['family'].'</option>';
                                
                            }
                            
                            ?>
                        </select>
                        <hr/>
                        <small><?php echo esc_html__('Aperçu :','bozprod'); ?></small>
                        <div id="boz-site-heading-font-preview" class="font-preview">
                            <h1 style="border-bottom:none;"><?php echo esc_html__('Titre de ma superbe page','bozprod'); ?></h1>
                            <h1 style="border-bottom:none;" class="negatif"><?php echo esc_html__('Titre de ma superbe page','bozprod'); ?></h1>
                        </div>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Taille du titre principal','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Taille de la police de caractères du titre principal (balise html : <h1>), en pixels, ex.: 32px.','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <input type="text" id="boz-site-heading-size" class="form-control" placeholder="<?php echo esc_html__('...','bozprod'); ?>" value="<?php echo esc_html($bozprod_opts['titlesize']); ?>px"/>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Police pour le menu principal','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Police de caractères utilisée pour le menu principal.','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <select id="boz-site-menu-font" class="boz-select2" name="site-menu-font">
                            <option value="none"><?php echo esc_html__('Choisir','bozprod'); ?></option>
                            <?php
                                                                                    
                            for($i=0; $i<count($fonts_list['items']); $i++){
                                
                                $selected = $bozprod_opts['menufont'] != 'none' && $i == $bozprod_opts['menufont'] ? ' selected' : '';
                                
                                echo '<option value="'.$i.'"'.$selected.'>'.$fonts_list['items'][$i]['family'].'</option>';
                                
                            }
                            
                            ?>
                        </select>
                        <hr/>
                        <small><?php echo esc_html__('Aperçu :','bozprod'); ?></small>
                        <div id="boz-site-menu-font-preview" class="font-preview">
                            <p style="border-bottom:none;"><?php echo esc_html__('Accueil - Blog - Boutique - Contact ...','bozprod'); ?></p>
                            <p style="border-bottom:none;" class="negatif"><?php echo esc_html__('Accueil - Blog - Boutique - Contact ...','bozprod'); ?></p>
                        </div>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Taille du menu principal','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Taille de la police de caractères du menu principal, en pixels, ex.: 18px.','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <input type="text" id="boz-site-menu-size" class="form-control" placeholder="<?php echo esc_html__('...','bozprod'); ?>" value="<?php echo esc_html($bozprod_opts['menusize']); ?>px"/>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Police pour le texte standard','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Police de caractères utilisée pour le texte standard.','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <select id="boz-site-text-font" class="boz-select2" name="site-text-font">
                            <option value="none"><?php echo esc_html__('Choisir','bozprod'); ?></option>
                            <?php
                                                        
                            for($i=0; $i<count($fonts_list['items']); $i++){
                                
                                $selected = $bozprod_opts['textfont'] != 'none' && $i == $bozprod_opts['textfont'] ? ' selected' : '';
                                
                                echo '<option value="'.$i.'"'.$selected.'>'.$fonts_list['items'][$i]['family'].'</option>';
                                
                            }
                            
                            ?>
                        </select>
                        <hr/>
                        <small><?php echo esc_html__('Aperçu :','bozprod'); ?></small>
                        <div id="boz-site-text-font-preview" class="font-preview">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p class="negatif">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Taille du texte standard','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Taille de la police de caractères du text standard, en pixels, ex.: 15px.','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <input type="text" id="boz-site-text-size" class="form-control" placeholder="<?php echo esc_html__('...','bozprod'); ?>" value="<?php echo esc_html($bozprod_opts['textsize']); ?>px"/>
                    </div>
                    <div class="footer"></div>
                </div>
                
            </div>
            
            <!-- PICTURES -->
            <div id="panel_4" class="panel hidden">
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Optimisation des images','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Activer cette option permet de renommer les images téléversées suivant le titre renseigné, et mappe le titre à la description, la légende et le texte alternatif.','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <span class="boz-radio"><input type="checkbox" name="checkbox" id="boz-images" class="form-control" <?php if(isset($bozprod_opts['images']) && $bozprod_opts['images'] == 'true'){ echo 'checked'; } ?>/> <?php echo esc_html__('Activer l\'optimisation des images.','bozprod'); ?></span>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Redimensionnement des images','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Activer cette option permet de redimensionner et recentrer les images par rapport à leur conteneur, si les pourtour des images est masqué par ledit conteneur, afin que les images occupent au mieux la totalité de la surface du conteneur (le conteneur doit être en position relative).','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <span class="boz-radio"><input type="checkbox" name="checkbox" id="boz-resizing" class="form-control" <?php if(isset($bozprod_opts['resizing']) && $bozprod_opts['resizing'] == 'true'){ echo 'checked'; } ?>/> <?php echo esc_html__('Activer le redimensionnement des images.','bozprod'); ?></span>
                    </div>
                    <div class="footer"></div>
                </div>
                
            </div>
            
            <!-- INTEGRATION -->
            <div id="panel_5" class="panel hidden">
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Logo de l\'entête','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Ci-après le code à intégrer pour insérer le logo de l\'entête (entre balises <?php ?>).','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <textarea rows="3">the_header_logo();
ou bien :
the_header_logo('img-fluid'); // inclusion d'une classe css (ou  plusieurs)</textarea>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Logo du pied de page','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Ci-après le code à intégrer pour insérer le logo du pied de page (entre balises <?php ?>).','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <textarea rows="3">the_footer_logo();
ou bien :
the_footer_logo('img-fluid'); // inclusion d'une classe css (ou  plusieurs)</textarea>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Fonts','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Ci-après le code généré à copier-coller dans le fichier style.less pour utiliser les Google fonts. Le lien permettant d\'embarquer les Google fonts sélectionnées est automatiquement intégré dans l\'entête du site.','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <textarea id="bozprod-font-style" rows="32"><?php echo $bozprod_opts['fontstyle']; ?></textarea>
                    </div>
                    <div class="footer"></div>
                </div>
                
                <div class="row">
                    <div class="form-label">
                        <label><?php echo esc_html__('Redimensionnement des images','bozprod'); ?></label>
                        <span>
                            <i class="fa fa-info-circle text-danger"></i>
                            <?php echo esc_html__('Pour appliquer le redimensionnement et le recentrage sur des images, ajoutez la classe suivante aux images visées (le conteneur d\'une image doit être en position relative et en overflow hidden).','bozprod'); ?>
                        </span>
                    </div>
                    <div class="form-data">
                        <textarea rows="3">.img-overflow</textarea>
                    </div>
                    <div class="footer"></div>
                </div>
                
            </div>
            
        </div>
        
        <div class="footer">
            <small><?php _e('Développé par','bozprod'); ?> <a href="https://bozprod.eu/" target="_blank" rel="noopener">Jonathan LUSY</a>.</small>
        </div>
        
    </section>
    
</div>