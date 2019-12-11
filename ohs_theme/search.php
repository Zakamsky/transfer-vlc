
<?php get_header(); ?>
<div class="row">
	<div class="col-12">
		<Header class="main-heading">
			<h1 class="display-4 text-center my-4">Поиск</h1>
		</Header>
		<section>
			<h2><?php printf( __( 'Результаты поиска по запросу: %s', 'ohs' ), get_search_query() ); ?></h2>

		  <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
				 <h3><a class="text-secondary" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				 <p><?php the_excerpt(); ?></p>
		  <?php endwhile; else: ?>
				 <p><?php echo __( 'Извините, ничего не найдено', 'ohs' ); ?></p>
		  <?php endif; ?>
		</section>
	</div>
</div>
<?php get_footer(); ?>