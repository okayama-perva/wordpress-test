<?php
/**
 * Section: MV (Main Visual)
 *
 * PC レイアウト (.mv-pc) と SP レイアウト (.mv-sp-wrap) の二重 DOM を両方残す。
 * CSS の @media で表示を切り替えているため、片方を消すと壊れる。
 * 末尾の .mv-pc-events は元 HTML で body 末尾に固定配置されていた要素を MV セクションに同梱。
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_uri = get_template_directory_uri();
?>

<!-- MV -->
<section class="mv" id="mv">
	<div class="mv-pc">
		<div class="mv-pc-gradient-bl"></div>

		<div class="mv-pc-identity">
			<div class="mv-company-label">株式会社ホワイトホームズ</div>
			<img class="mv-pc-sogyou-img" src="<?php echo esc_url( $theme_uri . '/assets/img/創業54年.png' ); ?>" alt="創業54年">
		</div>

		<div class="mv-pc-catchcopy">
			<div class="mv-pc-catch-line mv-pc-catch-deco">
				<img class="mv-catch-vector" src="<?php echo esc_url( $theme_uri . '/assets/img/mv_Vector.png' ); ?>" alt="">
				<span>不動産の未来を</span>
			</div>
			<div class="mv-pc-catch-line"><span>心から思い最適な</span></div>
			<div class="mv-pc-catch-line mv-pc-catch-full"><span>不動産経営を提供します</span></div>
		</div>
	</div>

	<div class="mv-sp-wrap">
		<div class="mv-sp-hero">
			<div class="mv-sp-identity">
				<div class="mv-company-label">株式会社ホワイトホームズ</div>
				<img class="mv-sp-sogyou-img" src="<?php echo esc_url( $theme_uri . '/assets/img/創業54年.png' ); ?>" alt="創業54年">
			</div>

			<div class="mv-sp-catchcopy">
				<div class="mv-sp-catch-line mv-sp-catch-deco">
					<img class="mv-catch-vector" src="<?php echo esc_url( $theme_uri . '/assets/img/mv_Vector.png' ); ?>" alt="">
					<span>不動産の未来を</span>
				</div>
				<div class="mv-sp-catch-line"><span>心から思い最適な</span></div>
				<div class="mv-sp-catch-line"><span>不動産経営を提供します</span></div>
			</div>
		</div>

		<div class="mv-sp-events">
			<?php for ( $i = 0; $i < 2; $i++ ) : ?>
				<div class="mv-sp-event-card">
					<div class="mv-sp-evt-header">
						<span class="mv-sp-evt-month">10月</span>
						<span class="mv-sp-evt-tag">賃貸オーナー様向け</span>
					</div>
					<div class="mv-sp-evt-title">
						<p>不動産経営セミナー開催</p>
						<p>テーマ：「認知症対策について」</p>
					</div>
					<div class="mv-sp-evt-footer">
						<div class="mv-sp-evt-dates">
							<span class="mv-sp-evt-date">8.29 (金)</span>
							<span class="mv-sp-evt-date">9.13 (土)</span>
						</div>
						<a href="#" class="mv-sp-evt-link">
							詳細をみる
							<img src="<?php echo esc_url( $theme_uri . '/assets/img/arrow-circle-right.svg' ); ?>" alt="→">
						</a>
					</div>
					<div class="mv-sp-evt-corner"><img src="<?php echo esc_url( $theme_uri . '/assets/img/plus 1.svg' ); ?>" alt="閉じる"></div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>

<!-- Event cards (fixed bottom-right, PC layout) -->
<div class="mv-pc-events">
	<?php for ( $i = 0; $i < 2; $i++ ) : ?>
		<div class="mv-pc-event-card">
			<div class="mv-pc-evt-month">10月</div>
			<div class="mv-pc-evt-corner"><img src="<?php echo esc_url( $theme_uri . '/assets/img/plus 1.svg' ); ?>" alt="閉じる"></div>
			<span class="mv-pc-evt-tag">賃貸オーナー様向け</span>
			<div class="mv-pc-evt-title">
				<p>不動産経営セミナー開催</p>
				<p>テーマ：「認知症対策について」</p>
			</div>
			<div class="mv-pc-evt-dates">
				<div class="mv-pc-evt-date"><span class="d-num">8.29</span><span class="d-day">(金)</span></div>
				<div class="mv-pc-evt-date"><span class="d-num">9.13</span><span class="d-day">(土)</span></div>
			</div>
			<a href="#" class="mv-pc-evt-link">
				詳細をみる
				<img src="<?php echo esc_url( $theme_uri . '/assets/img/arrow-circle-right.svg' ); ?>" alt="→">
			</a>
		</div>
	<?php endfor; ?>
</div>
