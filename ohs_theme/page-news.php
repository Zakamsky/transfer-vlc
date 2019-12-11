<?php get_header(); ?>

<div class="row">
	<div class="col-12 main-heading my-5">
		<h1><?php the_title(); ?></h1>
	</div>



		  <?php foreach( get_posts(array( 'numberposts' => -1)) as $news ): ?>

			<div class="col-md-6 pb-3">
				<div class="card bg-custom text-white text-center border-0 mb-3">
					<!--<img src="<?php
/*					if (!get_the_post_thumbnail_url( $news->ID )) echo OHS_IMG_DIR.'/moon.png';
					echo get_the_post_thumbnail_url( $news->ID ); */?>" alt="card-image" class="card-image img-fluid">-->
					<div class="img card-image w-100 h-100" style=" background-image: url(
					<?php if (!get_the_post_thumbnail_url( $news->ID )) echo OHS_IMG_DIR.'/card.png'; echo get_the_post_thumbnail_url( $news->ID ); ?>); background-size: cover; background-position: center;"></div>
					<div class="card-img-overlay rounded">
						<div class="card-body">
							<!--					<h4 class="card-title">Специальный заголовок</h4>-->
							<h3 class="card-title text-white"><a class="text-light" href="<?php the_permalink($news) ?>"><?php echo $news->post_title; ?></a></h3>

							<p class="card-text"><?php echo wp_trim_words( $news->post_content, 20, '...' ); ?></p>
							<a href="<?php the_permalink($news) ?>" class="btn btn-outline-light">Читать полностью</a>
						</div>
					</div>
				</div>
			</div>
			 <?php endforeach; ?>



</div>

<?php get_footer(); ?>

