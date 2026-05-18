<?php
/**
 * Section: CTA (Contact)
 *
 * CTA 1（SERVICE と NEWS の間）は装飾楕円付き、CTA 2（TORIKUMI とフッタの間）は装飾なし。
 * $args['show_ellipse'] で出し分け（デフォルト false）。
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_uri    = get_template_directory_uri();
$show_ellipse = isset( $args['show_ellipse'] ) ? (bool) $args['show_ellipse'] : false;
?>

<div class="cta-wrap">
	<?php if ( $show_ellipse ) : ?>
		<div class="cta-deco-ellipse" aria-hidden="true"><img src="<?php echo esc_url( $theme_uri . '/assets/img/right-ellipse.png' ); ?>" alt=""></div>
	<?php endif; ?>
	<div class="cta-contact-block" data-anim>
		<div class="cta-contact-bg-text">CONTACT</div>
		<div class="cta-contact-left">
			<div class="cta-contact-label">CONTACT</div>
			<div class="cta-contact-title">ご来店予約</div>
			<div class="cta-contact-desc">個別無料相談承ります。<br>お気軽にお問い合わせください。</div>
		</div>
		<div class="cta-contact-card">
			<div class="cta-contact-col">
				<div class="cta-contact-icon-row">
					<img src="<?php echo esc_url( $theme_uri . '/assets/img/cta-tel.svg' ); ?>" alt="電話" width="32" height="32">
					<span class="cta-contact-icon-label">電話でのお問い合わせ</span>
				</div>
				<div class="cta-tel-row">
					<span class="cta-tel-prefix">TEL.</span>
					<div class="cta-tel-info">
						<div class="cta-tel-number">0120-63-481</div>
						<div class="cta-tel-hours">９:00-18:00（祝-17:00）</div>
					</div>
				</div>
			</div>
			<div class="cta-contact-col">
				<div class="cta-contact-icon-row">
					<img src="<?php echo esc_url( $theme_uri . '/assets/img/contact_o.svg' ); ?>" alt="mail" width="32" height="32">
					<span class="cta-contact-icon-label">メールでのお問い合わせ</span>
				</div>
				<a href="#" class="btn-outline">
					お問い合わせフォームへ
					<svg class="btn-arrow" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="24" height="24" rx="12" fill="currentColor"></rect><path d="M15.92 12.3802C15.8724 12.5029 15.801 12.6151 15.71 12.7102L12.71 15.7102C12.617 15.8039 12.5064 15.8783 12.3846 15.9291C12.2627 15.9798 12.132 16.006 12 16.006C11.868 16.006 11.7373 15.9798 11.6154 15.9291C11.4936 15.8783 11.383 15.8039 11.29 15.7102C11.1963 15.6172 11.1219 15.5066 11.0711 15.3848C11.0203 15.2629 10.9942 15.1322 10.9942 15.0002C10.9942 14.8682 11.0203 14.7375 11.0711 14.6156C11.1219 14.4938 11.1963 14.3831 11.29 14.2902L12.59 13.0002H9C8.73478 13.0002 8.48043 12.8948 8.29289 12.7073C8.10536 12.5198 8 12.2654 8 12.0002C8 11.735 8.10536 11.4806 8.29289 11.2931C8.48043 11.1055 8.73478 11.0002 9 11.0002H12.59L11.29 9.71019C11.1017 9.52188 10.9959 9.26649 10.9959 9.00019C10.9959 8.73388 11.1017 8.47849 11.29 8.29019C11.4783 8.10188 11.7337 7.99609 12 7.99609C12.2663 7.99609 12.5217 8.10188 12.71 8.29019L15.71 11.2902C15.801 11.3853 15.8724 11.4974 15.92 11.6202C16.02 11.8636 16.02 12.1367 15.92 12.3802Z" fill="currentColor"></path></svg>
				</a>
			</div>
		</div>
	</div>
</div>
