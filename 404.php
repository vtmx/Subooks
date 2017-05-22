<?php get_header(); ?>

<header role="banner">
	<a id="logo" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png"></a>
	
	<div id="search">
		<?php get_search_form(); ?>
	</div>

	<nav role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
	</nav>
</header>

<main role="main">
	<h1 id="error-404">Página Não Encontrada</h1>
</main>

<?php get_footer(); ?>