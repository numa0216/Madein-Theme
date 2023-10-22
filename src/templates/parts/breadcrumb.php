<?php
if (is_front_page()) :
    return;
else : ?>
    <nav class="nav">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="nofollow">Home</a>
        <span>»</span>
        <?php if (is_category() || is_single()) : ?>
            <!-- the_category (' • '); -->
            <?php the_title(); ?>
        <?php elseif (is_page()) : ?>
            <?php the_title(); ?>
        <?php elseif (is_search()) : ?>
            <?php the_title(); ?>
        <?php elseif (is_post_type_archive('works')) : ?>
            Works
        <?php endif; ?>
    </nav>
<?php endif; ?>