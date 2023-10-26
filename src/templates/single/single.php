<?php /*  フォールバック用 */ ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h1><?php the_title(); ?></h1>

    <?php if(has_post_thumbnail()): ?>
    <div>
        <img src="<?php the_post_thumbnail_url('large'); ?>">
    </div>
    <?php endif; ?>

    <div>
        <div><?php the_content(); ?></div>
    </div>

<?php endwhile; endif; ?>