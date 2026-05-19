<?php
/**
 * Home (Blog Posts Index) Template
 *
 * 「設定 → 表示設定 → 投稿ページ」に指定された固定ページの表示に使われる。
 * デザイン未着手のため最小実装。デザイン来たら整える。
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main news-archive">
	<div class="news-archive-inner">
		<div class="news-archive-header">
			<div class="section-label">NEWS</div>
			<h1 class="news-archive-title">
				<?php
				$posts_page_id = (int) get_option( 'page_for_posts' );
				echo esc_html( $posts_page_id ? get_the_title( $posts_page_id ) : __( 'お知らせ', 'whitehomes' ) );
				?>
			</h1>
		</div>

		<?php if ( have_posts() ) : ?>
			<div class="news-archive-list">
				<?php
				while ( have_posts() ) :
					the_post();
					$cats     = get_the_category();
					$cat_name = ! empty( $cats ) ? $cats[0]->name : '';
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
			</div>

			<nav class="news-archive-pagination">
				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 1,
						'prev_text' => __( '前へ', 'whitehomes' ),
						'next_text' => __( '次へ', 'whitehomes' ),
					)
				);
				?>
			</nav>
		<?php else : ?>
			<p class="news-archive-empty"><?php esc_html_e( 'お知らせはまだありません。', 'whitehomes' ); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
