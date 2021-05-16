<?php
/**
 * 
 * 
 * @package theme4w4
 */
?>

<article class="flip-card">
<div class="flip-card-inner">
<div class="flip-card-front">
<?php the_post_thumbnail(array(300,300));?>
</div>
<div class="flip-card-back">
<h1><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></h1>
<p><a href="<?php echo get_permalink();?>"><?php the_author(); ?></a></p>
<p><a href="<?php echo get_permalink();?>"><?php the_category() ?></a></p>
<p><a href="<?php echo get_permalink();?>"><?php the_content() ?></a></p>

</div>
</div>
</article>
