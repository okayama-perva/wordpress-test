<?php
/**
 * Front Page Template
 *
 * トップページ。各セクションは template-parts/section-*.php に分割。
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main">
	<?php
	get_template_part( 'template-parts/section', 'mv' );
	get_template_part( 'template-parts/section', 'about' );
	get_template_part( 'template-parts/section', 'business' );
	get_template_part( 'template-parts/section', 'strengths' );
	get_template_part( 'template-parts/section', 'service' );
	get_template_part( 'template-parts/section', 'cta', array( 'show_ellipse' => true ) );
	get_template_part( 'template-parts/section', 'news' );
	get_template_part( 'template-parts/section', 'stores' );
	get_template_part( 'template-parts/section', 'sns' );
	get_template_part( 'template-parts/section', 'torikumi' );
	get_template_part( 'template-parts/section', 'cta', array( 'show_ellipse' => false ) );
	?>
</main>

<?php
get_footer();
