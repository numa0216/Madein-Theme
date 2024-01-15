<?php $post_type = get_query_var('post_type'); ?>
<div class="wrapper">
    <div class="single">
        <p class="single__subtitle">News</p>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="single__img">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large') ?>
                    <?php endif; ?>
                </div>
                <h1 class="single__title"><span><?php the_title(); ?></span></h1>
                <div class="single__content"><?php the_content(); ?></div>
                <span class="single__time"><?php echo esc_html(get_the_date()); ?></span>
        <?php endwhile;
        endif;
        ?>
        <a class="single__archive" href="<?php echo esc_url(home_url('/' . $post_type . '/')); ?>">一覧へ戻る</a>
    </div>
    <?php get_sidebar(); ?>
</div>