<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- FOOTER -->
<div class="footer-wrap">
	<footer>
		<p class="footer-watermark">WHITEHOMES</p>
		<div class="footer-content">
			<div class="footer-links-row">
				<div class="footer-company-block">
					<div>
						<a href="#mv" class="footer-company-name"><?php esc_html_e( '株式会社ホワイトホームズ', 'whitehomes' ); ?></a>
						<div class="footer-nav">
							<div class="footer-nav-col">
								<a href="#"><?php esc_html_e( '賃貸オーナー様へ', 'whitehomes' ); ?></a>
								<a href="#"><?php esc_html_e( '空室対策', 'whitehomes' ); ?></a>
								<a href="#"><?php esc_html_e( '会社概要', 'whitehomes' ); ?></a>
								<a href="#"><?php esc_html_e( 'お知らせ', 'whitehomes' ); ?></a>
							</div>
							<div class="footer-nav-col">
								<a href="#"><?php esc_html_e( '賃貸物件検索', 'whitehomes' ); ?></a>
								<a href="#"><?php esc_html_e( 'お問い合わせ', 'whitehomes' ); ?></a>
								<a href="#"><?php esc_html_e( 'ご入居者様へ', 'whitehomes' ); ?></a>
								<a href="#"><?php esc_html_e( 'プライバシーポリシー', 'whitehomes' ); ?></a>
							</div>
						</div>
					</div>
					<div class="footer-media">
						<div class="footer-media-label"><?php esc_html_e( '＼各媒体で物件紹介中／', 'whitehomes' ); ?></div>
						<div class="footer-media-logos">
							<div class="footer-logo-athome">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/footer-logo-athome.png' ); ?>" alt="at home">
							</div>
							<div class="footer-logo-suumo">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/footer-logo-suumo.png' ); ?>" alt="SUUMO">
							</div>
						</div>
					</div>
				</div>
				<div class="footer-social">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/footer-fb.svg' ); ?>" alt="Facebook">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/footer-instagram.svg' ); ?>" alt="Instagram">
				</div>
				<div class="footer-info">
					<a href="#mv" class="footer-wh-logo">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/footer-wh-logo.svg' ); ?>" alt="<?php echo esc_attr__( 'ホワイトホームズ', 'whitehomes' ); ?>">
					</a>
					<div class="footer-store">
						<span class="footer-store-tag"><?php esc_html_e( '本店', 'whitehomes' ); ?></span>
						<div class="footer-store-detail">
							〒145-0074　東京都大田区東嶺町28-11<br>
							最寄駅：東急池上線 久が原駅 徒歩1分<br>
							Tel.0120-63-0481<br>
							営業時間 9:00-18:00（祝17:00）
						</div>
					</div>
					<div class="footer-store">
						<span class="footer-store-tag"><?php esc_html_e( '鵜の木店', 'whitehomes' ); ?></span>
						<div class="footer-store-detail">
							〒149-0091　東京都大田区鵜の木2-3-9　1-A<br>
							最寄駅：東急多摩川線 鵜の木駅 徒歩1分<br>
							Tel.03-3759-1512<br>
							営業時間 9:00-18:00（祝17:00）
						</div>
					</div>
				</div>
			</div>
			<p class="footer-copyright">Copyright © WHITE HOMES. All rights reserved.</p>
		</div>
	</footer>
	<a href="#" class="page-top">
		<img class="page-top-arrow" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/arrow-page-top.svg' ); ?>" alt="<?php echo esc_attr__( 'ページトップへ', 'whitehomes' ); ?>">
		<span class="page-top-label">Page top</span>
	</a>
</div>

<?php /* TODO(task 5): 以下のインライン JS は assets/js/main.js に切り出して wp_enqueue_script へ移行する */ ?>
<script>
(function () {
	var THEME_URI = <?php echo wp_json_encode( get_template_directory_uri() ); ?>;
	var ACCORDION_OPEN_SRC  = THEME_URI + '/assets/img/accordion-open.svg';
	var ACCORDION_CLOSE_SRC = THEME_URI + '/assets/img/accordion-close.svg';

	// Accordion
	window.toggleAcc = function (btn) {
		var item = btn.closest('.accordion-item');
		var isOpen = item.classList.contains('open');
		document.querySelectorAll('.accordion-item').forEach(function (el) {
			el.classList.remove('open');
			var b = el.querySelector('.accordion-btn');
			b.innerHTML = '詳しく見る <img src="' + ACCORDION_OPEN_SRC + '" alt="">';
		});
		if (!isOpen) {
			item.classList.add('open');
			btn.innerHTML = '閉じる <img src="' + ACCORDION_CLOSE_SRC + '" alt="">';
		}
	};

	// Event cards close button
	document.addEventListener('DOMContentLoaded', function () {
		document.querySelectorAll('.mv-pc-evt-corner').forEach(function (btn) {
			btn.addEventListener('click', function () {
				btn.closest('.mv-pc-event-card').style.display = 'none';
			});
		});
		document.querySelectorAll('.mv-sp-evt-corner').forEach(function (btn) {
			btn.addEventListener('click', function () {
				btn.closest('.mv-sp-event-card').style.display = 'none';
			});
		});
	});

	// Hamburger menu
	var hamburgerBtn   = document.getElementById('hamburgerBtn');
	var mobileNav      = document.getElementById('mobileNav');
	var mobileNavClose = document.getElementById('mobileNavClose');

	function openMobileNav() {
		mobileNav.classList.add('open');
		mobileNav.setAttribute('aria-hidden', 'false');
		hamburgerBtn.classList.add('is-open');
		hamburgerBtn.setAttribute('aria-expanded', 'true');
		hamburgerBtn.setAttribute('aria-label', 'メニューを閉じる');
		document.body.style.overflow = 'hidden';
	}
	function closeMobileNav() {
		mobileNav.classList.remove('open');
		mobileNav.setAttribute('aria-hidden', 'true');
		hamburgerBtn.classList.remove('is-open');
		hamburgerBtn.setAttribute('aria-expanded', 'false');
		hamburgerBtn.setAttribute('aria-label', 'メニューを開く');
		document.body.style.overflow = '';
	}

	if (hamburgerBtn && mobileNav && mobileNavClose) {
		hamburgerBtn.addEventListener('click', function () {
			if (mobileNav.classList.contains('open')) {
				closeMobileNav();
			} else {
				openMobileNav();
			}
		});
		mobileNavClose.addEventListener('click', closeMobileNav);
		mobileNav.querySelectorAll('a').forEach(function (a) {
			a.addEventListener('click', closeMobileNav);
		});
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && mobileNav.classList.contains('open')) {
				closeMobileNav();
			}
		});
	}

	// Scroll appear animations
	(function () {
		var observer = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					observer.unobserve(entry.target);
				}
			});
		}, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });
		document.querySelectorAll('[data-anim]').forEach(function (el) {
			observer.observe(el);
		});
	})();

	// Count-up animation for ABOUT stats
	(function () {
		var DURATION = 1800;

		function easeOutExpo(t) {
			return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
		}

		function formatNumber(val, decimals, useComma) {
			var str = decimals > 0 ? val.toFixed(decimals) : Math.round(val).toString();
			if (useComma) {
				var parts = str.split('.');
				parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				str = parts.join('.');
			}
			return str;
		}

		function animateCount(el) {
			var target   = parseFloat(el.dataset.countTo);
			var decimals = parseInt(el.dataset.decimals || '0', 10);
			var useComma = el.dataset.format === 'comma';
			var start    = performance.now();

			function step(now) {
				var elapsed  = now - start;
				var progress = Math.min(elapsed / DURATION, 1);
				var value    = easeOutExpo(progress) * target;
				el.textContent = formatNumber(value, decimals, useComma);
				if (progress < 1) requestAnimationFrame(step);
			}

			el.textContent = formatNumber(0, decimals, useComma);
			requestAnimationFrame(step);
		}

		var observer = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					animateCount(entry.target);
					observer.unobserve(entry.target);
				}
			});
		}, { threshold: 0.3 });

		document.querySelectorAll('[data-count-to]').forEach(function (el) {
			observer.observe(el);
		});
	})();
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
