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
		<li><a class="date active" data-filter="*" href="#">Data</a></li>
		<li><a class="author" href="#">Autores</a></li>
	</ul>

	<?php get_template_part('authors'); ?>

	<div id="books">
		<?php
			// Create custom query
			$query_books = new WP_Query( array( 'showposts' => 32, 'post_type' => 'livros', 'paged' => $paged ) );

			// Looop
			while ( $query_books->have_posts() ) : $query_books->the_post();

			// Get taxonomy = author
			$taxonomies = get_the_terms($post->id, 'autores');

			// Check if author exist
			if ($taxonomies) { foreach($taxonomies as $taxonomy) { } }
		?>
			<a class="book <?php echo $taxonomy->slug; ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" <?php echo $taxonomy->name; ?>">
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
