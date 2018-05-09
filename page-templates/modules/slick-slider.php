<?php
get_header();
$container   = get_theme_mod( 'understrap_container_type' );?>


<section class="clients pt-5 pb-5">
	<?php if( get_sub_field('clients_title') ): ?>
		<h2 class="portfolio-title mb-3">  <?= get_sub_field('clients_title') ?> </h2>
		<p class="section-p pb-5"> <?= get_sub_field('clients_subtitle') ?> </p>
	<?php endif; ?>
	<?php if (have_rows('clients_logo_list')) : ?>
		<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
			<ul class="slick-list logo-list">
				<?php while (have_rows ('clients_logo_list')) : the_row ();?>
					<li class="slick-item col-3">
						<img src="<?php the_sub_field('clients_logo') ?>">
					</li>
				<?php endwhile;?>
			</ul>
		</div>
	<?php endif; ?>
</section>

