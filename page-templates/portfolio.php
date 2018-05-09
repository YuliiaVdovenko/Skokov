<?php
/**
 * Template name: Portfolio
 * The template for displaying portfolio.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );?>

<div class="slider-back">
	<div class="container">
		<h2 class="blog-name"> <?= __('Portfolio', 'understrap-child')?> </h2>
	</div>
</div>

<div class="<?php echo esc_attr( $container ); ?> slider">
	<?php if( get_field('title_of_the_portfolio_page') ): ?>
		<h3 class="section-title"> <?= get_field('title_of_the_portfolio_page') ?></h3>
		<p class="section-subtitle"> <?= get_field('subtitle_of_the_portfolio_page') ?> </p>
	<?php endif; ?>
	<div id="filters" class="button-group text-center">
		<span data-fiter="*" class="filter-list-span"> All </span>
		<ul class="d-inline-flex flex-wrap justify-content-around filter-list pt-md-5">
			<?php $terms = get_terms( 'portfolio' );
			if( $terms && ! is_wp_error($terms) ){
				foreach( $terms as $term ){ ?>
				<li>
					<span data-filter="<?= '.' . $term->slug; ?>" class="filter-list-span">
						<?= $term->name; ?>
						</span>
				</li>
				<?php
			}
		}
		?>
	</ul>
</div>
</div>

<div class="portfolio-list">
	<ul class="d-flex flex-wrap filter-img-list">

		<?php
		$portfolio = new WP_Query( array('post_type' => array( 'portfolio' )) );
		if ( $portfolio->have_posts() ) {
			while ( $portfolio->have_posts() ) {
				$portfolio->the_post();
				?>
				<li class="col-12 col-sm-6 col-md-4 portfolio-item <?php isotope_classes(get_the_ID()); ?>">
					<div class="img-border">
						<?php the_post_thumbnail(); ?>
						<div class="portfolio-hover">
							<a href="<?php the_permalink(); ?>" class="hover-a">
								<i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</li>
				<?php
			}
		}
		wp_reset_query();
		wp_reset_postdata();
		?>
	</ul>
</div>

<?php get_footer(); ?>
