<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="author" content="Sterio Zonios">
  <title><?php echo get_bloginfo( 'name' ); ?></title>
  <?php wp_head(); ?>
</head>

<body>

  <nav class="mainNav">
    <span href="" class="navLogo"></span>
    <?php
      wp_nav_menu([
        'menu_class' => '',
        'items_wrap' => '<div>%3$s</div>',
        'theme_location' => 'main-menu',
        'container' => ''
      ]);
    ?>
    <!-- <div>
      <a href="">Overview</a>
      <a href="">Your Strategy</a>
      <a href="">Sales Performance</a>
      <a href="">Our Insights</a>
      <a href="">Contact Us</a>
    </div> -->
  </nav>

  <div id="main">

