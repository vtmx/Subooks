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

	<ul id="books-filter">
		<li><a class="active" href="<?php bloginfo('url'); ?>">Data</a></li>
		<li><a class="author" href="#">Autores</a></li>
	</ul>

	<?php get_template_part('authors'); ?>

	<?php
		// Get taxonomy = autores
		$taxonomies = get_the_terms($post->id, 'autor');

		// Check if author exist and list all for get
		if ($taxonomies) { foreach($taxonomies as $taxonomy) { } }
	?>

	<div id="author-filtrated">
		Autor(a): <span class="author"><?php echo $taxonomy->name; ?></span>
	</div>

	<div id="books">
		<?php while ( have_posts() ) : the_post(); ?>
			<a class="book <?php echo $taxonomy->slug; ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo $taxonomy->name; ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		<?php endwhile; ?>
	</div>

	<div id="pagination">
		<?php previous_posts_link('« Página anterior'); ?>
		<?php next_posts_link('Próxima página »'); ?>
	</div>
</main>

<?php get_footer(); ?>