<?php
/**
 * Plugin Name: CasualBen Automatic Alt and Caption Text
 * Plugin URI: https://github.com/DasBen/CasualBen-Automatic-Alt-And-Caption-Text
 * Description: Automatically adds alt text to images in Gutenberg block editor when you add the alt text in the Media Library
 * Version: 1.1.0
 * Author: Benjamin Pahl - CasualBen
 * Author URI: https://www.casualben.com
 *
 * Including Version 1.0.0: BE Automatic Alt Text - Bill Erickson - https://github.com/billerickson/BE-Automatic-Alt-Text
 * 
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

 add_filter( 'render_block', function( $content, $block ) {
 	if( 'core/image' !== $block['blockName'] )
 		return $content;

 	$alt = get_post_meta( $block['attrs']['id'], '_wp_attachment_image_alt', true );
 	if( empty( $alt ) )
 		return $content;

 	// Empty alt
 	if( false !== strpos( $content, 'alt=""' ) ) {
 		$content = str_replace( 'alt=""', 'alt="' . $alt . '"', $content );

 	// No alt
 	} elseif( false === strpos( $content, 'alt="' ) ) {
 		$content = str_replace( 'src="', 'alt="' . $alt . '" src="', $content );
 	}

 	return $content;
 }, 10, 2 );
