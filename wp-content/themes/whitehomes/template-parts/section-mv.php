<?php
/**
 * Section: MV (Main Visual)
 *
 * PC レイアウト (.mv-pc) と SP レイアウト (.mv-sp-wrap) の二重 DOM を両方残す。
 * CSS の @media で表示を切り替えているため、片方を消すと壊れる。
 * 末尾の .mv-pc-events は元 HTML で body 末尾に固定配置されていた要素を MV セクションに同梱。
 * mv-pc-events / mv-sp-events は _whitehomes_show_popup = '1' の投稿を最大 2 件表示。
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_uri = get_template_directory_uri();

$popup_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 2,
		'no_found_rows'       => true,
		'ignore_sticky_posts' => true,
		'meta_query'          => array(
			array(
				'key'   => '_whitehomes_show_popup',
				'value' => '1',
			),
		),
	)
);
$popup_posts = $popup_query->have_posts() ? $popup_query->posts : array();
wp_reset_postdata();

$render_popup_link = function ( $post_id ) {
	$url = get_post_meta( $post_id, '_whitehomes_popup_url', true );
	return $url ? $url : get_permalink( $post_id );
};

/**
 * 対象（popup_audience タクソノミー）の最初の term 名を返す。
 */
$render_popup_audience = function ( $post_id ) {
	$terms = wp_get_object_terms( $post_id, 'popup_audience' );
	if ( is_wp_error( $terms ) || empty( $terms ) ) {
		return '';
	}
	return $terms[0]->name;
};

/**
 * ISO 日付 (Y-m-d) → ['8.29', '(金)'] のような配列を返す。
 * 入力が空 / 不正なら ['',''] を返す。
 */
$format_popup_date = function ( $iso ) {
	if ( ! $iso || ! preg_match( '/^\d{4}-\d{2}-\d{2}$/', $iso ) ) {
		return array( '', '' );
	}
	$ts = strtotime( $iso . ' 00:00:00' );
	if ( ! $ts ) {
		return array( '', '' );
	}
	return array(
		wp_date( 'n.j', $ts ),
		'(' . wp_date( 'D', $ts ) . ')',
	);
};
?>

<!-- MV -->
<section class="mv" id="mv">
	<div class="mv-pc">
		<div class="mv-pc-gradient-bl"></div>

		<div class="mv-pc-identity">
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

		<?php if ( ! empty( $popup_posts ) ) : ?>
			<div class="mv-sp-events">
				<?php foreach ( $popup_posts as $popup_post ) : ?>
					<?php
					$pid      = $popup_post->ID;
					$month    = get_post_meta( $pid, '_whitehomes_popup_month', true );
					$audience = $render_popup_audience( $pid );
					$date1    = get_post_meta( $pid, '_whitehomes_popup_date_1', true );
					$date2    = get_post_meta( $pid, '_whitehomes_popup_date_2', true );
					$subtitle = get_post_meta( $pid, '_whitehomes_popup_subtitle', true );
					$link     = $render_popup_link( $pid );
					list( $d1_num, $d1_day ) = $format_popup_date( $date1 );
					list( $d2_num, $d2_day ) = $format_popup_date( $date2 );
					$d1_display = $d1_num ? trim( $d1_num . ' ' . $d1_day ) : '';
					$d2_display = $d2_num ? trim( $d2_num . ' ' . $d2_day ) : '';
					?>
					<div class="mv-sp-event-card">
						<div class="mv-sp-evt-header">
							<?php if ( $month ) : ?>
								<span class="mv-sp-evt-month"><?php echo esc_html( $month ); ?></span>
							<?php endif; ?>
							<?php if ( $audience ) : ?>
								<span class="mv-sp-evt-tag"><?php echo esc_html( $audience ); ?></span>
							<?php endif; ?>
						</div>
						<div class="mv-sp-evt-title">
							<p><?php echo esc_html( get_the_title( $pid ) ); ?></p>
							<?php if ( $subtitle ) : ?>
								<p><?php echo esc_html( $subtitle ); ?></p>
							<?php endif; ?>
						</div>
						<div class="mv-sp-evt-footer">
							<div class="mv-sp-evt-dates">
								<?php if ( $d1_display ) : ?>
									<span class="mv-sp-evt-date"><?php echo esc_html( $d1_display ); ?></span>
								<?php endif; ?>
								<?php if ( $d2_display ) : ?>
									<span class="mv-sp-evt-date"><?php echo esc_html( $d2_display ); ?></span>
								<?php endif; ?>
							</div>
							<a href="<?php echo esc_url( $link ); ?>" class="mv-sp-evt-link">
								詳細をみる
								<img src="<?php echo esc_url( $theme_uri . '/assets/img/arrow-circle-right.svg' ); ?>" alt="→">
							</a>
						</div>
						<div class="mv-sp-evt-corner"><img src="<?php echo esc_url( $theme_uri . '/assets/img/plus 1.svg' ); ?>" alt="閉じる"></div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<!-- Event cards (fixed bottom-right, PC layout) -->
<?php if ( ! empty( $popup_posts ) ) : ?>
	<div class="mv-pc-events">
		<?php foreach ( $popup_posts as $popup_post ) : ?>
			<?php
			$pid      = $popup_post->ID;
			$month    = get_post_meta( $pid, '_whitehomes_popup_month', true );
			$audience = $render_popup_audience( $pid );
			$date1    = get_post_meta( $pid, '_whitehomes_popup_date_1', true );
			$date2    = get_post_meta( $pid, '_whitehomes_popup_date_2', true );
			$subtitle = get_post_meta( $pid, '_whitehomes_popup_subtitle', true );
			$link     = $render_popup_link( $pid );
			list( $d1_num, $d1_day ) = $format_popup_date( $date1 );
			list( $d2_num, $d2_day ) = $format_popup_date( $date2 );
			?>
			<div class="mv-pc-event-card">
				<?php if ( $month ) : ?>
					<div class="mv-pc-evt-month"><?php echo esc_html( $month ); ?></div>
				<?php endif; ?>
				<div class="mv-pc-evt-corner"><img src="<?php echo esc_url( $theme_uri . '/assets/img/plus 1.svg' ); ?>" alt="閉じる"></div>
				<?php if ( $audience ) : ?>
					<span class="mv-pc-evt-tag"><?php echo esc_html( $audience ); ?></span>
				<?php endif; ?>
				<div class="mv-pc-evt-title">
					<p><?php echo esc_html( get_the_title( $pid ) ); ?></p>
					<?php if ( $subtitle ) : ?>
						<p><?php echo esc_html( $subtitle ); ?></p>
					<?php endif; ?>
				</div>
				<div class="mv-pc-evt-dates">
					<?php if ( $d1_num ) : ?>
						<div class="mv-pc-evt-date"><span class="d-num"><?php echo esc_html( $d1_num ); ?></span><?php if ( $d1_day ) : ?><span class="d-day"><?php echo esc_html( $d1_day ); ?></span><?php endif; ?></div>
					<?php endif; ?>
					<?php if ( $d2_num ) : ?>
						<div class="mv-pc-evt-date"><span class="d-num"><?php echo esc_html( $d2_num ); ?></span><?php if ( $d2_day ) : ?><span class="d-day"><?php echo esc_html( $d2_day ); ?></span><?php endif; ?></div>
					<?php endif; ?>
				</div>
				<a href="<?php echo esc_url( $link ); ?>" class="mv-pc-evt-link">
					詳細をみる
					<img src="<?php echo esc_url( $theme_uri . '/assets/img/arrow-circle-right.svg' ); ?>" alt="→">
				</a>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
