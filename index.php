<?php get_header(); ?>
<div class="card">
  <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <a href="<?php the_permalink(); ?>">
      <div>
        <h2 class="card__title"><?php the_title(); ?></h2>
        <p class="card__excerpt"><?php echo get_the_excerpt(); ?></p>
        <time class="card__time"><?php the_time('Y.m.d'); ?></time>
      </div>

      <?php
        if(has_post_thumbnail()):
          the_post_thumbnail();
        else:
      ?>
        <img class="card__img-dummy" src="<?php echo get_template_directory_uri(); ?>/img/dammy.png" alt="">
      <?php endif; ?>

      <p class="card__category">
        <?php
          $categories = get_the_category();
          if ( $categories ) {
            echo $categories[0]->name;
            }
        ?>
      </p>
    </a>
  <?php endwhile;endif; wp_reset_query(); ?>
</div>
<?php get_footer(); ?>