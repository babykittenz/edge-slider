<?php
/**
 * Plugin Name:       Edge Slider
 * Description:       A high-performance, static-generated slider block for Gutenberg
 * Version:           1.0.0
 * Requires at least: 5.8
 * Author:            Michael Kidby
 * License:           MIT
 * Text Domain:       slider-block
 */

if ( ! defined( 'ABSPATH' ) ) exit;

const EDGE_SLIDER_BLOCK_NAME = 'edge-slider/slider';

add_action( 'init', function () {
	// Register the block type from block.json (metadata only; assets are enqueued manually below)
	register_block_type( __DIR__ . '/block.json' );
} );

/**
 * Enqueue editor assets explicitly (guarantees build/index.js actually loads).
 */
add_action( 'enqueue_block_editor_assets', function () {
	$asset_file = plugin_dir_path( __FILE__ ) . 'build/index.asset.php';
	$script_file = plugin_dir_path( __FILE__ ) . 'build/index.js';

	// If these are missing, the block cannot register in JS.
	if ( ! file_exists( $asset_file ) || ! file_exists( $script_file ) ) {
		return;
	}

	$asset = require $asset_file;

	wp_enqueue_script(
		'edge-slider-editor',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset['dependencies'] ?? array(),
		$asset['version'] ?? filemtime( $script_file ),
		true
	);

	$editor_css = plugin_dir_path( __FILE__ ) . 'build/index.css';
	if ( file_exists( $editor_css ) ) {
		wp_enqueue_style(
			'edge-slider-editor',
			plugins_url( 'build/index.css', __FILE__ ),
			array(),
			filemtime( $editor_css )
		);
	}
} );

/**
 * Frontend assets (only when the block exists on the page).
 */
add_action( 'wp_enqueue_scripts', function () {
	if ( is_admin() ) return;
	if ( ! has_block( EDGE_SLIDER_BLOCK_NAME ) ) return;

	$style_css = plugin_dir_path( __FILE__ ) . 'build/style-index.css';
	if ( file_exists( $style_css ) ) {
		wp_enqueue_style(
			'edge-slider-style',
			plugins_url( 'build/style-index.css', __FILE__ ),
			array(),
			filemtime( $style_css )
		);
	}

	$view_js = plugin_dir_path( __FILE__ ) . 'build/view.js';
	if ( file_exists( $view_js ) ) {
		wp_enqueue_script(
			'edge-slider-view',
			plugins_url( 'build/view.js', __FILE__ ),
			array(),
			filemtime( $view_js ),
			true
		);
	}
} );
