<?php
get_header();
?>
<div class="singleContent">
  <?php
  if (have_posts()) : while (have_posts()) : the_post(); ?>

      <?php
          if (get_the_post_thumbnail_url()) {
            $thumbnail = get_the_post_thumbnail_url();
          } else {
            $thumbnail = get_template_directory_uri() . '/src/images/insight_default.png';
          }
          ?>

      <div class="singleHeader" style="background-image: linear-gradient(rgba(0,0,0,0) 35%, rgba(0, 0, 0, 0.9)), url('<?= $thumbnail ?>'), linear-gradient(white, white);">

        <h2><?= the_title(); ?></h2>
      </div>
      <?= the_content(); ?>

  <?php
    endwhile;
  endif;
  ?>
</div>
<?php
get_footer();
?>