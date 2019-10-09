<?php
get_header();
?>
<div class="mainContent">
  <?php
  if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h2><?= the_title(); ?></h2>
      <?= the_content(); ?>

  <?php
    endwhile;
  endif;
  ?>
</div>
<?php
get_footer();
?>