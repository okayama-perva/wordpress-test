<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'whitehomes_setup' ) ) {
	function whitehomes_setup() {
		load_theme_textdomain( 'whitehomes', get_template_directory() . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		register_nav_menus(
			array(
				'global'  => __( 'グローバルナビ（ヘッダ）', 'whitehomes' ),
				'mobile'  => __( 'モバイルナビ', 'whitehomes' ),
				'footer1' => __( 'フッターナビ 1', 'whitehomes' ),
				'footer2' => __( 'フッターナビ 2', 'whitehomes' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'whitehomes_setup' );

function whitehomes_enqueue_assets() {
	$theme_dir = get_template_directory();

	wp_enqueue_style(
		'whitehomes-fonts',
		'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&family=Outfit:wght@100;300;400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'whitehomes-style',
		get_stylesheet_uri(),
		array( 'whitehomes-fonts' ),
		filemtime( $theme_dir . '/style.css' )
	);

	$main_js = $theme_dir . '/assets/js/main.js';
	if ( file_exists( $main_js ) ) {
		wp_enqueue_script(
			'whitehomes-main',
			get_template_directory_uri() . '/assets/js/main.js',
			array(),
			filemtime( $main_js ),
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'whitehomes_enqueue_assets' );

function whitehomes_preconnect_fonts( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type && wp_style_is( 'whitehomes-fonts', 'enqueued' ) ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
		$urls[] = 'https://fonts.googleapis.com';
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'whitehomes_preconnect_fonts', 10, 2 );
