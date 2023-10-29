<div class="wrapper">
    <div class="single">
        <p class="single__subtitle">Works</p>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <img class="single__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/dammy.png" alt="">
                <h1 class="single__title"><span><?php the_title(); ?></span></h1>
                <div class="single__content"><?php the_content(); ?></div>
        <?php endwhile;
        endif;
        ?>
    </div>
    <?php get_sidebar(); ?>
</div>