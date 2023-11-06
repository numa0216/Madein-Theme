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
        'main_script',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        'false',
        'false'
    );

    if (is_front_page() || is_home()) {
        wp_enqueue_script(
            'top_script',
            get_template_directory_uri() . '/assets/js/top.js',
            array(),
            'false',
            'false'
        );
    } elseif (is_page('flow')) {
        wp_enqueue_script(
            'flow_script',
            get_template_directory_uri() . '/assets/js/flow.js',
            array(),
            'false',
            'false'
        );
    } elseif (is_archive() || is_singular()) {
        wp_enqueue_script(
            'archive_script',
            get_template_directory_uri() . '/assets/js/archive.js',
            array(),
            'false',
            'false'
        );
    }

    wp_enqueue_style(
        'main',
        get_template_directory_uri() . '/style.css',
        "",
        '20160608'
    );
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js', array(), '3.11.5', false);
    wp_enqueue_script('scrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js', array(), '3.11.5', false);
    wp_enqueue_script('split-type', 'https://unpkg.com/split-type', array(), '0.3.4', false);
});
