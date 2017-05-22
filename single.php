<?php get_header(); ?>

	<?php
		// Get taxonomy = autores
		$taxonomies = get_the_terms($post->id, 'autor');
		// Check if author exist and list all for get
		if ($taxonomies) { foreach($taxonomies as $taxonomy) { } }
	?>

<aside>
	<?php the_post_thumbnail('medium'); ?>
	<a class="download" href="<?php echo types_render_field( 'book-download', array() ); ?>" target="_blank">Download</a>
	<!--
	Google Driver
	<a class="download" href="<?php echo types_render_field( 'book-download-2', array() ); ?>" target="_blank">Download</a>
	Subooks
	<a class="download" href="<?php echo types_render_field( 'book-download-3', array() ); ?>" target="_blank">Download</a>
	-->
</aside>

<?php while( have_posts() ) : the_post(); ?>
<main id="synopsis">
	<h1 id="book-name"><?php the_title(); ?></h1>
	<h2 id="book-author"><?php echo $taxonomy->name; ?></span></h2>
	<?php the_content(); ?>
</main>
<?php endwhile; ?>

<?php get_footer(); ?>
