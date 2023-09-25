<footer class="footer">
  <div class="mainFooter">
    <img src="<?php echo get_template_directory_uri() . '/assets/img/sample.webp'; ?>" alt="sample">
    <div class="address">
      <p class="address__text"><span>〒963-8601</span><br>福島県郡山市朝日１丁目２３−７</p>
    </div>
    <?php
    wp_nav_menu(array(
      'theme_location' => 'footer-menu'
    ));
    ?>
  </div>
  <div class="sns">
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
  </div>
  <div class="front" style="display: none;">
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
      <a href="">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/mail-white.svg'; ?>" alt="">
      </a>
    </div>
    <div class="icon">
      <a href="">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/news-white.svg'; ?>" alt="">
      </a>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>