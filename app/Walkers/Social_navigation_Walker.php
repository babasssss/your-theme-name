<?php

namespace App\Walkers;

use Walker_Nav_Menu;

class Social_navigation_Walker extends Walker_Nav_Menu
{
  public function start_lvl( &$output, $depth = 0, $args = null ) {}

  public function end_lvl( &$output, $depth = 0, $args = null ) {}

  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    $classes = empty($item->classes) ? [] : (array) $item->classes;
    $class_names = implode(' ', array_filter($classes));

    $output .= '<li class="w-min m-0 p-0 '. esc_attr($class_names) . '">';
    $output .= '<a href="' . esc_url($item->url) . '" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center w-min h-full p-2 border-1 border-primary-600 bg-primary-600 hover:bg-neutral-0 transition-all duration-300 rounded-full !no-underline" aria-label="' . esc_attr($item->title) . '">';
    $output .= '<span class="test">' . esc_html($item->title) . '</span>';
    $output .= '</a>';
  }


  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    $output .= '</li>';
  }
}
