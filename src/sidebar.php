<aside class="sidebar">
    <?php $post_slug = get_query_var('post_type');
    $main_cat = get_object_taxonomies($post_slug, 'names')[0]; // カスタム投稿に関連付いているタクソノミーのスラッグを取得
    $args = array(
        'post_type' => $post_slug, //カスタム投稿タイプを指定
        'posts_per_page' => 3, //表示する記事数
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
    ?>
        <div class="box">
            <h3 class="box__title">新着記事</h3>
            <ul class="box__list">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php $string = wp_get_archives(array(
        'show_post_count' => 1,
        'echo' => 0
    )); ?>
    <?php if ($string !== false) : ?>
        <div class="box">
            <h3 class="box__title">月別</h3>
            <ul class="box_list">
                <?php
                $string = wp_get_archives(array(
                    'show_post_count' => 1,
                    'post_type' => $post_slug,
                    'echo' => 0
                ));
                echo preg_replace('/<\/a>&nbsp;(\([0-9]*\))/', ' <span class="count">$1</span></a>', $string);
                ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php
    $string = wp_list_categories(array(
        'taxonomy' => $main_cat,
        'show_count' => 1,
        'echo' => 0,
        'title_li' => ''
    ));
    ?>
    <?php if ($string !== false) : ?>
        <div class="box">
            <h3 class="box__title">カテゴリ</h3>
            <ul class="box__list">
                <?php echo preg_replace('/<\/a> (\([0-9]*\))/', ' <span class="count">$1</span></a>', $string); ?>
            </ul>
        </div>
    <?php endif; ?>
</aside>