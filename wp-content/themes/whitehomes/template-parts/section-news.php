<?php
/**
 * Section: NEWS (お知らせ)
 *
 * 左の大ブロック = 最新 1 件。
 * リスト = それを除いた次の 3 件。
 * 「すべてのお知らせを見る」は投稿ページ（設定→表示設定で指定）に飛ばす。
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_uri = get_template_directory_uri();

$pickup_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 1,
		'no_found_rows'       => true,
		'ignore_sticky_posts' => true,
	)
);
$pickup_post_id = $pickup_query->have_posts() ? $pickup_query->posts[0]->ID : 0;

$list_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 3,
		'no_found_rows'       => true,
		'ignore_sticky_posts' => true,
		'post__not_in'        => $pickup_post_id ? array( $pickup_post_id ) : array(),
	)
);

$posts_page_url = get_post_type_archive_link( 'post' );
if ( ! $posts_page_url ) {
	$posts_page_id  = (int) get_option( 'page_for_posts' );
	$posts_page_url = $posts_page_id ? get_permalink( $posts_page_id ) : home_url( '/' );
}

/**
 * カテゴリ名を 1 件返す（複数付いていても表示は 1 件のみ）。
 */
$render_cat = function ( $post_id ) {
	$cats = get_the_category( $post_id );
	if ( empty( $cats ) ) {
		return '';
	}
	return $cats[0]->name;
};
?>

<!-- NEWS -->
<section class="news-section">
	<div class="news-bg-rect"></div>
	<div class="news-watermark">
		<div class="news-watermark-inner">
			<span>NEWS NEWS NEWS NEWS NEWS NEWS &nbsp;</span>
			<span>NEWS NEWS NEWS NEWS NEWS NEWS &nbsp;</span>
		</div>
	</div>
	<div class="news-label-block" data-anim>
		<div class="section-label">NEWS</div>
		<div class="news-section-title">お知らせ</div>
	</div>

	<?php if ( $pickup_query->have_posts() ) : ?>
		<?php
		$pickup_query->the_post();
		$pickup_thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' );
		if ( ! $pickup_thumb ) {
			$pickup_thumb = $theme_uri . '/assets/img/news-pickup.jpg';
		}
		$pickup_cat = $render_cat( get_the_ID() );
		?>
		<a href="<?php the_permalink(); ?>" class="news-pickup-block" data-anim style="transition-delay:100ms">
			<div class="news-pickup-img">
				<img src="<?php echo esc_url( $pickup_thumb ); ?>" alt="<?php the_title_attribute(); ?>">
			</div>
			<div class="news-meta">
				<span class="news-date"><?php echo esc_html( get_the_date( 'Y.n.j' ) ); ?></span>
				<?php if ( $pickup_cat ) : ?>
					<span class="news-cat"><?php echo esc_html( $pickup_cat ); ?></span>
				<?php endif; ?>
			</div>
			<div class="news-title"><?php the_title(); ?></div>
		</a>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

	<div class="news-list-block" data-anim style="transition-delay:200ms">
		<?php if ( $list_query->have_posts() ) : ?>
			<?php while ( $list_query->have_posts() ) : ?>
				<?php
				$list_query->the_post();
				$cat_name = $render_cat( get_the_ID() );
				?>
				<a href="<?php the_permalink(); ?>" class="news-item">
					<div class="news-item-inner">
						<div class="news-meta">
							<span class="news-date"><?php echo esc_html( get_the_date( 'Y.n.j' ) ); ?></span>
							<?php if ( $cat_name ) : ?>
								<span class="news-cat"><?php echo esc_html( $cat_name ); ?></span>
							<?php endif; ?>
						</div>
						<div class="news-title"><?php the_title(); ?></div>
					</div>
				</a>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>

		<a href="<?php echo esc_url( $posts_page_url ); ?>" class="news-more-btn">
			すべてのお知らせを見る
			<svg class="btn-arrow" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="24" height="24" rx="12" fill="currentColor"></rect><path d="M15.92 12.3802C15.8724 12.5029 15.801 12.6151 15.71 12.7102L12.71 15.7102C12.617 15.8039 12.5064 15.8783 12.3846 15.9291C12.2627 15.9798 12.132 16.006 12 16.006C11.868 16.006 11.7373 15.9798 11.6154 15.9291C11.4936 15.8783 11.383 15.8039 11.29 15.7102C11.1963 15.6172 11.1219 15.5066 11.0711 15.3848C11.0203 15.2629 10.9942 15.1322 10.9942 15.0002C10.9942 14.8682 11.0203 14.7375 11.0711 14.6156C11.1219 14.4938 11.1963 14.3831 11.29 14.2902L12.59 13.0002H9C8.73478 13.0002 8.48043 12.8948 8.29289 12.7073C8.10536 12.5198 8 12.2654 8 12.0002C8 11.735 8.10536 11.4806 8.29289 11.2931C8.48043 11.1055 8.73478 11.0002 9 11.0002H12.59L11.29 9.71019C11.1017 9.52188 10.9959 9.26649 10.9959 9.00019C10.9959 8.73388 11.1017 8.47849 11.29 8.29019C11.4783 8.10188 11.7337 7.99609 12 7.99609C12.2663 7.99609 12.5217 8.10188 12.71 8.29019L15.71 11.2902C15.801 11.3853 15.8724 11.4974 15.92 11.6202C16.02 11.8636 16.02 12.1367 15.92 12.3802Z" fill="white"></path></svg>
		</a>
	</div>
</section>
