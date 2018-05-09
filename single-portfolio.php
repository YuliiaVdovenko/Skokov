<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );?>

<!--section Blog/Single post-->
<div class="slider-back">
	<div class="container">
		<h2 class="blog-name"> <?= __('Projects', 'understrap-child')?> </h2>
	</div>
</div>

<!--Main Post-->
<div class="<?php echo esc_attr( $container ); ?> w-50 pt-5 pb-5">
				<?php the_post_thumbnail();?>
</div>



<?php get_footer(); ?>
