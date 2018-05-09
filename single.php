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
		<h2 class="blog-name"> <?= __('blog', 'understrap-child')?> </h2>
	</div>
</div>

<!--Main Post-->
<div class="<?php echo esc_attr( $container ); ?>">
	<div class="row">
		<div class="col-md-7 col-lg-8">
			<main class="site-main" id="main">
				<?php if (have_posts () ) : while ( have_posts() ) : the_post(); the_post_thumbnail();?>
					<div class="img-title-div col-12">
						<h2 class="img-title"> <?php the_title() ?> </h2>
						<div class="d-flex flex-wrap justify-content-center justify-content-sm-end">
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
								<time datetime="2013-10-12" class="post-likes">
									<?php the_date('M. d, Y');?>
								</time>
							</li>
						</ul>
					</div>
				</div>
				<div class="content-div">
					<?php the_content();?>
				</div>
			</main>


			<!--Social likes and button for Share Post-->
			<div class="d-flex flex-wrap justify-content-between share-list">
				<h2 class="related-post-name"> share this post </h2>
				<ul class="d-flex flex-wrap justify-content-start justify-content-lg-end align-items-center likes-number">
					<li class="likes-number-item">
						<a href="#" class="social col-6">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
						<span class="likes-number-span col-6"> 15 </span>
					</li>
					<li class="likes-number-item">
						<a href="#" class="social col-6">
							<i class="fa fa-google-plus" aria-hidden="true"></i>
						</a>
						<span class="likes-number-span col-6"> 34 </span>
					</li>
					<li class="likes-number-item">
						<a href="#" class="social col-6">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
						<span class="likes-number-span col-6"> 162 </span>
					</li>
					<li class="likes-number-item">
						<a href="#" class="social col-6">
							<i class="fa fa-linkedin" aria-hidden="true"></i>
						</a>
						<span class="likes-number-span col-6">  7 </span>
					</li>
				</ul>
			</div>

			<!--Related Post List -->
			<?php
			$args = array(
				'numberposts' => 3,
				'offset' => 0,
				'category' => 0,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'include' => '',
				'exclude' => '',
				'meta_key' => '',
				'meta_value' =>'',
				'post_type' => 'post',
				'post_status' => 'publish',
				'post__not_in' => array(get_the_ID()),
				'suppress_filters' => true
			);
			$recent_posts = wp_get_recent_posts($args);
			?>

			<div class="related-post-div">
				<h2 class="related-post-name "> Related Post </h2>
				<div class="row">
					<?php foreach ($recent_posts as $recent_post) {?>
					<div class="col-12 col-sm-6 col-md-12 col-lg-4 post">
						<a href="<?php the_permalink($recent_post['ID']); ?>">
							<?php echo get_the_post_thumbnail($recent_post['ID']); ?>
						</a>
						<div class="img-title-div">
							<h4 class="related-img-title">
								<a href="<?= get_permalink($recent_post["ID"]) ?>">
									<?= $recent_post['post_title']; ?>
								</a>
							</h4>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>

			<!--Comments List -->
			<div class="comments-list">
				<?php
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
			</div>
		<?php endwhile;?>
		<?php endif; ?>
		</div>

		<aside class="sidebar col-md-5 col-lg-4">
			<?php dynamic_sidebar('right-page-sidebar'); ?>
		</aside>

	</div>
</div>



<?php get_footer(); ?>
