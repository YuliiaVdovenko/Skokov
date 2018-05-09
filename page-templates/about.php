<?php
/**
 * Template name: About
 * The template for displaying section about company.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );?>

<!--section About us-->
<div class="slider-back">
	<div class="container">
		<h2 class="blog-name"> <?= __('About us', 'understrap-child')?> </h2>
	</div>
</div>

<div class="<?php echo esc_attr($container); ?> about-team">
	<div class="row">
		<div class="col-12 col-lg-4 team-description">
			<?php the_post_thumbnail() ?>
		</div>
		<div class="col-12 col-lg-8 team-description">
			<h2 class="team-title"> <?php the_title() ?> </h2>
			<div class="excerpt bold"> <?php the_excerpt();?> </div>
			<div class="excerpt column">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	<?php if( get_field('about_skills_title') ): ?>
		<div class="skills-description">
			<h3 class="skills"> <?= get_field('about_skills_title') ?> </h3>
			<p><?= get_field('about_skills_subtitle') ?></p>

			<?php
			$query = new WP_Query( array('post_type' => array( 'team' )) );
			$num = $query->post_count;
			$photoshop = 0;
			$html = 0;
			$wordpress = 0;
			$javascript = 0;
			$illustrator = 0;
			$php = 0;
			$joomla = 0;
			$mysql = 0;
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();

					$photoshop = $photoshop + get_post_meta(get_the_ID(), 'photoshop', true);
					$html = $html + get_post_meta(get_the_ID(), 'html', true);
					$wordpress = $wordpress + get_post_meta(get_the_ID(), 'wordpress', true);
					$javascript = $javascript + get_post_meta(get_the_ID(), 'javascript', true);
					$illustrator = $illustrator + get_post_meta(get_the_ID(), 'illustrator', true);
					$php = $php+ get_post_meta(get_the_ID(), 'php', true);
					$joomla = $joomla + get_post_meta(get_the_ID(), 'joomla', true);
					$mysql = $mysql + get_post_meta(get_the_ID(), 'mysql', true);
				}
			} else {

			}
			wp_reset_query();
			wp_reset_postdata();


			$photoshop = round($photoshop / $num, 0);
			$html = round($html / $num, 0);
			$wordpress= round($wordpress / $num, 0);
			$javascript = round($javascript / $num, 0);
			$illustrator = round($illustrator / $num, 0);
			$php = round($php / $num, 0);
			$joomla = round($joomla / $num, 0);
			$mysql = round($mysql / $num, 0);

			?>
		</div>

		<ul class="row skills-list">
			<li class="col-md-6 skills-item">
				<div class="d-flex skills-div-background">
					<div class="skills-number"><?php echo $photoshop ?>%</div>
					<div class="progress-skills-bar" role="progressbar" style="width: <?=$photoshop?>%" aria-valuenow="<?=$photoshop?>" aria-valuemin="0" aria-valuemax="100"><span>photoshop</span></div>
				</div>
			</li>
			<li class="col-md-6 skills-item">
				<div class="d-flex skills-div-background">
					<div class="skills-number"><?php echo $html ?>%</div>
					<div class="progress-skills-bar" role="progressbar" style="width: <?=$html?>%" aria-valuenow="<?=$html?>" aria-valuemin="0" aria-valuemax="100"><span>html</span></div>
				</div>
			</li>
			<li class="col-md-6 skills-item">
				<div class="d-flex skills-div-background">
					<div class="skills-number"><?php echo $wordpress ?>%</div>
					<div class="progress-skills-bar" role="progressbar" style="width: <?=$wordpress?>%" aria-valuenow="<?=$wordpress?>" aria-valuemin="0" aria-valuemax="100"><span>wordpress</span></div>
				</div>
			</li>
			<li class="col-md-6 skills-item">
				<div class="d-flex skills-div-background">
					<div class="skills-number"><?php echo $javascript ?>%</div>
					<div class="progress-skills-bar" role="progressbar" style="width: <?=$javascript?>%" aria-valuenow="<?=$javascript?>" aria-valuemin="0" aria-valuemax="100"><span>javascript</span></div>
				</div>
			</li>
			<li class="col-md-6 skills-item">
				<div class="d-flex skills-div-background">
					<div class="skills-number"><?php echo $illustrator ?>%</div>
					<div class="progress-skills-bar" role="progressbar" style="width: <?=$illustrator?>%" aria-valuenow="<?=$illustrator?>" aria-valuemin="0" aria-valuemax="100"><span>illustrator</span></div>
				</div>
			</li>
			<li class="col-md-6 skills-item">
				<div class="d-flex skills-div-background">
					<div class="skills-number"><?php echo $php ?>%</div>
					<div class="progress-skills-bar" role="progressbar" style="width: <?=$php?>%" aria-valuenow="<?=$php?>" aria-valuemin="0" aria-valuemax="100"><span>php</span></div>
				</div>
			</li>
			<li class="col-md-6 skills-item">
				<div class="d-flex skills-div-background">
					<div class="skills-number"><?php echo $joomla ?>%</div>
					<div class="progress-skills-bar" role="progressbar" style="width: <?=$joomla?>%" aria-valuenow="<?=$joomla?>" aria-valuemin="0" aria-valuemax="100"><span>joomla</span></div>
				</div>
			</li>
			<li class="col-md-6 skills-item">
				<div class="d-flex skills-div-background">
					<div class="skills-number"><?php echo $mysql ?>%</div>
					<div class="progress-skills-bar" role="progressbar" style="width: <?=$mysql?>%" aria-valuenow="<?=$mysql?>" aria-valuemin="0" aria-valuemax="100"><span>mysql</span></div>
				</div>
			</li>
		</ul>
	<?php endif; ?>
	<?php if( get_field('about_team_title') ): ?>
		<div class="skills-description">
			<h3 class="skills"> <?= get_field('about_team_title') ?> </h3>
			<p><?= get_field('about_team_subtitle') ?></p>

			<ul class="row members-list">

				<?php
				$query = new WP_Query( array('post_type' => array( 'team' )) );
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						?>
						<li class="col-sm-6 col-md-4 col-lg-3">
							<div class="members-foto"> <?php the_post_thumbnail(); ?> </div>
							<div class="members-position"><?php echo get_post_meta(get_the_ID(), 'position', true); ?></div>
						</li>
						<?php
					}
				} else {

				}
				wp_reset_query();
				wp_reset_postdata();
				?>
				<li class="col-sm-6 col-md-4 col-lg-3">
					<div class="members-foto">
						<img src="<?php the_field('image')?>" alt="">
					</div>
					<div class="members-position">
						<a href="mailto:<?php echo get_option( 'admin_email' ); ?> "> Send CV</a>
					</div>
				</li>
			</ul>
		</div>
	<?php endif; ?>
</div>



<?php get_footer(); ?>