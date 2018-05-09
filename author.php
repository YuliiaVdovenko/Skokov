<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<header class="slider-back">
	<div class="<?php echo esc_attr( $container ); ?>">
		<?php $curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by(
			'slug', $author_name ) : get_userdata( intval( $author ) );
			?>

			<h2 class="blog-name">
				<?php esc_html_e( 'About: ', 'understrap' ); ?><?php echo esc_html( $curauth->nickname ); ?>
			</h2>
		</div>
	</header>

	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="row">
			<div class="col-lg-8">
				<ul class="posts-by-author row">
					<li class="posts-by-author-item">
						<div class="avatar-author col-12">
							<?php if ( ! empty( $curauth->ID ) ) : ?>
								<?php echo get_avatar( $curauth->ID ); ?>
							<?php endif; ?>
						</div>
						<div class="author-posts col-12">
							<dl>
								<?php if ( ! empty( $curauth->user_url ) ) : ?>
									<dt><?php esc_html_e( 'Website', 'understrap' ); ?></dt>
									<dd><a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a></dd>
								<?php endif; ?>

								<?php if ( ! empty( $curauth->user_description ) ) : ?>
									<dt><?php esc_html_e( 'Profile', 'understrap' ); ?></dt>
									<dd><?php echo esc_html( $curauth->user_description ); ?></dd>
								<?php endif; ?>
							</dl>
							<h2 class="author-title">
								<?php esc_html_e( 'Posts by', 'understrap' ); ?>
								<?php echo esc_html( $curauth->nickname ); ?> :
							</h2>
						</div>
					</li>
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<li class="posts-by-author-item">
								<div class="col-12">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="col-12 ">
									<a rel="bookmark" href="<?php the_permalink() ?>" class="post-name"
										title="<?php esc_html_e( 'Permanent Link:', 'understrap' ); ?> <?php the_title(); ?>">
										<?php the_title(); ?>
									</a>
									<?php understrap_posted_on(); ?>
									<p class="posts-categories"> <?php esc_html_e( 'Categories: ', 'understrap' ); ?></p>
									<?php the_category( ' ' ); ?>
								</div>
							</li>
						<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'loop-templates/content', 'none' ); ?>
					<?php endif; ?>
				</ul>

				<!-- The pagination component -->
				<?php the_posts_pagination(); ?>
			</div>

			<aside class="sidebar col-lg-4">
				<?php dynamic_sidebar('right-page-sidebar'); ?>
			</aside>
		</div>
	</div>

	<?php get_footer(); ?>
