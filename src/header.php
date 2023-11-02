<!DOCTYPE html>
<html lang="ja">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital,wght@0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Noto+Serif+JP:wght@200;300;400;500;600;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <h1 class="title">MADEIN</h1>
        <a href="<?php echo esc_url(home_url('/')) ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo-white.svg'); ?>" alt="logo">
        </a>
        <div id="modalMenu" class="mainMenu">
            <button type="button" class="btn" @click="show = !show; show === true ? gsapOn() : gsapOff();">
                <span class="btn-line" v-bind:class="{'open': show, '': !show}"></span>
            </button>
                <div id="menuBtnJs" class="mainMenu__block">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu'
                    ));
                    ?>
                </div>
        </div>
        <span class="bg"></span>
    </header>

    <?php get_template_part('templates/parts/breadcrumb'); ?>
<main class="main">
