<?php

add_theme_support('post-thumbnails', array('post'));

function register_my_menus()
{
  register_nav_menus(
    array(
      'main-menu' => __('Main menu'),
      'sitemap' => __('Sitemap')
    )
  );
}
add_action('init', 'register_my_menus');


function feydin_scripts()
{
  wp_enqueue_style("feydinStyle", get_bloginfo('template_directory') . "/src/css/feydinStyle.css");

  wp_enqueue_script("jquerymin",  get_bloginfo('template_directory') . "/src/js/jquery-3.4.1.min.js");
  wp_enqueue_script("script", get_bloginfo('template_directory') . "/src/js/script.js", ["jquerymin"]);
}
add_action("wp_enqueue_scripts", "feydin_scripts");


function active_nav_class($classes)
{
  if (in_array('current-menu-item', $classes)) {
    $classes[] = 'active ';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'active_nav_class', 10, 1);


function search_filter($query)
{
  if ($query->is_search) {
    $query->set('post_type', 'post');
    $query->set('paged', (get_query_var('paged')) ? get_query_var('paged') : 1);
    $query->set('posts_per_page', 12);
  }
  return $query;
}
add_filter('pre_get_posts', 'search_filter');

function customizer_feydin($wp_customize)
{
  $wp_customize->add_panel('panel_main_custom', [
    'title' => __('Overall customisation'),
    'description' => __('Where you can customize most little things')
  ]);

  $wp_customize->add_section('section_feydin_general', [
    'panel' => 'panel_main_custom',
    'title' => __('General info'),
    'description' => __('')
  ]);

  $wp_customize->add_setting('setting_feydin_contact', [
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_textarea_field'
  ]);

  $wp_customize->add_control('control_feydin_contact', [
    'type' => 'textarea',
    'description' => 'The contact informations of Feydin',
    'section' => 'section_feydin_general',
    'settings' => 'setting_feydin_contact'
  ]);

  // Video title customisers
  $wp_customize->add_section('section_feydin_video_captions', [
    'panel' => 'panel_main_custom',
    'title' => __('Main pages video captions'),
    'description' => __('')
  ]);

  $wp_customize->add_setting('setting_feydin_caption_overview', [
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_textarea_field'
  ]);

  $wp_customize->add_control('control_feydin_caption_overview', [
    'type' => 'textarea',
    'description' => 'The caption over the video of the "Overview" page',
    'section' => 'section_feydin_video_captions',
    'settings' => 'setting_feydin_caption_overview'
  ]);

  $wp_customize->add_setting('setting_feydin_caption_your_strategy', [
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_textarea_field'
  ]);

  $wp_customize->add_control('control_feydin_caption_your_strategy', [
    'type' => 'textarea',
    'description' => 'The caption over the video of the "Your Strategy" page',
    'section' => 'section_feydin_video_captions',
    'settings' => 'setting_feydin_caption_your_strategy'
  ]);

  $wp_customize->add_setting('setting_feydin_caption_sales_performance', [
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_textarea_field'
  ]);

  $wp_customize->add_control('control_feydin_caption_sales_performance', [
    'type' => 'textarea',
    'description' => 'The caption over the video of the "Sales Performance" page',
    'section' => 'section_feydin_video_captions',
    'settings' => 'setting_feydin_caption_sales_performance'
  ]);

  $wp_customize->add_setting('setting_feydin_caption_our_insights', [
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_textarea_field'
  ]);

  $wp_customize->add_control('control_feydin_caption_our_insights', [
    'type' => 'textarea',
    'description' => 'The caption over the video of the "Our Insights" page',
    'section' => 'section_feydin_video_captions',
    'settings' => 'setting_feydin_caption_our_insights'
  ]);
}
add_action('customize_register', 'customizer_feydin');
