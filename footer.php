    <?php
    wp_reset_query();
    ?>
    </div>
    <footer class="mainFooter">
      <div class="footerTabs">
        <div>
          <h2>Sitemap</h2>
          <?php
          wp_nav_menu([
            'menu_class' => '',
            'items_wrap' => '%3$s',
            'theme_location' => 'sitemap',
            'container' => ''
          ]);
          ?>
        </div>
        <div>
          <h2>Latest Insights</h2>
          <?php

          $args = [
            'posts_per_page' => '4',
            'post_type' => 'post'
          ];
          $posts_query = new WP_Query($args);
          while ($posts_query->have_posts()) : $posts_query->the_post();

            $title = get_the_title();
            if (strlen($title) > 100) {
              $shortTitle = substr($title, 0, 97);
              $title = substr($shortTitle, 0, strrpos($shortTitle, " ")) . "...";
            }
            ?>
            <p><a href="<?= get_permalink(); ?>" title="<?= the_title_attribute(); ?>"><?= $title ?></a></p>
          <?php
          endwhile;
          wp_reset_query();
          ?>

        </div>
        <div>
          <h2>Contact us</h2>
          <p>
            <?= nl2br(get_theme_mod("setting_feydin_contact")); ?>
          </p>
        </div>
      </div>
      <p>© FEYDIN MANAGEMENT CONSULTING</p>
      <p style="text-align:right; color:grey;"> Developped by <a href="https://www.linkedin.com/in/sterio-zonios/"> Sterio ZONIOS</a></p>
    </footer>
    <?php wp_footer(); ?>
    </body>

    </html>