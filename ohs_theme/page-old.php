<?php get_header(); ?>

<div class="row">
	<div class="main-heading m-5 col-12">
		<h1><?php the_title(); ?></h1>
	</div>

	<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

	<section>
	   <?php if (has_post_thumbnail()): ?>
			 <figure class="figure mx-2 p-2 border bg-light float-md-right">
				 <img src="<?php the_post_thumbnail_url( ); ?>" alt="" class="figure-img img-fluid border rounded" width="400">
				 <figcaption class="figure-caption text-center"><?php the_post_thumbnail_caption(); ?></figcaption>
			 </figure>
	   <?php endif; ?>
		<?php the_content(); ?>
	</section>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>

