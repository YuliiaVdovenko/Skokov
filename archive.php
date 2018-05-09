<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
?>

	<header class="slider-back">
		<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
			<?php
			the_archive_title( '<h2 class="blog-name">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</div>
	</header>



<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<div class="col-lg-8">
				<ul class="post-list news-list row">
                    <?php while ( have_posts() ) : the_post();?>
						<li class="blog-element-item col-12 col-md-6 post-item">
							<a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail();?>
							</a>

							<div class="img-title-div col-12">
								<h2 class="img-title">
									<a href="<?php the_permalink(); ?>">
                                        <?php the_title() ?>
									</a>
								</h2>
                                <?php the_excerpt(); ?>
								<div class="d-flex flex-wrap justify-content-sm-end">
									<span class="post-likes"> <i class="fa fa-heart" aria-hidden="true"></i> 15 </span>
									<ul class="d-flex flex-wrap justify-content-center justify-content-sm-end
                                                           align-items-baseline col-12 col-sm-8 col-md-10 col-lg-8">
										<li>
											<span class="by"> <?= __('by','understrap-child');?> </span>
											<a  class="post-likes" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                                                <?php the_author(); ?>
											</a>
										</li>
										<li>
											<span class="post-likes before-after">
												<?php comments_number( '0 comments', '1 comment', '% comments' ); ?>
											</span>
										</li>
										<li>
											<span class="post-likes">
												<?php the_date('M. d, Y');?>
											</span>
										</li>
									</ul>
								</div>
							</div>
						</li>
                    <?php endwhile; // end of the loop. ?>
				</ul>

				<div class="my-pagination">
                    <?php the_posts_pagination(); ?>
				</div>
			</div>



			<aside class="sidebar col-lg-4">
                <?php dynamic_sidebar('right-page-sidebar'); ?>
			</aside>
		</div>
	</div>


    <?php get_footer(); ?>

