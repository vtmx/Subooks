<section id="authors">
	<h1>Autor</h1>

	<ul id="authors-list">
		<?php
		$taxonomies = get_terms( 'autor' );
		foreach ($taxonomies as $taxonomy) {
			$taxonomy_link = get_term_link( $taxonomy, 'autor' );
			echo '<li><a href="'.$taxonomy_link.'">'.$taxonomy->name.'</a></li>';
		}
		?>
	</ul>

	<div id="index">
	<?php
		$alphabetic = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
		foreach($alphabetic as $letter) {
			echo '<div class="col">';
				echo '<h2>'.$letter.'</h2>';
				echo '<ul id="index-'.$letter.'"></ul>';
			echo '</div>';
		}
	?>
	</div> <!-- #index -->
</section>