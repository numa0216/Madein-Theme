</main>
<footer class="footer">
  <div class="footer__main" <?php if(is_home() || is_front_page()) echo 'style="display: none;"';?>>
    <div class="title">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo-white.svg'); ?>" alt="logo">
      <div class="address">
        <p class="address__text"><span>〒963-8601</span><br>福島県郡山市朝日１丁目２３−７</p>
      </div>
    </div>
    <div class="menu">
      <div class="menu__list">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'main-menu'
        ));
        ?>
      </div>
      <div class="menu__sns">
        <div class="icon">
          <a href="">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/Twitter-white.svg'; ?>" alt="">
          </a>
        </div>
        <div class="icon">
          <a href="">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/Instagram-white.svg'; ?>" alt="">
          </a>
        </div>
        <div class="icon">
          <a href="">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/youtube-white.svg'; ?>" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>

  <?php /* フロントページ用のフッター */ ?>
  <div class="front" <?php if(!is_home() && !is_front_page()) echo 'style="display: none;"';?> >
    <div class="icon">
      <a href="">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/Twitter-white.svg'; ?>" alt="">
      </a>
    </div>
    <div class="icon">
      <a href="">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/Instagram-white.svg'; ?>" alt="">
      </a>
      </a>
    </div>
    <div class="icon">
      <a href="">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/youtube-white.svg'; ?>" alt="">
      </a>
    </div>
    <div class="icon">
      <a href="/contact/">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/mail-white.svg'; ?>" alt="">
      </a>
    </div>
    <div class="icon">
      <a href="/news/">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/news-white.svg'; ?>" alt="">
      </a>
    </div>
  </div>

  <?php /* コピーライト */ ?>
  <?php $blog_info = get_bloginfo('name');
  if (!empty($blog_info)) : ?>
    <span class="copyright" <?php if(is_home() || is_front_page()) echo 'style="display: none;"';?>>
      Copyright © <?php echo date("Y") ?> <a class="site-name" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php echo esc_html($blog_info); ?></a> All Rights Reserved.
    </span>
  <?php endif; ?>

</footer>
<?php wp_footer(); ?>
</body>

</html>