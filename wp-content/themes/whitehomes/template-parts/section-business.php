<?php
/**
 * Section: BUSINESS (+ スクロールバナー同梱)
 *
 * アコーディオンの onclick="toggleAcc(this)" は footer.php のインライン JS で window.toggleAcc を定義しているので動作する。
 * 初期状態のボタン内 img のパスは PHP 側でテーマ URI に書き換え、JS 側の innerHTML 書き換えも THEME_URI 経由になっている。
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_uri = get_template_directory_uri();
$acc_open  = esc_url( $theme_uri . '/assets/img/accordion-open.svg' );
$acc_close = esc_url( $theme_uri . '/assets/img/accordion-close.svg' );

$accordion_items = array(
	array( 'title' => '賃貸管理', 'body' => '賃貸管理についての説明文章が入ります。賃貸管理についての説明文章が入ります。賃貸管理についての説明文章が入ります。賃貸管理についての説明文章が入ります。賃貸管理についての説明文章が入ります。賃貸管理についての説明文章が入ります。', 'open' => true ),
	array( 'title' => '売買仲介・借地管理', 'body' => '詳細テキストが入ります。', 'open' => false ),
	array( 'title' => '区分所有マンション管理・中長期修繕計画', 'body' => '詳細テキストが入ります。', 'open' => false ),
	array( 'title' => '資産の有効活用のご提案', 'body' => '詳細テキストが入ります。', 'open' => false ),
	array( 'title' => '賃貸仲介', 'body' => '詳細テキストが入ります。', 'open' => false ),
	array( 'title' => 'リフォーム・リノベーション', 'body' => '詳細テキストが入ります。', 'open' => false ),
	array( 'title' => '相続対策・税務対策', 'body' => '詳細テキストが入ります。', 'open' => false ),
);
?>

<!-- BUSINESS BANNER -->
<div class="scroll-banner" style="background:#fff;">
	<div class="scroll-banner-inner">
		<span style="color:rgba(26,33,54,0.06);">BUSINESS BUSINESS BUSINESS BUSINESS </span>
		<span style="color:rgba(26,33,54,0.06);">BUSINESS BUSINESS BUSINESS BUSINESS </span>
	</div>
</div>

<!-- BUSINESS -->
<section class="business-wrap">
	<div class="business-inner">
		<img src="<?php echo esc_url( $theme_uri . '/assets/img/Nav Button.svg' ); ?>" alt="" class="business-nav-btn">
		<div class="business-top" data-anim>
			<div class="business-top-left">
				<div class="section-label">BUSINESS</div>
				<div class="section-title">業務領域</div>
				<div class="section-desc">オーナー様一人ひとりに寄り添いたい<br>だから私たちは地域密着でお客様に貢献します。</div>
			</div>
			<div class="business-offerings-img">
				<img src="<?php echo esc_url( $theme_uri . '/assets/img/Offerings Container.png' ); ?>" alt="業務領域">
			</div>
		</div>
		<div class="accordion-list" data-anim style="transition-delay:150ms">
			<?php foreach ( $accordion_items as $item ) : ?>
				<div class="accordion-item<?php echo $item['open'] ? ' open' : ''; ?>">
					<div class="accordion-header">
						<span class="accordion-title"><?php echo esc_html( $item['title'] ); ?></span>
						<button class="accordion-btn" onclick="toggleAcc(this)">
							<?php if ( $item['open'] ) : ?>
								閉じる <img src="<?php echo $acc_close; ?>" alt="">
							<?php else : ?>
								詳しく見る <img src="<?php echo $acc_open; ?>" alt="">
							<?php endif; ?>
						</button>
					</div>
					<div class="accordion-body"><?php echo esc_html( $item['body'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
