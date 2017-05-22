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
	<?php if( have_posts() ){ ?>			
	<h1 id="search-result">
	<?php 
		$allsearch = new WP_Query(); 
		$allsearch -> query(array( 's' => $s, 'showposts' => '-1', 'posts_per_page' => 3 ));
		$key = wp_specialchars($s, 1); 
		$count = $allsearch->post_count; 
		echo( 'Encontrado(s) '.$count. ' livro(s) com a palavra: <span>'.$key.'</span>' ); 
		wp_reset_query(); 
	?>
	</h1>
	
	<div id="books">
		<?php while( have_posts() ) : the_post(); ?>
		<a class="book <?php echo $taxonomy->slug; ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo $taxonomy->name; ?>">
			<?php the_post_thumbnail(); ?>
		</a>
		<?php endwhile; ?>	
	</div>

	<?php  } else { ?>

	<h1 id="search-result">
		<span id="search-smille">:(</span>&nbsp; &nbsp; &nbsp;Nenhum resultado encontrado, tente outra palavra.</h1>
	</h1>	
	<?php } ?>
</main>

<?php get_footer(); ?>