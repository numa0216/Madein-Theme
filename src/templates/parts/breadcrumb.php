<?php
if (is_front_page()) :
    return;
else : ?>
    <nav class="nav">
        <div class="nav__wrap">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
            <span>»</span>
            <?php if (is_category() || is_single()) :
                $post_type = get_query_var('post_type');
                if ($post_type === "works") : ?>
                    <a href="<?php echo esc_url(home_url('/works/')); ?>">Works</a>
                <?php elseif ($post_type === "news") : ?>
                    <a href="<?php echo esc_url(home_url('/news/')); ?>">News</a>
                <?php endif; ?>
                <span>»</span>
                <!-- the_category (' • '); -->
                <?php the_title(); ?>
            <?php elseif (is_page()) : ?>
                <?php the_title(); ?>
            <?php elseif (is_search()) : ?>
                <?php the_title(); ?>
            <?php elseif (is_post_type_archive('works')) : ?>
                Works
            <?php elseif (is_post_type_archive('news')) : ?>
                News
            <?php endif; ?>
        </div>
    </nav>
<?php endif; ?>