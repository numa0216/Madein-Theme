<?php

add_action('after_setup_theme', function () {
    register_nav_menus(array( //複数のナビゲーションメニューを登録する関数
        //'「メニューの位置」の識別子' => 'メニューの説明の文字列',
        'main-menu' => 'Main Menu',
        'footer-menu'  => 'Footer Menu',
    ));
});

add_action('wp_enqueue_scripts',   function () {
    wp_enqueue_script(
        'custom_script',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        'false',
        'false'
    );
    wp_enqueue_style(
        'main',
        get_template_directory_uri() . '/style.css',
        "",
        '20160608'
    );
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js', array(), '3.11.5', false);
    wp_enqueue_script('scrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js', array(), '3.11.5', false);
});

// パンくずリストの作成
function get_breadcrumb()
{
    if (is_front_page()) :
        return;
        else : ?>
        <nav class="nav">
            <a href="<?php home_url(); ?>" rel="nofollow">HOME</a>
            <span>»</span>
            <?php if (is_category() || is_single()) : ?>
                <!-- the_category (' • '); -->
                <?php the_title(); ?>
            <?php elseif (is_page()) : ?>
                <?php the_title(); ?>
            <?php elseif (is_search()) : ?>
                <?php the_title(); ?>
            <?php endif; ?>
        </nav>
    <?php endif; ?>
<?php }
