<div class="wrapper">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <img class="card__img-dummy" src="<?php echo get_template_directory_uri(); ?>/assets/img/dammy.png" alt="">
                <h1><?php the_title(); ?></h1>
        <?php endwhile;
        endif;
        ?>
    </div>
    <?php get_sidebar(); ?>
</div>