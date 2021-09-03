<?php

/*******************************************************************************
 * 
 * Base section Gutenberg template-
 * 
 */

global $wp;

global $ID;

global $site_data;

$galleries_query_args = [
    'post_type' => 'galerie',
    'post_status' => 'publish',
];

$realisations_img = '';
$list_realisations_html = '';
?>

<section id="realisations" class="marge-pour-accueillir-bandeau-lateral">
	<div class="container-fluid">
		<div class="introduction">
			<h2 class="titre-type"><?php echo get_field("realisations")["introduction"]["titre"]; ?></h2>
            <div class="preambule-type"><?php echo get_field("realisations")["introduction"]["preambule"]; ?></div>
		</div>
		<div class="text-center">
			<select class="categories dropdown-category">
				<option value="*" class="is-checked">Tout</option>

				<?php
				$galleries_query_args = new WP_Query($galleries_query_args);
				$categories      = '';
				
				if ($galleries_query_args->have_posts()) {
					while ($galleries_query_args->have_posts()) {
						$galleries_query_args->the_post();

						$slug   = basename(get_permalink(get_the_ID()));
						$category   =  get_field('category', get_the_ID());
						$option =  '<option value=".'.sanitize_title($slug).'">'.$category.'</option>';
						echo $option;

						$realisations_img = get_field('realisations_img', get_the_ID());
						
						foreach($realisations_img as $realisation){
							$list_realisations_html .= "
							<div class='realisation ".sanitize_title($slug)."'>
								<a href='".$realisation["photo"]["sizes"]["large"]."' data-lightbox='".sanitize_title($slug)."' data-title='".str_replace("'","&apos;",$realisation["intitule"])."'>
									<div class='visuel'>
										<img class='photo' src='".$realisation["photo"]["sizes"]["large"]."' alt='". $realisation["photo"]["sizes"]["large"]['alt']."'/>
										<div class='overlay-gallery'>
											<div class='categorie'>".$realisation["intitule"]."</div>
											<div class='intitule'>".$category."</div>
										</div>
									</div>
								</a>
							</div>
							";
						}
							
					}
				}	
				?>
			</select>
		</div>
		<div class="grid-gallery grid-isotope">
				<?= $list_realisations_html ?>
		</div>
	</div>
</section>