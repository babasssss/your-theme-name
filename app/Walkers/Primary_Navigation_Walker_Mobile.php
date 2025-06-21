<?php

namespace App\Walkers;

use Walker_Nav_Menu;

class Primary_Navigation_Walker_Mobile extends Walker_Nav_Menu
{

    public function start_lvl( &$output, $depth = 0, $args = null ) {
    if ($depth === 0) {
        $output .= '<ul class="w-full flex flex-col items-start self-stretch" x-show="open" @click.outside="open = false" x-transition>';
    } else {
        $output .= '<ul class="w-full flex flex-col items-start self-stretch">';
    }
}


    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    $has_children = in_array('menu-item-has-children', $item->classes);

    $li_classes = 'flex p-0 m-0 items-center self-stretch border-b border-neutral-200 flex-[1_0_0]';
    if ($has_children) {
        $li_classes .= ' flex-col';
    }

    // Alpine wrapper si élément parent
    if ($has_children && $depth === 0) {
        $output .= '<li class="' . esc_attr($li_classes) . '" x-data="{ open: false }">';
    } else {
        $output .= '<li class="' . esc_attr($li_classes) . '">';
    }

    $a_classes = 'block w-full py-6 px-0 cursor-pointer !no-underline text-xl font-medium text-neutral-900 text-start';
    if ($depth > 0) {
        $a_classes .= ' !text-neutral-700 !text-base !py-4';
    }

    // Gestion du bouton avec SVG si parent
    if ($has_children && $depth === 0) {
        $output .= '<button @click="open = !open" class="group flex justify-between items-center w-full">';
        $output .= '<span class="' . esc_attr($a_classes) . '">' . esc_html($item->title) . '</span>';

        $svg_path = get_theme_file_path('resources/icons/chevron-down.svg');
        if (file_exists($svg_path)) {
            $svg = file_get_contents($svg_path);
            $svg = preg_replace(
                '/<svg /',
                '<svg class="h-6 w-6 mx-3 py-0 text-neutral-800 transition-transform duration-300" :class="{ \'rotate-180 text-primary-600\': open }"',
                $svg,
                1
            );
            $output .= $svg;
        }

        $output .= '</button>';
    } else {
        // Simple lien normal
        $output .= '<a href="' . esc_url($item->url) . '" class="' . esc_attr($a_classes) . '">';
        $output .= esc_html($item->title);
        $output .= '</a>';
    }
}


    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}
