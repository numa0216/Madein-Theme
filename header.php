<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <h1 class="title">タイトル</h1>
        <div class="mainMenu">
            <button type="button" id="menuBtn" class="close">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <div id="menuBtnJs" class="mainMenu__block">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu'
                ));
                ?>
            </div>
        </div>
    </header>