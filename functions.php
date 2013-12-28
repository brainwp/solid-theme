<?php

/* Redefine the header image width and height ********************************************/
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyten_header_image_width', 835 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyten_header_image_height', 300 ) );

// Adiciona CSS a todas as aparições da palavra Solid
function filter_solid( $content ) {
	$string = array(' Solid ');
	$string2 = array(' Solid.');
	$string3 = array(' Solid,');
	$content = str_ireplace( $string, '<span style=color:#244c78;font-weight:bold;"> Solid </span>', $content );
	$content = str_ireplace( $string2, '<span style=color:#244c78;font-weight:bold;"> Solid.</span>', $content );
	$content = str_ireplace( $string3, '<span style=color:#244c78;font-weight:bold;"> Solid,</span>', $content );
	return $content;
}

add_filter( 'the_content', 'filter_solid' );

// Adiciona a função the_excerpt às Páginas
add_post_type_support( 'page', 'excerpt' );

// Remove notificações de update do WP para usuários abaixo do Administrador
global $user_login;
get_currentuserinfo();
if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins
add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}

// Personaliza o rodapé do admin
function custom_admin_footer() {
        echo 'Desenvolvido com <a href=http://wordpress.org/>WordPress</a> por <a href=http://www.brasa.art.br>Brasa Design e Tecnologia</a>.';
}
add_filter('admin_footer_text', 'custom_admin_footer');

// Remove o Item Editar do menu Aparência
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}

add_action('_admin_menu', 'remove_editor_menu', 1);

// Remove o MetaBox Format dos Posts
add_action( 'admin_menu', 'remove_meta_boxes' );
function remove_meta_boxes() {
    remove_meta_box( 'formatdiv', 'post', 'normal' ); // Post format meta box
}

// Remove Widgets do Wp-Admin
function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

//include new jQuery

function my_scripts_method() {
wp_deregister_script( 'jquery' );
wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'my_scripts_method');

// Custom login
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background:url('.get_bloginfo('stylesheet_directory').'/images/logo.png) no-repeat scroll center top !important; 
		height: 145px !important; width: 268px !important;  margin-top: -40px !important;  margin-left: 40px !important;
		overflow: hidden; padding-bottom: 0 !important;
		}
		body { background-image:url('.get_bloginfo('stylesheet_directory').'/images/bg.jpg) !important; }
		
    </style>';
}

add_action('login_head', 'my_custom_login_logo');


?>