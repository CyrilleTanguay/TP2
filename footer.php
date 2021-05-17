<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme4w4
 */

?>

	<footer id="colophon" class="site-footer">
	<div class="widget-footer">
	<?php if(is_active_sidebar('footer-1')): ?>
		<?php dynamic_sidebar('footer-1'); ?>
		<?php endif; ?>
		<section class="adresse">
		</section>
	</div>
<?php if(is_front_page()): ?>
	<section class="admin-rapid" >
  <h3>Ajouter</h3>
  <input type="text" name="title" placeholder="Titre">
  <textarea name="content" placeholder="Contenu"></textarea>
  <button id="bout-rapide">Nouveau</button>
</section>

			</section class="accueil"> <!-- fin section cours -->
			<section class="nouvelles">
				<h2>Nouvelles</h2>
			<!-- <button id="bout_nouvelles">Nouvelles du jour</button> -->
			<section></section>
			</section>
			<?php endif; ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
