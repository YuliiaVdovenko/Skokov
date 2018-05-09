<?php
get_header();
$container   = get_theme_mod( 'understrap_container_type' );?>

<section class="slider-background" style="background-image: url(<?= get_sub_field('background') ?>)">
	<?php if (have_rows ('slide')): ?>
		<div class="<?php echo esc_attr( $container ); ?> slider">
			<div id="carouselExampleIndicators" class="carousel slide home-slider" data-ride="carousel">
				<ol class="carousel-indicators home-indicators">
					<?php
					$active = 'active';
					$num = 0;
					while (have_rows ('slide')) : the_row ();?>
					<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $num ?>" class="<?php echo $active ?>"></li>
					<?php
					$active = '';
					$num +=1;
					endwhile; ?>
				</ol>
				<div class="carousel-inner" role="listbox">
					<?php
					$active = 'active';
					while (have_rows ('slide')) : the_row();
						?>
						<div class="carousel-item <?php echo $active ?>">
							<ul class="slider-list col-sm-6">
								<li class="slider-item col-sm-3">
									<img src="<?php the_sub_field('image1') ?>" alt="member">
								</li>
								<li class="col-sm-3 slider-item">
									<img src="<?php the_sub_field('image2') ?>" alt="member">
								</li>
								<li class="col-sm-3 slider-item">
									<img src="<?php the_sub_field('image3') ?>" alt="member">
								</li>
								<li class="col-sm-3 offset-sm-3 slider-item">
									<img src="<?php the_sub_field('image4') ?>" alt="member">
								</li>
								<li class="col-sm-3 slider-item">
									<img src="<?php the_sub_field('image5') ?>" alt="member">
								</li>
								<li class="col-sm-3 slider-item">
									<img src="<?php the_sub_field('image6') ?>" alt="member">
								</li>
								<li class="col-sm-3 slider-item">
									<img src="<?php the_sub_field('image7') ?>" alt="member">
								</li>
								<li class="col-sm-3 slider-item">
									<img src="<?php the_sub_field('image8') ?>" alt="member">
								</li>
								<li class="col-sm-3 slider-item">
									<img src="<?php the_sub_field('image9') ?>" alt="member">
								</li>
								<li class="col-sm-3 offset-sm-3 slider-item">
									<img src="<?php the_sub_field('image10') ?>" alt="member">
								</li>
							</ul>
							<div class="text col-12 col-sm-6">
								<div>
									<h3 class="slider-title"> <?= get_sub_field('title') ?></h3>
								</div>
								<div>
									<p class="slider-subtitle"><?php the_sub_field('subtitle') ?></p>
								</div>
								<?php
								$link = get_sub_field('order');
								if( $link ): ?>
								<a class="order" href="<?php echo $link['url']; ?>"
									target="<?php echo $link['target']; ?>">
									<?php echo $link['title']; ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
					<?php $active = '';?>
				<?php endwhile; ?>
			</div>
			<a class="carousel-control-prev prev-a" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon prev" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next next-a" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon prev" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
<?php endif; ?>
</section>







