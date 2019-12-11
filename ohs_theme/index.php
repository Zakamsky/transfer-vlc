<?php get_header(); ?>

<div class="row">
	<div class="main-heading my-md-5 my-4 col-12">
		<h1><?php the_title(); ?></h1>
	</div>

	<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
		<section class="col-12">
			<?php if (has_post_thumbnail()): ?>
		 <figure class="figure m-md-3 p-2 border bg-light float-md-right mx-auto">
			 <img src="<?php the_post_thumbnail_url( ); ?>" alt="" class="figure-img img-fluid border rounded" width="400">
			 <figcaption class="figure-caption text-center"><?php the_post_thumbnail_caption(); ?></figcaption>
		 </figure>
			<?php endif; ?>

		   <?php the_content(); ?>
		 </section>
	<?php endwhile; endif; ?>
</div>

</div>
<?php get_footer(); ?>