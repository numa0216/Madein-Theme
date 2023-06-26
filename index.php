<?php get_header(); ?>
<div class="wrapper">
  <h1 class="wrapper__title"><span>施工事例</span></h1>
  <p class="wrapper__subtitle">Works</p>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="card">
        <a href="<?php the_permalink(); ?>">
          <div>
            <img class="card__img-dummy" src="<?php echo get_template_directory_uri(); ?>/assets/img/dammy.png" alt="">
            <h2 class="card__title"><?php the_title(); ?></h2>
          </div>
        </a>
      </div>
  <?php endwhile;
  endif;
  wp_reset_query(); ?>

</div>
<?php get_footer(); ?>