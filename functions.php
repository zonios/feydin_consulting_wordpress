<?php
function feydin_scripts()
{
  wp_enqueue_style("feydinStyle", get_bloginfo('template_directory') . "/src/css/feydinStyle.css");

  wp_enqueue_script("jquerymin",  get_bloginfo('template_directory') . "/src/js/jquery-3.4.1.min.js");
  wp_enqueue_script("script", get_bloginfo('template_directory') . "/src/js/script.js", ["jquerymin"]);
}
add_action("wp_enqueue_scripts", "feydin_scripts");