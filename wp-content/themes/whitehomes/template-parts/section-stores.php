<?php
/**
 * Section: STORES (店舗情報)
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_uri = get_template_directory_uri();
?>

<!-- 店舗情報 -->
<section class="stores">
	<div class="stores-deco-left" aria-hidden="true"><img src="<?php echo esc_url( $theme_uri . '/assets/img/info-ellipes-left.png' ); ?>" alt=""></div>
	<div class="stores-deco-right" aria-hidden="true"><img src="<?php echo esc_url( $theme_uri . '/assets/img/info-ellipse-right.png' ); ?>" alt=""></div>
	<div class="stores-vert">店舗情報</div>
	<div class="stores-inner">
		<div class="store-row" data-anim>
			<div class="store-info">
				<div class="store-tags-row">
					<span class="store-tag-name">本店</span>
					<a href="#" class="store-tag-link">本店の取り組み <img src="<?php echo esc_url( $theme_uri . '/assets/img/arrow-circle-right-white.svg' ); ?>" alt="→"></a>
				</div>
				<div class="store-detail">所在地：東京都大田区東嶺町28-11</div>
				<div class="store-detail">電話番号：03-6410-6801</div>
				<div class="store-detail">FAX：03-6410-6803</div>
				<div class="store-detail">営業時間：09:00-18:00（祝日17:00）</div>
				<div class="store-detail">定休日：年末年始</div>
				<div class="store-detail">最寄駅：東急池上線 久が原駅 徒歩1分</div>
				<div class="store-detail">宅建免許番号：東京都知事（14）第22427号</div>
				<div class="store-photo">
					<img src="<?php echo esc_url( $theme_uri . '/assets/img/store-honten.png' ); ?>" alt="本店">
				</div>
			</div>
			<div class="store-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3244.9222869858954!2d139.6857172!3d35.580309899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f55601f61e9d%3A0x3779ee8ca6280f7f!2z44CSMTQ1LTAwNzQg5p2x5Lqs6YO95aSn55Sw5Yy65p2x5ba655S677yS77yY4oiS77yR77yR!5e0!3m2!1sja!2sjp!4v1775098789193!5m2!1sja!2sjp" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
		<div class="store-row reverse" data-anim style="transition-delay:120ms">
			<div class="store-info">
				<div class="store-tags-row">
					<span class="store-tag-name">鵜の木店</span>
					<a href="#" class="store-tag-link">鵜の木店の取り組み <img src="<?php echo esc_url( $theme_uri . '/assets/img/arrow-circle-right-white.svg' ); ?>" alt="→"></a>
				</div>
				<div class="store-detail">所在地：東京都大田区鵜の木2-3-9　1-A</div>
				<div class="store-detail">電話番号：03-3759-1512</div>
				<div class="store-detail">FAX：03-3759-1513</div>
				<div class="store-detail">営業時間：09:00-18:00（祝日17:00）</div>
				<div class="store-detail">定休日：火曜・水曜</div>
				<div class="store-detail">最寄駅：東急多摩川線 鵜の木駅 徒歩1分</div>
				<div class="store-detail">宅建免許番号：東京都知事（14）第22427号</div>
				<div class="store-photo">
					<img src="<?php echo esc_url( $theme_uri . '/assets/img/store-unoki.png' ); ?>" alt="鵜の木店">
				</div>
			</div>
			<div class="store-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d202.82008199132522!2d139.68082611424893!3d35.5753974662658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60185ff9d80777a7%3A0xa0c8f29cdb72b10f!2z44CSMTQ2LTAwOTEg5p2x5Lqs6YO95aSn55Sw5Yy66bWc44Gu5pyo77yS5LiB55uu77yT4oiS77yZIDEgYQ!5e0!3m2!1sja!2sjp!4v1775098874605!5m2!1sja!2sjp" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	</div>
</section>
