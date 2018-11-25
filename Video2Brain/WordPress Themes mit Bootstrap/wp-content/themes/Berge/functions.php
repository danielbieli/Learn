<?php

register_nav_menu( 'primary', 'Erstes Menü' );
add_theme_support( 'post-thumbnails' );
register_sidebar(array('name' =>'Seitenleiste', 'id' => 'seitenleiste'));






function new_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');



function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );










/* ********
// Shortcodes
 * ********/
add_filter( 'the_content', 'berge_shortcode', 20 );
function berge_shortcode( $content ) {

	$zoom=9;
	preg_match('/\[map (.*?)\]/', $content, $matches);
	list($lat,$lon) = explode(',', $matches[1]);
	
	if(!is_numeric($lat) OR !is_numeric($lon)) {
		$map='<strong style="background:#F99;">Es konnte keine map eingebunden werden. Bitte geben Sie [map 48,12] an, wobei in diesem Beispiel 48 für den Breitengrad und 12 für den Längengrad steht.<strong>';
	}else{
		$lu_lon=$lon-0.5; $rb_lon=$lon+0.5;
		$lu_lat=$lat-0.5; $rb_lat=$lat+0.5;
		$map = '<iframe width="625" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openstreetmap.org/export/embed.html?bbox='.$lu_lon.'%2C'.$lu_lat.'%2C'. $rb_lon.'%2C'.$rb_lat.'&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="http://www.openstreetmap.org/#map='.$zoom.'/'.$lat.'/'.$lon.'">Größere Karte anzeigen</a></small>';
	}
	
	$content = preg_replace('/\[map(.*?)\]/', $map, $content);
    return $content;
}









// Zusätzliche Formate im Backend

function berge_mce_format($init) {
    // Add block format elements you want to show in dropdown
	$init['theme_advanced_blockformats'] = 'Absatz=p,Überschrift 2=h2,Zwischenüberschrift=h3';
	$init['theme_advanced_buttons1_add_before'] = 'styleselect';
	$init['theme_advanced_styles'] = 'roter Text=red_text,blauer Text=blue_text';
    return $init;
}
add_filter('tiny_mce_before_init', 'berge_mce_format' );

function berge_add_editor_styles() {
    add_editor_style( 'berge-editor-style.css' );
}
add_action( 'init', 'berge_add_editor_styles' );











/***
 Theme-Optionen
***/

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

// Einstellungen registrieren (http://codex.wordpress.org/Function_Reference/register_setting)
function theme_options_init(){
	register_setting( 'berge_options', 'berge_theme_options', 'berge_validate_options' );
}

// Seite in der Dashboard-Navigation erstellen
function theme_options_add_page() {
	add_theme_page('Optionen', 'Optionen', 'edit_theme_options', 'theme-optionen', 'berge_theme_options_page' ); // Seitentitel, Titel in der Navi, Berechtigung zum Editieren (http://codex.wordpress.org/Roles_and_Capabilities) , Slug, Funktion 
}

// Optionen-Seite erstellen
function berge_theme_options_page() {
global $select_options, $radio_options;
if ( ! isset( $_REQUEST['settings-updated'] ) )
	$_REQUEST['settings-updated'] = false; ?>

<div class="wrap"> 
<?php screen_icon(); ?><h2>Theme-Optionen für <?php bloginfo('name'); ?></h2> 

<?php if ( false !== $_REQUEST['settings-updated'] ) : ?> 
<div class="updated fade">
	<p><strong>Einstellungen gespeichert!</strong></p>
</div>
<?php endif; ?>

  <form method="post" action="options.php">
	<?php settings_fields( 'berge_options' ); ?>
    <?php $options = get_option( 'berge_theme_options' ); ?>

    <table class="form-table">
      <tr valign="top">
        <th scope="row">Copyright</th>
        <td><input id="berge_theme_options[copyright]" class="regular-text" type="text" name="berge_theme_options[copyright]" value="<?php esc_attr_e( $options['copyright'] ); ?>" /></td>
      </tr>  
      <tr valign="top">
        <th scope="row">Google Analytics</th>
        <td><textarea id="berge_theme_options[analytics]" class="large-text" cols="50" rows="10" name="berge_theme_options[analytics]"><?php echo esc_textarea( $options['analytics'] ); ?></textarea></td>
      </tr>
    </table>
    
    <!-- submit -->
    <p class="submit"><input type="submit" class="button-primary" value="Einstellungen speichern" /></p>
  </form>
</div>
<?php }


function berge_validate_options( $input ) {
	 $input['copyright'] = wp_filter_nohtml_kses( $input['copyright'] );
	return $input;
}










/*
 * Anzeigen der Kommentare
 * 
 */
function show_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);	
?>
<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">

	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">

	<div class="comment-author vcard">
		<?php
			if ($args['avatar_size'] != 0)
				echo get_avatar($comment, $args['avatar_size']);
			
			echo '<div class="comment_meta">';
				printf(__('<cite class="fn">%s</cite> <span class="says">schrieb am </span>'), get_comment_author_link());
				printf( __('%1$s:'), get_comment_date());
			echo '</div>';
			echo '<div class="clearfix"></div>';
		?>
	</div>
	
	<?php if ($comment->comment_approved == '0') :?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em><br />
	<?php endif; ?>
	
	
	<?php comment_text();?>
	
	<div class="reply">
		<?php 
			comment_reply_link(array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'])));
		?>
	</div>
	
</li>

<?php
}











/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class wp_bootstrap_navwalker extends Walker_Nav_Menu {

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( $args->has_children )
				$class_names .= ' dropdown';

			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= '#';
				$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .'>';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';

				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';

			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';

			if ( $container )
				$fb_output .= '</' . $container . '>';

			echo $fb_output;
		}
	}
}


?>