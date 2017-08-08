<?php

// Custom FavIcon
function admin_favicon() {
	echo '<link rel="shortcut icon" href="'. get_template_directory_uri() .'/favicon-admin.png">';
}
add_action('admin_head', 'admin_favicon');



// Custom Login Logo
function custom_login_logo() {
	echo '<style type="text/css"> h1 a { width: auto !important; background-image:url('. get_template_directory_uri() .'/img/logo-admin.png) !important; background-size: auto auto !important; } </style>';
}
add_action('login_head', 'custom_login_logo');



// Custom Footer
function custom_admin_footer() {
	echo 'Um presente do seu mozinho <a href="http://vitormelo.com.br/" title="Visite o site!">Vitor Melo</a>.';
}
add_filter('admin_footer_text', 'custom_admin_footer');



// Register Menu
function register_my_menu() {
  register_nav_menu('header-menu', 'Menu Cabeçalho');
}
add_action( 'init', 'register_my_menu' );


add_theme_support( 'title-tag' );

?>
