<?php
get_header();
?>

<div class="main">
<?php
if (have_posts()) : while (have_posts()) : the_post();
?>
  <h1><?= the_title(); ?></h1>
  <div><?= the_content(); ?></div>

<?php
  endwhile;
endif;
?>

</div>

<?php
get_footer();
?>