<?php get_header(); ?>
<div class="wrapper">
  <div class="container">
    <h1 class="container__title"><span>施工事例</span></h1>
    <p class="container__subtitle">Works</p>
    <div class="grid">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <article class="card">
            <a href="<?php the_permalink(); ?>">
              <div>
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('large'); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/no-image.svg" alt="デフォルト画像" />
                <?php endif; ?>
                <h2 class="card__title"><?php the_title(); ?></h2>
              </div>
            </a>
          </article>
      <?php endwhile;
			else : ?>
				<p>投稿が見つかりませんでした。</p>
			<?php endif; ?>
    </div>
    <?php
    the_posts_pagination(
      array(
        'mid_size' => 3,
        'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
        'prev_text' => '<',
        'next_text' => '>',
      )
    );
    wp_reset_query(); ?>
  </div>
  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>