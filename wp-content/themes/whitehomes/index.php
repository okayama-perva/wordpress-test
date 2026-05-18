<?php
/**
 * Fallback Template
 *
 * front-page.php / page-*.php / single-*.php がマッチしない場合のフォールバック。
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class(); ?>>
				<h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div>
			</article>
			<?php
		endwhile;

		the_posts_pagination();
	else :
		?>
		<p><?php esc_html_e( '記事が見つかりませんでした。', 'whitehomes' ); ?></p>
		<?php
	endif;
	?>
</main>

<?php
get_footer();
