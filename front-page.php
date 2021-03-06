<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 */

get_header();
?>
	<main id="primary" class="site-main">
	


		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<?php
		if(is_front_page()) : ?>
				<section class="carrousel">
				<div><a href="http://localhost:8080/TP2/category/image/">Imagerie 3D</a></div>
				<div><a href="http://localhost:8080/TP2/category/cours/">Cours</a></div>
				<div><a href="http://localhost:8080/TP2/category/jeu/">Jeu</a></div>
				<div><a href="http://localhost:8080/TP2/category/specifique/">Spécifique</a></div>
				<div><a href="http://localhost:8080/TP2/category/web/">Web</a></div>
				</section>
                <div style="display: flex; justify-content:center;">
				<button id='un' style="background-color:turquoise">I</button>
				<button id='deux' style=" background-color: #ff9d00;">C</button>
				<button id='trois' style="background-color: #00aeff;">J</button>
				<button id='quatre' style="background-color: red;">S</button>
				<button id='cinq' style="background-color: #ffd000;">W</button>
                </div>
				<?php endif ?>

			<section class="cours">
			<?php
			/* Start the Loop */
            $precedent = "XXXXXX";
			$chaine_bouton_radio = '';
			//global $tProprieté;
			while ( have_posts() ) :
				the_post();
                convertirTableau($tPropriété);
				//print_r($tPropriété);
				if ($tPropriété['typeCours'] != $precedent): 
					if ("XXXXXX" != $precedent)	: ?>
						</section>
						<?php if($precedent=="Web"):?>
						<!-- <//?php if (in_array($precedent, ["Web", "Jeu"])) : ?> -->
							<section class="ctrl-carrousel">
								<?php echo $chaine_bouton_radio;
							//	$chaine_bouton_radio = '';
								 ?>		
							</section>
						<?php endif; ?>
					<?php endif; ?>	
					<h2><?php echo $tPropriété['typeCours'] ?></h2>
					<section <?php echo //(in_array($tProprieté['typeCours'], ['Web', 'Jeu']));
							($tProprieté['typeCours']=='Web'? 'class="carrousel-2"':'class="bloc"');?>>
				<?php endif ?>	

				<?php if //(in_array
				($tPropriété['typeCours'] == 'Web'|| 'Jeu'|| 'Spécifique'):
				//)
				 
						get_template_part( 'template-parts/content', 'cours-carrousel' ); 
						$chaine_bouton_radio .= '<input class="rad-carrousel"  type="radio" name="rad-carrousel">';
						elseif ($tProprieté['typeCours'] == 'Projet'):
				 		get_template_part( 'template-parts/content', 'galerie');
						else :		
						get_template_part( 'template-parts/content', 'article' ); 
				endif;	
				$precedent = $tPropriété['typeCours'];
			endwhile;?>

		<?php endif; ?>
		<?php if (is_active_sidebar('desc-cours')):?>
			<?php dynamic_sidebar('desc-cours');?>
			<?php endif;?>

	

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

function convertirTableau(&$tPropriété)
{
	
	// $titre = get_the_title(); 
	// // 582-1W1 Mise en page Web (75h)
	// $sigle = substr($titre, 0, 7);
	// $nbHeure = substr($titre,-4,3);
	// $titrePartiel =substr($titre,8,-6);
	// $session = substr($titre, 4,1);
	// // $contenu = get_the_content();
	// // $resume = substr($contenu, 0, 200);
	// $typeCours = get_field('type_de_cours');


	 $tPropriété['titre'] = get_the_title(); 
	 $tPropriété['sigle'] = substr($tPropriété['titre'], 0, 7);
	 $tPropriété['nbHeure'] = substr($tPropriété['titre'],-4,3);
	 $tPropriété['titrePartiel'] = substr($tPropriété['titre'],8,-6);
	 $tPropriété['session'] = substr($tPropriété['titre'], 4,1);
	 $tPropriété['typeCours'] = get_field('type_de_cours');
	 
}
function genere_bouton_radio($type)
{
	
}

function class_bloc($type_de_cours){
	if(in_array($type_de_cours, ["Web", "Jeu"])){
		return('class="slider"');
	}
	elseif($type_de_cours == 'Projet'){
		return('class="galerie"');
	}else{
		return('class="bloc"');
	}
}
