<?php

namespace App\Setup\Blocks;

/**
 * Empêche l’injection du style `.wp-container-core-group-is-layout-*` dans le frontend
 */
add_action('wp_footer', function () {
    wp_dequeue_style('core-block-supports');
});