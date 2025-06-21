<?php

namespace App\Walkers;

use Walker_Nav_Menu;

class Footer_Navigation_Walker extends Walker_Nav_Menu
{
  public function start_lvl( &$output, $depth = 0, $args = null ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"flex flex-col gap-3 items-start justify-center min-w-(--min-w-160)\">\n";
  }

  public function end_lvl( &$output, $depth = 0, $args = null ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    $indent = str_repeat("\t", $depth);
    $classes = implode(' ', array_filter($item->classes));
    $classes = esc_attr($classes);

    $link_classes = 'text-base text-neutral-900 font-bold !no-underline';
    if ($depth > 0) {
      $link_classes .= " relative !text-neutral-600 !font-medium hover:!text-primary-600 transition-all duration-300 before:content-[''] before:absolute before:bottom-0 before:left-0 before:h-[1px] before:w-0 before:bg-primary-600 before:transition-all before:duration-300 hover:before:w-full";
    }

    $output .= "$indent<li class=\"flex flex-col gap-5 w-auto $classes\">";
    if ($depth > 0) {
      $output .= '<a href="' . esc_url($item->url) . '" class="' . $link_classes . '">';
    } else {
      $output .= '<p class="' . $link_classes . '">';
    }
    $output .= esc_html($item->title);
    if ($depth > 0) {
      $output .= '</a>';
    } else {
      $output .= '</p>';
    }

  }

  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    $output .= "</li>\n";
  }
}
