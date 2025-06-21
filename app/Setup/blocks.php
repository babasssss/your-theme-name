<?php
namespace App\Setup\Blocks;

use function Roots\view;

/**
 * Register custom blocks for the theme.
 *
 * This function registers custom blocks with WordPress, allowing them to be used in the block editor.
 * Each block is registered with a render callback that returns the rendered HTML for the block.
 *
 * @return void
 */
function register_blocks()
{
    register_block_type(get_theme_file_path('resources/js/blocks/hero-banner'), [
        'render_callback' => function ($attributes, $content, $block) {
            return view('blocks.hero-banner', [
                'attributes' => $attributes,
                'content' => $content,
                'block' => $block,
            ])->render();
        },
    ]);

    register_block_type(get_theme_file_path('resources/js/blocks/logos-partenaires'), [
        'render_callback' => function ($attributes, $content, $block) {
            return view('blocks.logos-partenaires', [
                'attributes' => $attributes,
                'content' => $content,
                'block' => $block,
            ])->render();
        },
    ]);

    register_block_type(get_theme_file_path('resources/js/blocks/tag'), [
        'render_callback' => function ($attributes, $content, $block) {
            return view('blocks.tag', [
                'attributes' => $attributes,
                'content' => $content,
                'block' => $block,
            ])->render();
        },
    ]);

    register_block_type(get_theme_file_path('resources/js/blocks/h2'), [
        'render_callback' => function ($attributes, $content, $block) {
            return view('blocks.h2', [
                'attributes' => $attributes,
                'content' => $content,
                'block' => $block,
            ])->render();
        },
    ]);

    register_block_type(get_theme_file_path('resources/js/blocks/paragraph'), [
        'render_callback' => function ($attributes, $content, $block) {
            return view('blocks.paragraph', [
                'attributes' => $attributes,
                'content' => $content,
                'block' => $block,
            ])->render();
        },
    ]);

    register_block_type(get_theme_file_path('resources/js/blocks/kpi-block'), [
        'render_callback' => function ($attributes, $content, $block) {
            return view('blocks.kpi-block', [
                'attributes' => $attributes,
                'content' => $content,
                'block' => $block,
            ])->render();
        },
    ]);

    register_block_type(get_theme_file_path('resources/js/blocks/link'), [
        'render_callback' => function ($attributes, $content, $block) {
            return view('blocks.link', [
                'attributes' => $attributes,
                'content' => $content,
                'block' => $block,
            ])->render();
        },
    ]);
}

add_action('init', __NAMESPACE__ . '\\register_blocks');