<?php get_header(); ?>

	
		<?php if ( have_posts() ) : ?>

				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			

			<?php while ( have_posts() ) : the_post(); ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php
			
			the_content( );

			
		?>
		
				
			<?php endwhile;

			

		endif;
		?>

<?php get_footer(); ?>
