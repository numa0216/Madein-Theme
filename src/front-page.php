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
                    <?php if (!empty(get_option('toppage_url_1_img'))) : ?>
                        <img class="bgImg" src="<?php echo get_option('toppage_url_1_img'); ?>" alt="">
                    <?php elseif (!empty(get_option('toppage_url_1_text'))) : ?>
                        <span class="text"><?php echo get_option('toppage_url_1_text'); ?></span>
                        <span class="bg"></span>
                    <?php else : ?>
                        <span class="text">Ocean</span>
                        <span class="bg"></span>
                    <?php endif; ?>
                </span>
                <span class="bubble">
                    <?php if (!empty(get_option('toppage_url_2_img'))) : ?>
                        <img class="bgImg" src="<?php echo get_option('toppage_url_2_img'); ?>" alt="">
                    <?php elseif (!empty(get_option('toppage_url_2_text'))) : ?>
                        <span class="text"><?php echo get_option('toppage_url_2_text'); ?></span>
                        <span class="bg"></span>
                    <?php else : ?>
                        <span class="text">Organic</span>
                        <span class="bg"></span>
                    <?php endif; ?>
                </span>
                <span class="bubble">
                    <?php if (!empty(get_option('toppage_url_3_img'))) : ?>
                        <img class="bgImg" src="<?php echo get_option('toppage_url_3_img'); ?>" alt="">
                    <?php elseif (!empty(get_option('toppage_url_3_text'))) : ?>
                        <span class="text"><?php echo get_option('toppage_url_3_text'); ?></span>
                        <span class="bg"></span>
                    <?php else : ?>
                        <span class="text">Aroma</span>
                        <span class="bg"></span>
                    <?php endif; ?>
                </span>
                <span class="bubble">
                    <?php if (!empty(get_option('toppage_url_4_img'))) : ?>
                        <img class="bgImg" src="<?php echo get_option('toppage_url_4_img'); ?>" alt="">
                    <?php elseif (!empty(get_option('toppage_url_4_text'))) : ?>
                        <span class="text"><?php echo get_option('toppage_url_4_text'); ?></span>
                        <span class="bg"></span>
                    <?php else : ?>
                        <span class="text">Jazz</span>
                        <span class="bg"></span>
                    <?php endif; ?>
                </span>
                <span class="bubble">
                    <?php if (!empty(get_option('toppage_url_5_img'))) : ?>
                        <img class="bgImg" src="<?php echo get_option('toppage_url_5_img'); ?>" alt="">
                    <?php elseif (!empty(get_option('toppage_url_5_text'))) : ?>
                        <span class="text"><?php echo get_option('toppage_url_5_text'); ?></span>
                        <span class="bg"></span>
                    <?php else : ?>
                        <span class="text">Sun</span>
                        <span class="bg"></span>
                    <?php endif; ?>
                </span>
                <span class="bubble">
                    <?php if (!empty(get_option('toppage_url_6_img'))) : ?>
                        <img class="bgImg" src="<?php echo get_option('toppage_url_6_img'); ?>" alt="">
                    <?php elseif (!empty(get_option('toppage_url_6_text'))) : ?>
                        <span class="text"><?php echo get_option('toppage_url_6_text'); ?></span>
                        <span class="bg"></span>
                    <?php else : ?>
                        <span class="text">Relax</span>
                        <span class="bg"></span>
                    <?php endif; ?>
                </span>
                <span class="bubble">
                    <?php if (!empty(get_option('toppage_url_7_img'))) : ?>
                        <img class="bgImg" src="<?php echo get_option('toppage_url_7_img'); ?>" alt="">
                    <?php elseif (!empty(get_option('toppage_url_7_text'))) : ?>
                        <span class="text"><?php echo get_option('toppage_url_7_text'); ?></span>
                        <span class="bg"></span>
                    <?php else : ?>
                        <span class="text">Coffee</span>
                        <span class="bg"></span>
                    <?php endif; ?>
                </span>
                <span class="bubble">
                    <?php if (!empty(get_option('toppage_url_8_img'))) : ?>
                        <img class="bgImg" src="<?php echo get_option('toppage_url_8_img'); ?>" alt="">
                    <?php elseif (!empty(get_option('toppage_url_8_text'))) : ?>
                        <span class="text"><?php echo get_option('toppage_url_8_text'); ?></span>
                        <span class="bg"></span>
                    <?php else : ?>
                        <span class="text">Moon</span>
                        <span class="bg"></span>
                    <?php endif; ?>
                </span>
                <span class="bubble">
                    <?php if (!empty(get_option('toppage_url_9_img'))) : ?>
                        <img class="bgImg" src="<?php echo get_option('toppage_url_9_img'); ?>" alt="">
                    <?php elseif (!empty(get_option('toppage_url_9_text'))) : ?>
                        <span class="text"><?php echo get_option('toppage_url_9_text'); ?></span>
                        <span class="bg"></span>
                    <?php else : ?>
                        <span class="text">Retro</span>
                        <span class="bg"></span>
                    <?php endif; ?>
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