<?php get_header(); ?>

	<!-- Main Body -->
	<article id="maincolumn">
		<?php

		// The Query

		$the_query = new WP_Query( 'post_type=post&posts_per_page=8' );

		// The Loop

		while ( $the_query->have_posts() ) : $the_query->the_post();

		echo '<li><a href="'; the_permalink(); echo'">';

		the_post_thumbnail();

		echo '</a></li>';

		endwhile;

		// Reset Post Data

		wp_reset_postdata();

		?>
	</article> <!-- end Main Body -->

	<!-- Sidebar -->
	<section id="sidebar">
		<header>
			<h2>Sideline</h2>
		</header>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <a href="#">laboris nisi ut aliquip</a> ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</section> <!-- end Sidebar -->
	
<?php get_footer(); ?>