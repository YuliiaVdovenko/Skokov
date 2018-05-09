<?php
get_header();
$container   = get_theme_mod( 'understrap_container_type' );?>

<?php if( get_sub_field('section_title') ): ?>
	<section>
		<h2 class="portfolio-title mb-3"> <?= get_sub_field('section_title') ?> </h2>
		<p class="section-p pb-5"> <?= get_sub_field('section_subtitle') ?></p>
	<?php endif; ?>
	<?php if (have_rows('portfolio-image-list')) : ?>
		<ul class="grid d-flex flex-wrap">
			<?php while (have_rows ('portfolio-image-list')) : the_row ();?>
				<li class="element-item col-12 col-sm-6 col-md-4 col-lg-3">
					<img src="<?php the_sub_field('portfolio-image') ?>" alt="portfolio-image">
				</li>
			<?php endwhile;?>
		</ul>
	<?php endif; ?>
</section>
