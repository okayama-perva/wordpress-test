<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- HEADER -->
<header>
	<div class="header-left">
		<a href="#mv" class="header-logo-link" aria-label="<?php echo esc_attr__( 'メインビジュアルへ', 'whitehomes' ); ?>">
			<img class="header-logo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="56" height="49">
		</a>
		<nav class="header-nav">
			<a href="#"><?php esc_html_e( '賃貸オーナー様へ', 'whitehomes' ); ?></a>
			<a href="#"><?php esc_html_e( '空室対策', 'whitehomes' ); ?></a>
			<a href="#"><?php esc_html_e( '会社概要', 'whitehomes' ); ?></a>
			<a href="#"><?php esc_html_e( 'お知らせ', 'whitehomes' ); ?></a>
		</nav>
	</div>
	<div class="header-right">
		<a href="#" class="header-btn"><?php esc_html_e( 'ご入居者様へ', 'whitehomes' ); ?></a>
		<a href="#" class="header-btn">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/search.svg' ); ?>" alt="<?php echo esc_attr__( '検索', 'whitehomes' ); ?>">
			<?php esc_html_e( '賃貸物件検索', 'whitehomes' ); ?>
		</a>
		<div class="header-btn-tel">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Vector.svg' ); ?>" alt="<?php echo esc_attr__( '電話', 'whitehomes' ); ?>" style="width:24px;height:22px;">
			<div>
				<div class="tel-num">0120-63-481</div>
				<div class="tel-hours">9:00-18:00(祝-17:00)</div>
			</div>
		</div>
		<a href="#" class="header-btn-contact">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/contact.svg' ); ?>" alt="<?php echo esc_attr__( 'お問い合わせ', 'whitehomes' ); ?>">
			<?php esc_html_e( 'お問い合わせ', 'whitehomes' ); ?>
		</a>
		<button class="hamburger" type="button" id="hamburgerBtn" aria-label="<?php echo esc_attr__( 'メニューを開く', 'whitehomes' ); ?>" aria-expanded="false" aria-controls="mobileNav">
			<span></span><span></span><span></span>
		</button>
	</div>
</header>

<!-- MOBILE NAV -->
<nav class="mobile-nav" id="mobileNav" aria-hidden="true">
	<button class="mobile-nav-close" type="button" id="mobileNavClose" aria-label="<?php echo esc_attr__( 'メニューを閉じる', 'whitehomes' ); ?>">
		<span class="mobile-nav-close-icon" aria-hidden="true"></span>
	</button>
	<p class="mobile-nav-label"><?php esc_html_e( '株式会社ホワイトホームズ', 'whitehomes' ); ?></p>
	<div class="mobile-nav-links">
		<a href="#"><?php esc_html_e( '賃貸オーナー様へ', 'whitehomes' ); ?></a>
		<a href="#"><?php esc_html_e( '空室対策', 'whitehomes' ); ?></a>
		<a href="#"><?php esc_html_e( '会社概要', 'whitehomes' ); ?></a>
		<a href="#"><?php esc_html_e( 'お知らせ', 'whitehomes' ); ?></a>
		<a href="#"><?php esc_html_e( 'ご入居者様へ', 'whitehomes' ); ?></a>
		<a href="#"><?php esc_html_e( '賃貸物件検索', 'whitehomes' ); ?></a>
	</div>
	<div class="mobile-nav-tel-block">
		<div class="mobile-nav-tel">0120-63-481</div>
		<div class="mobile-nav-hours">9:00-18:00（祝-17:00）</div>
	</div>
	<a href="#" class="mobile-nav-contact"><?php esc_html_e( 'お問い合わせ', 'whitehomes' ); ?></a>
</nav>
