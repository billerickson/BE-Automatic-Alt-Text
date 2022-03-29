<?php
/**
 * Plugin Name: CasualBen Automatic Alt and Caption Text
 * Plugin URI: https://github.com/DasBen/CasualBen-Automatic-Alt-And-Caption-Text
 * Description: Automatically adds alt text and captions to images in Gutenberg block editor when you add or modify in the Media Library
 * Version: 1.1.1
 * Author: Benjamin Pahl - CasualBen
 * Author URI: https://www.casual-ben.com
 *
 * Version <=1.0.0: BE Automatic Alt Text - Bill Erickson - https://github.com/billerickson/BE-Automatic-Alt-Text
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

add_filter('render_block', function ($content, $block) {

    if ('core/image' == $block['blockName']) {
        // Update Alt Text
        $alt = get_post_meta($block['attrs']['id'], '_wp_attachment_image_alt', true);
        if (!empty($alt)) {
            $content = preg_replace('/alt=".*"/', 'alt="' . $alt . '"', $content);
        }

        // Update Caption
        $caption = wp_get_attachment_caption($block['attrs']['id']);
        if (!empty($caption)) {
            $content = str_replace("</figure>", "<figcaption>".$caption."</figcaption></figure>", $content);					
        } else {
            $content = preg_replace('/<figcaption>.*<\/figcaption>/', '<figcaption>' . $caption . '</figcaption>', $content);
        }
    }

    return $content;
}, 10, 2);
