<?php

namespace App\Walkers;

use Walker_Nav_Menu;

class Copyright_Navigation_Walker extends Walker_Nav_Menu
{
  public function start_lvl( &$output, $depth = 0, $args = null ) {
    // Pas de sous-menu dans le footer
  }

  public function end_lvl( &$output, $depth = 0, $args = null ) {
    // Pas de sous-menu dans le footer
  }

  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    $output .= '<li class="flex items-start">';
    $output .= '<a href="' . esc_url($item->url) . '" class="relative text-neutral-600 text-start text-sm font-500 !no-underline hover:text-primary-600 transition-all duration-300 before:content-[\'\'] before:absolute before:bottom-0 before:left-0 before:h-[1px] before:w-0 before:bg-primary-600 before:transition-all before:duration-300 hover:before:w-full">';
    $output .= esc_html($item->title);
    $output .= '</a>';
  }

  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    $output .= '</li>';
  }
}
