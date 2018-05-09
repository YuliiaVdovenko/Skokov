<?php
/**
 * Register meta box(es).
 */
function wpdocs_register_meta_boxes() {
    add_meta_box('team-member-position', __( 'Team member position', 'understrap' ), 'position_field', 'Team');
}
	add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );

/**
 * Meta box display callback.
 * @param WP_Post $post Current post object.
 */

	function position_field( $post ) {
		$position_value= get_post_meta($post->ID, 'position');
		?>
		<label for="position">Set team position</label>
		<input type="text" id="position" name="position" value="<?=$position_value[0]?>">
		<!--    <input type="number" id="position" name="position" min="0" max="100" step="1">-->
	<?php }

/**
 * Save meta box content.
 * @param int $post_id Post ID
 */
function wpdocs_save_meta_box($post_id) {
    global $post;
    $position_value = $_POST['position'];
    update_post_meta($post->ID, 'position', $position_value);
}

add_action('save_post', 'wpdocs_save_meta_box');




/**
 * Register meta box(es).
 */

function register_skill_level_meta_box() {
    add_meta_box( 'skill_level_meta_box', __( 'Team member skills', 'understrap' ), 'skill_level', 'Team');
}
add_action( 'add_meta_boxes', 'register_skill_level_meta_box' );

/**
 * Meta box display callback.
 * @param WP_Post $post Current post object.
 */

function skill_level( $post ) {
    $photoshop_value= get_post_meta($post->ID, 'photoshop');
    $html_value= get_post_meta($post->ID, 'html');
    $wordpress_value= get_post_meta($post->ID, 'wordpress');
    $javascript_value= get_post_meta($post->ID, 'javascript');
    $illustrator_value= get_post_meta($post->ID, 'illustrator');
    $php_value= get_post_meta($post->ID, 'php');
    $joomla_value= get_post_meta($post->ID, 'joomla');
    $mysql_value= get_post_meta($post->ID, 'mysql');
    ?>
	<ul>
		<li>
			<label for="photoshop">Photoshop skill</label>
			<input type="number" id="photoshop" name="photoshop" min="0" max="100" step="1" value="<?=$photoshop_value[0]?>">
		</li>
		<li>
			<label for="html">Html skill</label>
			<input type="number" id="html" name="html" min="0" max="100" step="1" value="<?=$html_value[0]?>">
		</li>
		<li>
			<label for="wordpress">Wordpress skill</label>
			<input type="number" id="wordpress" name="wordpress" min="0" max="100" step="1" value="<?=$wordpress_value[0]?>">
		</li>
		<li>
			<label for="javascript">Javascript skill</label>
			<input type="number" id="javascript" name="javascript" min="0" max="100" step="1" value="<?=$javascript_value[0]?>">
		</li>
		<li>
			<label for="illustrator">Illustrator skill</label>
			<input type="number" id="illustrator" name="illustrator" min="0" max="100" step="1" value="<?=$illustrator_value[0]?>">
		</li>
		<li>
			<label for="php">Php skill</label>
			<input type="number" id="php" name="php" min="0" max="100" step="1" value="<?=$php_value[0]?>">
		</li>
		<li>
			<label for="joomla">Joomla skill</label>
			<input type="number" id="joomla" name="joomla" min="0" max="100" step="1" value="<?=$joomla_value[0]?>">
		</li>
		<li>
			<label for="mysql">Mysql skill</label>
			<input type="number" id="mysql" name="mysql" min="0" max="100" step="1" value="<?=$mysql_value[0]?>">
		</li>
	</ul>

<?php }

/**
 * Save meta box content(
 * Photoshop skill
 * Html skill
 * Wordpress skill
 * Javascript skill
 * Illustrator skill
 * Php skill
 * Joomla skill
 * Mysql skill
 * @param int $post_id Post ID
 */
function skill_level_save($post_id) {
    global $post;
    $photoshop_value = $_POST['photoshop'];
    $html_value = $_POST['html'];
    $wordpress_value = $_POST['wordpress'];
    $javascript_value = $_POST['javascript'];
    $illustrator_value = $_POST['illustrator'];
    $php_value = $_POST['php'];
    $joomla_value = $_POST['joomla'];
    $mysql_value = $_POST['mysql'];
    update_post_meta($post->ID, 'photoshop', $photoshop_value);
    update_post_meta($post->ID, 'html', $html_value);
    update_post_meta($post->ID, 'wordpress', $wordpress_value);
    update_post_meta($post->ID, 'javascript', $javascript_value);
    update_post_meta($post->ID, 'illustrator', $illustrator_value);
    update_post_meta($post->ID, 'php', $php_value);
    update_post_meta($post->ID, 'joomla', $joomla_value);
    update_post_meta($post->ID, 'mysql', $mysql_value);
}
add_action('save_post', 'skill_level_save');





