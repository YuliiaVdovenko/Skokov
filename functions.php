<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );


function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
//    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );

    wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/libs/slick/slick.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'slick-theme-style', get_stylesheet_directory_uri() . '/libs/slick/slick-theme.css', array(), $the_theme->get( 'Version' ) );

    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );

    wp_enqueue_script( 'slick-script', get_stylesheet_directory_uri() . '/libs/slick/slick.min.js', array(), $the_theme->get( 'Version' ), true );

    wp_enqueue_script( 'isotope-script',  'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'masonry', get_stylesheet_directory_uri() . '/js/masonry.pkgd.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'masonry-loaded', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array(), $the_theme->get( 'Version' ), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


//Удаляем виджеты родительской темы
function remove_widgets(){

    unregister_sidebar( 'right-sidebar' );
    unregister_sidebar( 'left-sidebar' );
    unregister_sidebar( 'hero' );
    unregister_sidebar( 'statichero' );
    unregister_sidebar( 'footerfull' );

}
add_action( 'widgets_init', 'remove_widgets', 11 );

//Подлкючаем widgets.php дочерней темы
require_once('inc/widgets.php');


//фільтр однакових розмірів шрифтів для тегів
add_filter( 'widget_tag_cloud_args', 'change_tag_cloud_font_sizes');

function change_tag_cloud_font_sizes( array $args ) {
    $args ['default'] = '1.5'; //розмір по замовчуванню
    $args['smallest'] = '1.5'; //найменший розмір (коли до немає жодного поста прикріпленого до тегу
    $args['largest'] = '1.5'; // найбільший розмір, коли до тегу прикріплений 1 пост або більше, воно саме відносно вираховує
    $args ['unit'] = 'rem'; //одиниці виміру
    //зробила всы однакові, а можна було 0.8, 1, 1.3 чи будь-які інші значення, також працює якщо лінкам призначити фонт-сайз - 1.5 з імпотант!

    return $args;
}

//Include child-theme custom-comments.php
require_once('inc/custom-comments.php' );

//Remove note of comments-form
function change_comment_form($fields) {

    $fields['comment_notes_before'] = '';
    return $fields;
}

add_filter('comment_form_defaults','change_comment_form');

//Creating custom markup for comment
    function custom_comment ($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;?>

        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <article class="d-flex">
                <div class="avatar d-block">
                    <?= get_avatar( $comment); ?>
                </div>
                <div class="comments-text">
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em><?php _e('Your comment is awaiting moderation.') ?></em>
                    <?php endif; ?>
                    <h4 class="comment-author">
                        <a href="<?php comment_author_link($comment); ?>">
                            <?php
                            if ( $comment->user_id != '0' ) {
                                echo get_user_meta( $comment->user_id, 'nickname', true );
                            } else {
                                echo get_comment_author_link();
                            }
                            ?>
                        </a>
                        <time class="comment-time" datetime="<?php comment_time('Y-m-d');?>">
                            <?php printf( _x( '%s ago', '%s = human-readable time difference', 'understrap' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) );?>
                        </time>
                        <?php
                        comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
                        ?>
                    </h4>
                    <p> <?= get_comment_text($comment);?></p>
                </div>
            </article>
        </li>
    <?php } ?>

<?php //Include child-theme custom-post-type.php
require_once('inc/custom-post-type.php' );

//Include child-theme custom-field.php
require_once('inc/custom-fields.php' );

require_once ('inc/setup.php');

require_once ('inc/customizer.php');

//Add excerpt to pages in wp-admin
add_post_type_support( 'page', 'excerpt' ); ?>


<?php
// Удаляем H2 из пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
	function my_navigation_template( $template, $class ){
    	return '<nav class="%1$s" role="navigation"><div class="nav-links">%3$s</div></nav>';
	}
?>

<?php require_once ('inc/taxomony.php'); ?>

<?php
	function isotope_classes($id){
		$terms = wp_get_post_terms ( get_the_ID(), 'portfolio');
		foreach ($terms as $term) {
			echo $term->slug. ' ';
		}
	}
?>
