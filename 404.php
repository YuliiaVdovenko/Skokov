<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>


<div class="slider-back">
	<div class="container">
		<h2 class="blog-name"> <?= __('404 Error', 'understrap-child')?> </h2>
	</div>
</div>

<div class="<?php echo esc_attr( $container ); ?>">
	<div class="error-page">
		<div class="page-header">
			<span class="page-span"> 404 </span>
			<span class="page-title">
				<?php esc_html_e( 'Page not found!','understrap' ); ?>
			</span>
		</div>
		<div class="page-content">
			<a href="<?php echo get_home_url();?>"> Back to homepage</a>
			<span> or </span>
			<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Our Blog</a>
		</div>
	</div>
</div>


<?php get_footer(); ?>
