<?php
get_header();
?>

<div class="videoTitle videoOurInsights">
  <h2>Your company deserves <br> a top performance</h2>
  <video autoplay muted loop>
    <source src="<?= get_template_directory_uri(); ?>/src/images/our_insight_video.mp4" type="video/mp4">
  </video>
</div>
<div class="mainContent insightsContent">


  <?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $args = [
    'posts_per_page' => '8',
    'post_type' => 'post',
    'paged' => $paged
  ];
  $posts_query = new WP_Query($args);
  while ($posts_query->have_posts()) : $posts_query->the_post();
    ?>

    <div class="postCard">
      <?php if (get_the_post_thumbnail_url()) : ?>
        <img src="<?= get_the_post_thumbnail_url(); ?>" alt="thumbnail for <?php the_title(); ?> " width="100%">
      <?php endif; ?>
      <p>
        <?php
          $categories = get_the_category();
          $catNumber = sizeof($categories);
          if ($catNumber) : for ($i = 0; $i < $catNumber; $i++) :
              ?>
            <span class="postCat"> <?= ($categories[$i]->name); ?> </span>
            <?php
              // if ($i + 1 < $catNumber) {
              //   echo "-";
              // }
            ?>
        <?php
            endfor;
          endif;
          ?>
      </p>
      <h3> <?php the_title(); ?> </h3>
      <p><span class="date"><?= get_the_date("F Y");?></span> - <?= get_the_excerpt(); ?> </p>
    </div>

  <?php
  endwhile;
  ?>

</div>
<?php
get_footer();
?>