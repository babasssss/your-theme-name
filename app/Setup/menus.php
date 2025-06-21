<?php

namespace App\Setup\Menus;

function register_menus() {
  register_nav_menus([
    'primary_navigation'   => __('Primary Navigation', 'e-formaliste'),
    'secondary_navigation' => __('Secondary navigation', 'e-formaliste'),
    'footer_navigation'    => __('Footer Navigation', 'e-formaliste'),
    'copyright_navigation' => __('Copyright Navigation', 'e-formaliste'),
    'social_navigation'    => __('Social Navigation', 'e-formaliste'),
  ]);
}
add_action('after_setup_theme', __NAMESPACE__ . '\\register_menus');
