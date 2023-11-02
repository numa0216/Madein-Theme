<?php get_header(); ?>
<div class="wrapper">
    <div class="container">
        <h1 class="container__title"><span>お知らせ</span></h1>
        <p class="container__subtitle">News</p>
        <div class="news">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article class="post">
                        <a class="box" href="<?php the_permalink(); ?>">
                            <p class="text">
                                <span class="text__time"><?php echo esc_html(get_the_date()); ?></span>
                                <span class="text__content"><?php echo esc_html($term[0]->name); ?></span>
                                <span class="text__title"><?php the_title(); ?></span>
                            </p>
                        </a>
                    </article>
                <?php endwhile;
            else : ?>
                <p>投稿が見つかりませんでした。</p>
            <?php endif; ?>
        </div>
        <?php
        the_posts_pagination(
            array(
                'mid_size' => 2,
                'prev_text' => '<',
                'next_text' => '>',
            )
        );
        wp_reset_query(); ?>
    </div>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>