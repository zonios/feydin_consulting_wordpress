<?php
function feydin_scripts()
{
  wp_enqueue_style("feydinStyle", get_bloginfo('template_directory') . "/src/css/feydinStyle.css");

  wp_enqueue_script("jquerymin",  get_bloginfo('template_directory') . "/src/js/jquery-3.4.1.min.js");
  wp_enqueue_script("script", get_bloginfo('template_directory') . "/src/js/script.js", ["jquerymin"]);
}
add_action("wp_enqueue_scripts", "feydin_scripts");

function register_my_menus()
{
  register_nav_menus(
    array(
      'main-menu' => __('Main menu')
    )
  );
}
add_action('init', 'register_my_menus');

function active_nav_class($classes)
{
  if (in_array('current-menu-item', $classes)) {
    $classes[] = 'active ';
  }
  return $classes;
}

add_filter('nav_menu_css_class', 'active_nav_class', 10, 1);