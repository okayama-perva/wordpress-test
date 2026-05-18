<?php
/**
 * Section: SERVICE (+ スクロールバナー同梱)
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_uri = get_template_directory_uri();
?>

<!-- SERVICE BANNER -->
<div class="scroll-banner" style="background:#f2f3ef; padding-top:40px;">
	<div class="scroll-banner-inner">
		<span style="color:rgba(26,33,54,0.04);font-weight:100;">SERVICE SERVICE SERVICE SERVICE SERVICE </span>
		<span style="color:rgba(26,33,54,0.04);font-weight:100;">SERVICE SERVICE SERVICE SERVICE SERVICE </span>
	</div>
</div>

<!-- SERVICE -->
<section class="service-section">
	<div class="service-inner">
		<div class="service-image" data-anim>
			<img src="<?php echo esc_url( $theme_uri . '/assets/img/service.jpg' ); ?>" alt="Service Image">
			<div class="service-img-caption">See what<br>White Homes<br>can do for you!</div>
		</div>
		<div class="service-card" data-anim style="transition-delay:120ms">
			<div class="service-num">01</div>
			<div class="service-content">
				<div class="service-text-group">
					<div class="service-label">資産価値を上げるご提案</div>
					<div class="service-title">リニューアル・デ・レント</div>
					<div class="service-desc">
						<p>説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。</p>
						<p>説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。</p>
					</div>
				</div>
				<a href="#" class="btn-outline">
					賃貸オーナー様向けサービスを詳しく見る
					<svg class="btn-arrow" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="24" height="24" rx="12" fill="currentColor"></rect><path d="M15.92 12.3802C15.8724 12.5029 15.801 12.6151 15.71 12.7102L12.71 15.7102C12.617 15.8039 12.5064 15.8783 12.3846 15.9291C12.2627 15.9798 12.132 16.006 12 16.006C11.868 16.006 11.7373 15.9798 11.6154 15.9291C11.4936 15.8783 11.383 15.8039 11.29 15.7102C11.1963 15.6172 11.1219 15.5066 11.0711 15.3848C11.0203 15.2629 10.9942 15.1322 10.9942 15.0002C10.9942 14.8682 11.0203 14.7375 11.0711 14.6156C11.1219 14.4938 11.1963 14.3831 11.29 14.2902L12.59 13.0002H9C8.73478 13.0002 8.48043 12.8948 8.29289 12.7073C8.10536 12.5198 8 12.2654 8 12.0002C8 11.735 8.10536 11.4806 8.29289 11.2931C8.48043 11.1055 8.73478 11.0002 9 11.0002H12.59L11.29 9.71019C11.1017 9.52188 10.9959 9.26649 10.9959 9.00019C10.9959 8.73388 11.1017 8.47849 11.29 8.29019C11.4783 8.10188 11.7337 7.99609 12 7.99609C12.2663 7.99609 12.5217 8.10188 12.71 8.29019L15.71 11.2902C15.801 11.3853 15.8724 11.4974 15.92 11.6202C16.02 11.8636 16.02 12.1367 15.92 12.3802Z" fill="currentColor"></path></svg>
				</a>
			</div>
			<div class="service-dots">
				<span class="service-dot active"></span>
				<span class="service-dot"></span>
				<span class="service-dot"></span>
				<span class="service-dot"></span>
				<span class="service-dot"></span>
			</div>
		</div>
	</div>
</section>
