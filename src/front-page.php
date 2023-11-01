<?php get_header(); ?>

<div id="welcome" class="welcome">
    <a href="https://madein.works">
        <img id="mainLogo" src="../../../wp-content/uploads/2023/06/logo.svg" alt="メインロゴ">
    </a>
</div>
<div class="top">
    <div class="works">
        <a href="/works">
            <div class="random">
                <span class="bubble"></span>
                <span class="bubble"></span>
                <span class="bubble"></span>
                <span class="bubble"></span>
                <span class="bubble"></span>
                <span class="bubble"></span>
                <span class="bubble"></span>
                <span class="bubble"></span>
                <span class="bubble"></span>
                <span class="bubble"></span>
                <span class="bubble"></span>
            </div>
            <p class="works__text">Works</p>
        </a>
    </div>
    <div class="yaji">
        <img src="https://madein.works/wp-content/uploads/2023/06/矢印アイコン　下6.svg" alt="">
    </div>
    <div class="company">
        <a href="/company">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/symbol-white.svg'; ?>" alt="">
        <p class="company__text">Company</p>
        </a>
    </div>
</div>

<?php get_footer(); ?>