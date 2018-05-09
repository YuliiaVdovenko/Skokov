<?php
/**
 * The template for displaying front-page.
 *
 * @package understrap
 */
?>

<?php
while (have_rows ('modules_home_page')) :the_row ();
	switch (get_row_layout()) {
		case 'section_slider' :
		get_template_part ('page-templates/modules/slider');
		break;
		case 'work_list' :
		get_template_part ('page-templates/modules/work-list');
		break;
		case 'portfolio-list' :
		get_template_part ('page-templates/modules/portfolio-list');
		break;
		case 'section_our_clients' :
		get_template_part ('page-templates/modules/slick-slider');
		break;
		default: break;
	}
	endwhile; ?>


	<?php get_footer(); ?>