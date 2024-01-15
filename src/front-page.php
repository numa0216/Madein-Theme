<?php get_header(); ?>

<div id="welcome" class="welcome">
    <a id="mainLogo" href="<?php echo esc_url(home_url('/')) ?>">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo-black.svg'); ?>" alt="logo">
    </a>
</div>
<div class="top">
    <div class="works">
        <a href="/works">
            <div class="random">
                <span class="bubble">
                    <span class="text"><?php echo get_option('toppage_url_1_text'); ?></span>
                    <img src="<?php echo get_option('toppage_url_1_img'); ?>" alt="">
                    <span class="bg"></span>
                </span>
                <span class="bubble">
                    <span class="text">Organic</span>
                    <span class="bg"></span>
                </span>
                <span class="bubble">
                    <span class="text">Aroma</span>
                    <span class="bg"></span>
                </span>
                <span class="bubble">
                    <span class="text">Jazz</span>
                    <span class="bg"></span>
                </span>
                <span class="bubble">
                    <span class="text">Sun</span>
                    <span class="bg"></span>
                </span>
                <span class="bubble">
                    <span class="text">Relax</span>
                    <span class="bg"></span>
                </span>
                <span class="bubble">
                    <span class="text">Coffee</span>
                    <span class="bg"></span>
                </span>
                <span class="bubble">
                    <span class="text">Moon</span>
                    <span class="bg"></span>
                </span>
                <span class="bubble">
                    <span class="text">Retro</span>
                    <span class="bg"></span>
                </span>
            </div>
            <p class="works__text">Works</p>
        </a>
    </div>
    <div class="yaji">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/arrow.svg'; ?>" alt="">
    </div>
    <div class="company">
        <a href="/concept/">
            <img class="company__img" src="<?php echo get_template_directory_uri() . '/assets/img/symbol-white.svg'; ?>" alt="">
            <img class="company__logo" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo-white.svg'); ?>" alt="logo">
        </a>
    </div>
    <!-- <span class="blur"></span>
    <span class="blur"></span> -->
</div>

<?php get_footer(); ?>