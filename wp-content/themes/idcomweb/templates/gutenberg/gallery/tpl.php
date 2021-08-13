<?php

/*******************************************************************************
 * 
 * Base section Gutenberg template-
 * 
 */

global $wp;

global $ID;

global $site_data;

?>

<section id="realisations" class="marge-pour-accueillir-bandeau-lateral">
	<div class="container-fluid">
		<div class="introduction">
			<h2 class="titre-type"><?php echo get_field("realisations")["introduction"]["titre"]; ?></h2>
            <div class="preambule-type"><?php echo get_field("realisations")["introduction"]["preambule"]; ?></div>
		</div>
		<div class="categories">
			<button data-filter='*' class="is-checked">Tout</button>
		<?php
		foreach(get_field("realisations")["categories"] as $categorie){
			echo "<button data-filter='.".sanitize_title($categorie["nom"])."'>".$categorie["nom"]."</button>";
		}	
		?>
		</div>
		<div class="grid-gallery grid-isotope" >
		<?php	
		$page						= (get_query_var('paged'))?get_query_var('paged'):'1';
		$row              			= 0;
		$realisations_per_page  	= 999;
		$realisations           	= array_reverse(get_field("realisations")["liste_des_realisations"]);
		$total            			= count($realisations);
		$pages            			= ceil($total/$realisations_per_page);
		$min              			= (($page*$realisations_per_page)-$realisations_per_page)+1;
		$max              			= ($min+$realisations_per_page)-1;

		foreach($realisations as $realisation){
			$row++;
			if($row < $min) { continue; }
			if($row > $max) { break; }
			echo "
			<div class='realisation ".sanitize_title($realisation["categorie_associee"]["value"])."'>
				<a href='".$realisation["photo"]["sizes"]["large"]."' data-lightbox='".$realisation["categorie_associee"]["value"]."' data-title='".str_replace("'","&apos;",$realisation["intitule"])."'>
					<div class='visuel'>
                        <img class='photo' src='".$realisation["photo"]["sizes"]["large"]."' alt='". $realisation["photo"]["sizes"]["large"]['alt']."'/>
                        <div class='overlay-gallery'>
                            <div class='categorie'>".$realisation["intitule"]."</div>
                            <div class='intitule'>".$realisation["categorie_associee"]["label"]."</div>
						</div>
					</div>
				</a>
			</div>";
		}	
		?>
		</div>
		<?php	
		if($pages>1){
			$links=paginate_links(array(
				'base' => preg_replace('/\?.*/', '/', get_pagenum_link(1)) . '%_%',
				'format' => 'page/%#%',
				'current' => $page,
				'total' => $pages,
				'prev_text' => '&lt;',
				'next_text' => "VOIR PLUS",
				'type' => 'array'
			));
			if(strpos(end($links),"next")){
				#echo "<div class='la-pagination text-center'><h4>".end($links)."</h4></div>";
			}
		}
		?>

		<div class="scroller-status">
			<div class="loader-ellips infinite-scroll-request">
				<img src="<?= home_url(); ?>/wp-content/uploads/2021/08/loading.svg" />
			</div>
		</div>
	</div>
</section>