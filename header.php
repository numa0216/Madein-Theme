<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <h1 class="title">MADEIN</h1>
        <a href="https://madein.works">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/logo-white.svg'; ?>" alt="logo">
        </a>
        <div id="modalMenu" class="mainMenu">
            <button type="button" class="btn" @click="show = !show">
                <span class="btn-line" v-bind:class="{'open': show, '': !show}"></span>
            </button>
            <transition name="modal">
                <div id="menuBtnJs" class="mainMenu__block" v-show="show" style="display: none">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu'
                    ));
                    ?>
                </div>
            </transition>
        </div>
    </header>