<?php
/**
 * Section: ABOUT (+ WHITE HOMES スクロールバナー同梱)
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_uri = get_template_directory_uri();
?>

<!-- WHITE HOMES BANNER -->
<div class="scroll-banner" style="background:var(--bg-gray);">
	<div class="scroll-banner-inner">
		<span style="color:rgba(255,255,255,0.6);">WHITE HOMES WHITE HOMES WHITE HOMES WHITE HOMES </span>
		<span style="color:rgba(255,255,255,0.6);">WHITE HOMES WHITE HOMES WHITE HOMES WHITE HOMES </span>
	</div>
</div>

<!-- ABOUT -->
<section class="about">
	<div class="about-top">
		<div class="about-inner">
			<div class="about-stats-row">
				<div class="about-stat-card" data-anim>
					<div>
						<div class="about-stat-label">ABOUT WHITE HOMES 01</div>
						<div class="about-stat-title">大田区地域密着</div>
						<div class="about-stat-num">
							<span class="lbl">創業</span>
							<span class="num hl" data-count-to="54">54</span>
							<span class="lbl">年目</span>
						</div>
					</div>
					<div class="about-stat-img">
						<img src="<?php echo esc_url( $theme_uri . '/assets/img/about-01.png' ); ?>" alt="">
					</div>
				</div>
				<div class="about-stat-card" data-anim style="transition-delay:120ms">
					<div>
						<div class="about-stat-label">ABOUT WHITE HOMES 02</div>
						<div class="about-stat-title">お取り扱い物件</div>
						<div class="about-stat-num">
							<span class="num hl" data-count-to="6000" data-format="comma">6,000</span>
							<span class="lbl">室越</span>
						</div>
					</div>
					<div class="about-stat-img">
						<img src="<?php echo esc_url( $theme_uri . '/assets/img/about-02.png' ); ?>" alt="">
					</div>
				</div>
			</div>

			<div class="about-body-row">
				<div class="about-desc" data-anim>
					<p>株式会社ホワイトホームズは約半世紀に渡り、地域密着で不動産賃貸管理業を中心にトータルな不動産コンサルティング会社として長く事業を展開してきました。</p>
					<p>お取り扱い物件も15期連続で増加しており6,000室超、管理物件入居率96〜98％とどちらも高い水準を維持し、さらに進化していきます。</p>
				</div>
				<div class="about-stat3" data-anim style="transition-delay:120ms">
					<div>
						<div class="about-stat-label">ABOUT WHITE HOMES 03</div>
						<div class="about-stat-title">管理物件入居率</div>
						<div class="about-stat-num">
							<span class="num hl" data-count-to="98.25" data-decimals="2">98.25</span>
							<span class="lbl" style="font-size:clamp(20px,2.5vw,35px);">%</span>
						</div>
						<div class="about-date">2025.5.7現在</div>
					</div>
					<div class="about-stat-img">
						<img src="<?php echo esc_url( $theme_uri . '/assets/img/about-03.png' ); ?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="about-bottom">
		<div class="about-inner">
			<div class="about-cta-row">
				<div class="about-cta-left">
					<div class="about-catchcopy">私たちは<br>賃貸管理を主軸とした<br>総合不動産会社です。</div>
					<a href="#" class="btn-outline">
						会社概要を見る
						<svg class="btn-arrow" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
							<rect width="24" height="24" rx="12" fill="#E67545"></rect>
							<path d="M15.92 12.3802C15.8724 12.5029 15.801 12.6151 15.71 12.7102L12.71 15.7102C12.617 15.8039 12.5064 15.8783 12.3846 15.9291C12.2627 15.9798 12.132 16.006 12 16.006C11.868 16.006 11.7373 15.9798 11.6154 15.9291C11.4936 15.8783 11.383 15.8039 11.29 15.7102C11.1963 15.6172 11.1219 15.5066 11.0711 15.3848C11.0203 15.2629 10.9942 15.1322 10.9942 15.0002C10.9942 14.8682 11.0203 14.7375 11.0711 14.6156C11.1219 14.4938 11.1963 14.3831 11.29 14.2902L12.59 13.0002H9C8.73478 13.0002 8.48043 12.8948 8.29289 12.7073C8.10536 12.5198 8 12.2654 8 12.0002C8 11.735 8.10536 11.4806 8.29289 11.2931C8.48043 11.1055 8.73478 11.0002 9 11.0002H12.59L11.29 9.71019C11.1017 9.52188 10.9959 9.26649 10.9959 9.00019C10.9959 8.73388 11.1017 8.47849 11.29 8.29019C11.4783 8.10188 11.7337 7.99609 12 7.99609C12.2663 7.99609 12.5217 8.10188 12.71 8.29019L15.71 11.2902C15.801 11.3853 15.8724 11.4974 15.92 11.6202C16.02 11.8636 16.02 12.1367 15.92 12.3802Z" fill="currentColor"></path>
						</svg>
					</a>
				</div>
				<div class="about-cta-photo">
					<img src="<?php echo esc_url( $theme_uri . '/assets/img/about-office.png' ); ?>" alt="オフィス">
				</div>
			</div>
		</div>
	</div>
</section>
