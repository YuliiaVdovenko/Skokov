<?php
/**
 * Template name: Contacts
 * The template for displaying contacts.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );?>

<div class="slider-back">
	<div class="container">
		<h2 class="blog-name"> <?= __('Contact', 'understrap-child')?> </h2>
	</div>
</div>
<?php if( get_field('map_code') ): ?>
	<div class="contact-map">
		<?php the_field ('map_code'); ?>
	</div>
<?php endif; ?>

<div class="<?php echo esc_attr($container); ?>">
	<div class="row contact-block">
		<div class="col-12 col-lg-8">
			<?php if( get_theme_mod('form_name') ): ?>
				<h5 class="contact-title"> 
					<?php echo get_theme_mod('form_name'); ?> 
				</h5>
			<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
		<div class="col-12 col-lg-4">
			<?php if( get_theme_mod('info_name') ): ?>
				<h5 class="contact-title"> 
					<?php echo get_theme_mod('info_name'); ?> 
				</h5>
			<?php endif; ?>
			<ul class="contact-page-list">
				<?php if( get_theme_mod('address_text') ): ?>
					<li class="d-flex align-items-center">
						<span class="social-icon icon-map"> 
							<i class="fa fa-map-marker" aria-hidden="true"></i>
						</span>
						<div class="d-flex twitter-list-div">
							<span class="phone">
								<?php echo get_theme_mod('address_label'); ?>
							</span>
							<ul class="d-flex flex-column tel">
								<li>
									<address>
										<?php echo get_theme_mod('address_text'); ?>
									</address>
								</li>
							</ul>
						</div>
					</li>
				<?php endif; ?>
				<?php if( get_theme_mod('phone_number') ): ?>
					<li class="d-flex align-items-center">
						<span class="social-icon"><i class="fa fa-vimeo" aria-hidden="true"></i></span>
						<div class="d-flex twitter-list-div">
							<span class="phone">
								<?php echo get_theme_mod('phone_label'); ?>
							</span>
							<ul class="d-flex flex-column tel">
								<li>
									<a href="tel:<?php echo get_theme_mod('phone_number'); ?>" class="tel">
										<?php echo get_theme_mod('phone_number'); ?>
									</a>
								</li>
								<li>
									<a href="tel:<?php echo get_theme_mod('phone_number2'); ?>" class="tel">
										<?php echo get_theme_mod('phone_number2'); ?>
									</a>
								</li>
							</ul>
						</div>
					</li>
				<?php endif; ?>
				<?php if( get_theme_mod('email_address') ): ?>
					<li class="d-flex align-items-center">
						<span class="social-icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
						<div class="d-flex flex-column twitter-list-div">
							<span class="phone">
								<?php echo get_theme_mod('email_label'); ?>
							</span>
							<a class="email" href="mailto:<?php echo get_theme_mod('email_address'); ?>" class="tel">
								<?php echo get_theme_mod('email_address'); ?>
							</a>
						</div>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>


<?php get_footer(); ?>
