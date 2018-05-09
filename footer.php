<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<footer class="site-footer footer" id="colophon">
	<div class="<?php echo esc_attr( $container ); ?>">
		<ul class="row flex-wrap justify-content-between">
			<li class="col-12 col-md-6 col-lg-4 pb-5">
				<?php dynamic_sidebar ('footer-sidebar-left');?>
			</li>
			<li class="col-12 col-md-6 col-lg-4 pb-5">
				<?php dynamic_sidebar ('footer-sidebar-center');?>
				<?php if( get_theme_mod('social_link_name') ): ?>
					<h5 class="footer-title"> 
						<?php echo get_theme_mod('social_link_name'); ?> 
					</h5>
				<?php endif; ?>
				
				<ul class="row social-list">
					<?php if( get_theme_mod('fb_link') ): ?>
						<li>
							<a href="<?php echo get_theme_mod('fb_link'); ?>" class="social">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif; ?>
					<?php if( get_theme_mod('google_link') ): ?>
						<li>
							<a href="<?php echo get_theme_mod('google_link'); ?>" class="social">
								<i class="fa fa-google-plus" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif; ?>
					<?php if( get_theme_mod('twitter_link') ): ?>
						<li>
							<a href="<?php echo get_theme_mod('twitter_link'); ?>" class="social">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif; ?>
					<?php if( get_theme_mod('in_link') ): ?>
						<li>
							<a href="<?php echo get_theme_mod('in_link'); ?>" class="social">
								<i class="fa fa-linkedin" aria-hidden="true"></i></a>
							</li>
						<?php endif; ?>
						<?php if( get_theme_mod('youtube_link') ): ?>
							<li>
								<a href="<?php echo get_theme_mod('youtube_link'); ?>" class="social">
									<i class="fa fa-youtube" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if( get_theme_mod('vk_link') ): ?>
							<li>
								<a href="<?php echo get_theme_mod('vk_link'); ?>" class="social">
									<i class="fa fa-bold" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if( get_theme_mod('rss_link') ): ?>
							<li><a href="<?php echo get_theme_mod('rss_link'); ?>" class="social">
								<i class="fa fa-rss" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif; ?>
					<?php if( get_theme_mod('dribble_link') ): ?>
						<li>
							<a href="<?php echo get_theme_mod('dribble_link'); ?>" class="social">
								<i class="fa fa-dribbble" aria-hidden="true"></i> </a>
							</li>
						</ul>
					<?php endif; ?>
				</li>

				<li class="col-12 col-md-6 col-lg-4 pb-5">
					<?php if( get_theme_mod('info_name') ): ?>
						<h5 class="footer-title"> 
							<?php echo get_theme_mod('info_name'); ?> 
						</h5>
					<?php endif; ?>
					<ul class="contact-list pb-5">
						<?php if( get_theme_mod('address_text') ): ?>
							<li class="d-flex align-items-center">
								<span class="social-icon icon-map"> 
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</span>
								<address class="d-flex flex-column twitter-list-div">
									<span class="phone"> 
										<?php echo get_theme_mod('address_label'); ?> 
									</span>
									<?php echo get_theme_mod('address_text'); ?>
								</address>
							</li>
						<?php endif; ?>

						<?php if( get_theme_mod('phone_number') ): ?>
							<li class="d-flex align-items-center">
								<span class="social-icon">
									<i class="fa fa-vimeo" aria-hidden="true"></i>
								</span>
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
								<span class="social-icon">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
								<div class="d-flex flex-column twitter-list-div">
									<span class="email"> 
										<?php echo get_theme_mod('email_label'); ?> 
									</span>
									<a href="mailto:<?php echo get_theme_mod('email_address'); ?>" class="tel"> 
										<?php echo get_theme_mod('email_address'); ?> 
									</a>
								</div>
							</li>
						<?php endif; ?>
					</ul>
					<div>
						<?php dynamic_sidebar ('footer-sidebar-right');?>
					</div>
				</li>
			</ul>
		</div>
	</footer>


	<div class="site-info footer-background">
		<div class="<?php echo esc_attr( $container ); ?> d-flex flex-wrap justify-content-between align-items-baseline">
			<div class="siteinfo">
				<?php if( get_theme_mod('footer_copyright') ): ?>
					<span class="footer-info"> 
						<?php echo get_theme_mod('footer_copyright'); ?> 
					</span>
					<time datetime="<?php echo date('Y');?>" class="footer-info"> 
						<?php echo date('Y');?> 
					</time>
					<a class="footer-info info-link" href="<?php echo get_theme_mod('footer_copyright_link'); ?>"> 
						<?php echo get_theme_mod('footer_copyright_lable'); ?> 
					</a>
					<span class="footer-info"> 
						<?php echo get_theme_mod('footer_copyright2'); ?> 
					</span>
				<?php endif; ?>
			</div>
				<nav class="navbar navbar-expand-md navbar-dark">
					<?php if ( 'container' == $container ) : ?>
						<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
						<?php endif; ?>
						<!-- Your site title as branding in the menu -->
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'd-flex',
								'container_id'    => 'navbar-footer',
								'menu_class'      => 'footer-nav d-flex flex-wrap justify-content-between',
								'fallback_cb'     => '',
								'menu_id'         => 'footer-menu',
								'walker'          => new understrap_WP_Bootstrap_Navwalker(),
							)
							); ?>
						</div>
				</nav>
			</div>
	</div>



			<?php wp_footer(); ?>

