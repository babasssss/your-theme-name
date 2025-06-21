<?php

namespace App\Walkers;

use Walker_Nav_Menu;

class Primary_Navigation_Walker extends Walker_Nav_Menu
{
  public function start_lvl( &$output, $depth = 0, $args = null ) {
    if ($depth === 0) {
      // Premier niveau : dropdown sous le menu principal
      $output .= '<ul class="absolute left-0 top-12 z-30 hidden group-hover:block pointer-events-auto flex-col items-start gap-0 rounded-xl border border-neutral-400 bg-neutral-0 max-w-96 w-max sub-menu-box-shadow">';
    } else {
      // Sous-sous-menu : dropdown à droite du lien parent
      $output .= '<ul class="absolute left- top-0 z-30 hidden peer-hover:block peer-focus:block pointer-events-auto flex-col items-start gap-0 rounded-xl border border-neutral-400 bg-neutral-0 max-w-96 w-max sub-menu-box-shadow">';
    }
  }

  public function end_lvl( &$output, $depth = 0, $args = null ) {
    $output .= '</ul>';
  }

  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    $has_children = in_array('menu-item-has-children', $item->classes);

    if ($depth === 0) {
      $li_class = 'relative group z-10 h-full';
      $output .= '<li class="' . esc_attr($li_class) . '">';

      // Lien invisible mais cliquable partout
      $output .= '<a href="' . esc_url($item->url) . '" class="absolute inset-0 z-10 block !no-underline" aria-label="' . esc_attr($item->title) . '"></a>';

      // Contenu visuel par-dessus
      $content_class = 'h-full my-4 inline-flex items-center text-center cursor-pointer text-base gap-2 text-neutral-800 group-hover:text-primary-600 transition-all duration-300 ease-in-out font-medium font-dm-sans leading-tight-122 relative z-20 overflow-hidden';

      if (!$has_children) {
        $content_class .= ' before:content-[""] before:absolute before:bottom-0 before:left-0 before:h-[1px] before:w-0 before:bg-primary-600 before:transition-all before:duration-300 group-hover:before:w-full';
      }

      $output .= '<div class="' . esc_attr($content_class) . '">';
      $output .= esc_html($item->title);

      if ($has_children) {
        $svg_path = get_theme_file_path('resources/icons/chevron-down.svg');
        if (file_exists($svg_path)) {
          $svg = file_get_contents($svg_path);
          $svg = preg_replace('/<svg /', '<svg class="h-4 w-4 text-neutral-800 transition-transform group-hover:rotate-180 group-hover:text-primary-600 ml-1"', $svg, 1);
          $output .= $svg;
        }
      }

      $output .= '</div>'; // fin div.z-20

    } else {
      // Sous-niveau
      $li_class = 'relative flex w-full items-center';
      $output .= '<li class="' . esc_attr($li_class) . '">';

      $output .= '<div class="relative w-full border-b border-neutral-300 group">';
      
      $output .= '<a href="' . esc_url($item->url) . '" class="peer flex items-center gap-1 break-words py-5 px-6 text-start text-base font-normal text-neutral-700 leading-tight-122 !no-underline z-10 relative before:absolute before:inset-0 before:z-0 before:pointer-events-none hover:bg-primary-100" style="width: inherit;">';
      $output .= esc_html($item->title);

      if ($has_children) {
        $svg_path = get_theme_file_path('resources/icons/chevron-down.svg');
        if (file_exists($svg_path)) {
          $svg = file_get_contents($svg_path);
          $svg = preg_replace(
            '/<svg /',
            '<svg class="h-4 w-4 menu-hover-move text-neutral-700 pointer-events-none flex-shrink-0 ml-1"',
            $svg,
            1
          );
          $output .= $svg;
        }
      }

      $output .= '</a>';
    }
  }

  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    if ($depth > 0) {
      $output .= '</div>'; // fermeture du wrapper du <a>
    }
    $output .= '</li>';
  }
}

