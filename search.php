<?php get_header(); ?>

<?= get_search_form(); ?>

<p class="searchTitle">Search results for "<?= get_search_query(); ?>"</p>

<div class="mainContent insightsContent searchContent">

  <?php
  if (have_posts()) :
    while (have_posts()) : the_post();
      ?>

      <div class="postCard">
        <a href="<?= get_permalink(); ?>">
          <img <?php if (get_the_post_thumbnail_url()) {
                      echo ('src="' . get_the_post_thumbnail_url() . '"');
                    } else {
                      echo ('src="' . get_template_directory_uri() . '/src/images/insight_default.png"');
                    } ?>>
        </a>
        <p>
          <?php
              $categories = get_the_category();
              $catNumber = sizeof($categories);
              if ($catNumber) : for ($i = 0; $i < $catNumber; $i++) :
                  ?>
              <span class="postCat"> <?= ($categories[$i]->name); ?> </span>

          <?php
                endfor;
              endif;
              ?>
        </p>
        <?php
            $title = get_the_title();
            if (strlen($title) > 90) {
              $shortTitle = substr($title, 0, 87);
              $title = substr($shortTitle, 0, strrpos($shortTitle, " ")) . "...";
            }
            ?>
        <h3> <a href="<?= get_permalink(); ?>" title="<?= the_title_attribute(); ?>"> <?= $title ?> </a> </h3>
        <!-- <p>
        <span class="date"><?= get_the_date("F Y"); ?></span>
        <br>
        <a href="<?= get_permalink(); ?>"> <?= __("Read more") ?> </a>
      </p> -->
      </div>

  <?php
    endwhile;
  else: ?> 
  <p class="noResults"><?= __("No Results") ?></p>
  <?php
  endif;
  wp_reset_query();
  ?>
  <div class="pagination">
    <?=
      paginate_links(array(
        'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
        'current'      => max(1, get_query_var('paged')),
        'end_size'     => 2,
        'mid_size'     => 2,
        'total'        => $wp_query->max_num_pages,
        'prev_text'    => __('Newer Insights'),
        'next_text'    => __('Older Insights')
      ));
    ?>
  </div>
</div>

<?php get_footer(); ?>