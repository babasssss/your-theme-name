<?php

namespace App\Walkers;

use Walker_Nav_Menu;

class Secondary_Navigation_Walker extends Walker_Nav_Menu
{
  public function start_lvl( &$output, $depth = 0, $args = null ) {
    // Pas de sous-menu ici
  }

  public function end_lvl( &$output, $depth = 0, $args = null ) {
    // Rien ici non plus
  }

  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    // Vérifie si c'est le dernier élément du menu
    $is_last_item = empty($item->menu_order) ? false : ($item->menu_order === $args->menu->count);

    $classes = 'group flex py-4 px-5 justify-center items-center rounded-xl !no-underline border transition-all duration-300 ease-in-out';

    // Modifier la couleur si c'est le dernier lien 
    $classes .= $is_last_item ? ' bg-primary-600 hover:bg-primary-800' : ' bg-neutral-0 border-primary-300 hover:border-primary-800';

    // Texte à l'intérieur
    $textClasses = 'py-0 px-2 flex justify-center items-center text-center text-sm font-bold leading-tight-126';
    $textClasses .= $is_last_item ? ' text-neutral-0' : ' text-primary-600';

    $output .= '<li>';
    $output .= '<a href="' . esc_url($item->url) . '" class="' . esc_attr($classes) . '">';
    $output .= '<div class="' . esc_attr($textClasses) . '">';
    $output .= esc_html($item->title);
    $output .= '</div>';
    $output .= '</a>';
    $output .= '</li>';
  }


  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    // Clôture de <li> déjà faite dans start_el
  }
}
