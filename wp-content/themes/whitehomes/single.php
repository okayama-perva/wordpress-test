<?php
/**
 * Single Post Template
 *
 * デザイン未着手のため最小実装。デザイン来たら整える。
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main news-single">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			$cats     = get_the_category();
			$cat_name = ! empty( $cats ) ? $cats[0]->name : '';
			?>
			<article <?php post_class( 'news-single-article' ); ?>>
				<div class="news-single-header">
					<div class="news-meta">
						<span class="news-date"><?php echo esc_html( get_the_date( 'Y.n.j' ) ); ?></span>
						<?php if ( $cat_name ) : ?>
							<span class="news-cat"><?php echo esc_html( $cat_name ); ?></span>
						<?php endif; ?>
					</div>
					<h1 class="news-single-title"><?php the_title(); ?></h1>
				</div>

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="news-single-thumb">
						<?php the_post_thumbnail( 'large' ); ?>
					</div>
				<?php endif; ?>

				<div class="news-single-body">
					<?php the_content(); ?>
				</div>

				<div class="news-single-footer">
					<?php
					$posts_page_id  = (int) get_option( 'page_for_posts' );
					$posts_page_url = $posts_page_id ? get_permalink( $posts_page_id ) : home_url( '/' );
					?>
					<a href="<?php echo esc_url( $posts_page_url ); ?>" class="news-back-link">
						<?php esc_html_e( 'お知らせ一覧に戻る', 'whitehomes' ); ?>
					</a>
				</div>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php
get_footer();
