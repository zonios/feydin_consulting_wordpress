<?php
get_header();
?>

<div class="videoTitle videoYourStrategy">
  <h2>Your business needs a powerful strategy</h2>
  <video autoplay muted loop>
    <source src="<?= get_template_directory_uri(); ?>/src/images/your_strategy_video.mp4" type="video/mp4">
  </video>
</div>
<div class="mainContent">
  <?php
  if (have_posts()) : while (have_posts()) : the_post();
      the_content(); 
    endwhile;
  endif;
  ?>
</div>
<?php
get_footer();
?>