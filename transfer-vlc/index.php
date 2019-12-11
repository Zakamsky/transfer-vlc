<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="main-heading my-5 col-12">
                <h1><?php the_title(); ?></h1>
            </div>

            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <article class="col-12 mb-5 pb-5">
                    <?php if (has_post_thumbnail()): ?>
                        <figure class="figure m-md-3 p-2 border bg-light float-md-right mx-auto">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt=""
                                 class="figure-img img-fluid border rounded" width="400">
                            <figcaption
                                    class="figure-caption text-center"><?php the_post_thumbnail_caption(); ?></figcaption>
                        </figure>
                    <?php endif; ?>

                    <?php the_content(); ?>
                </article>
            <?php endwhile; endif; ?>
        </div>
    </div>
<?php get_footer(); ?>