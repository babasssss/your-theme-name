<?php
namespace App\Setup\Blocks;


add_filter('render_block_core/group', function ($block_content, $block) {
    $classes = $block['attrs']['className'] ?? '';

    // Ne faire quelque chose que si la classe "group-eformaliste" est présente
    if (str_contains($classes, 'group-eformaliste')) {
        // Injecte un wrapper autour du contenu uniquement
        // Matche le contenu entre la première balise ouvrante et la balise fermante
        $block_content = preg_replace(
            '/(<section\b[^>]*>)(.*?)(<\/section>)/is',
            '$1<div class="container-eformaliste">$2</div>$3',
            $block_content
        );
    }

    return $block_content;
}, 10, 2);
