<?php
/**
 * Section: TORIKUMI (取り組み)
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_uri = get_template_directory_uri();

// 共通の矢印 SVG path（btn-arrow 内で使い回し）。タイポ防止のため変数化。
$arrow_path = 'M15.92 12.3802C15.8724 12.5029 15.801 12.6151 15.71 12.7102L12.71 15.7102C12.617 15.8039 12.5064 15.8783 12.3846 15.9291C12.2627 15.9798 12.132 16.006 12 16.006C11.868 16.006 11.7373 15.9798 11.6154 15.9291C11.4936 15.8783 11.383 15.8039 11.29 15.7102C11.1963 15.6172 11.1219 15.5066 11.0711 15.3848C11.0203 15.2629 10.9942 15.1322 10.9942 15.0002C10.9942 14.8682 11.0203 14.7375 11.0711 14.6156C11.1219 14.4938 11.1963 14.3831 11.29 14.2902L12.59 13.0002H9C8.73478 13.0002 8.48043 12.8948 8.29289 12.7073C8.10536 12.5198 8 12.2654 8 12.0002C8 11.735 8.10536 11.4806 8.29289 11.2931C8.48043 11.1055 8.73478 11.0002 9 11.0002H12.59L11.29 9.71019C11.1017 9.52188 10.9959 9.26649 10.9959 9.00019C10.9959 8.73388 11.1017 8.47849 11.29 8.29019C11.4783 8.10188 11.7337 7.99609 12 7.99609C12.2663 7.99609 12.5217 8.10188 12.71 8.29019L15.71 11.2902C15.801 11.3853 15.8724 11.4974 15.92 11.6202C16.02 11.8636 16.02 12.1367 15.92 12.3802Z';
?>

<!-- 取り組み -->
<section class="torikumi">
	<div class="torikumi-circle">
		<img src="<?php echo esc_url( $theme_uri . '/assets/img/torikumi_Ellipse.png' ); ?>" alt="">
	</div>
	<div class="torikumi-title" data-anim>
		<div class="torikumi-title-col">発展に貢献</div>
		<div class="torikumi-title-col">街を守り</div>
	</div>
	<div class="torikumi-img-tr" data-anim style="transition-delay:100ms">
		<img src="<?php echo esc_url( $theme_uri . '/assets/img/torikumi-unoki.jpg' ); ?>" alt="鵜の木駅">
	</div>
	<div class="torikumi-bottom" data-anim style="transition-delay:200ms">
		<div class="torikumi-img-bl">
			<img src="<?php echo esc_url( $theme_uri . '/assets/img/torikumi-kugahara.jpg' ); ?>" alt="久が原駅">
		</div>
		<div class="torikumi-content">
			<div class="torikumi-desc-area">
				<div class="torikumi-desc">地域社会に「必要とされる企業へ」<br>地元に密着し清掃・イベントに協力しています。</div>
				<a href="#" class="btn-fill">
					ホワイトホームズの取り組み
					<svg class="btn-arrow" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="24" height="24" rx="12" fill="#fff"></rect><path d="<?php echo esc_attr( $arrow_path ); ?>" fill="#E67545"></path></svg>
				</a>
			</div>
			<div class="torikumi-cards">
				<div class="torikumi-card torikumi-card-mail">
					<div class="torikumi-card-emoji">🗞️</div>
					<div class="torikumi-card-body">
						<div class="torikumi-card-label">mail magazine</div>
						<div class="torikumi-card-title">情報を逃さずキャッチ！<br>先行受付中</div>
					</div>
					<a href="#" class="btn-outline" style="width:100%;justify-content:center;">
						メルマガ会員登録
						<svg class="btn-arrow" viewBox="0 0 24 24" aria-hidden="true" focusable="false" style="width:24px;height:24px;flex-shrink:0;"><rect width="24" height="24" rx="12" fill="currentColor"></rect><path d="<?php echo esc_attr( $arrow_path ); ?>" fill="currentColor"></path></svg>
					</a>
				</div>
				<div class="torikumi-card torikumi-card-blog">
					<div class="torikumi-card-emoji">👀</div>
					<div class="torikumi-card-body">
						<div class="torikumi-card-label">blog</div>
						<div class="torikumi-card-title">ホワイトホームズの<br>日常を覗き見</div>
					</div>
					<a href="#" class="btn-outline" style="width:100%;justify-content:center;">
						ブログ（準備中）
						<svg class="btn-arrow" viewBox="0 0 24 24" aria-hidden="true" focusable="false" style="width:24px;height:24px;flex-shrink:0;"><rect width="24" height="24" rx="12" fill="currentColor"></rect><path d="<?php echo esc_attr( $arrow_path ); ?>" fill="currentColor"></path></svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
