<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'whitehomes_setup' ) ) {
	function whitehomes_setup() {
		load_theme_textdomain( 'whitehomes', get_template_directory() . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		register_nav_menus(
			array(
				'global'  => __( 'グローバルナビ（ヘッダ）', 'whitehomes' ),
				'mobile'  => __( 'モバイルナビ', 'whitehomes' ),
				'footer1' => __( 'フッターナビ 1', 'whitehomes' ),
				'footer2' => __( 'フッターナビ 2', 'whitehomes' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'whitehomes_setup' );

function whitehomes_enqueue_assets() {
	$theme_dir = get_template_directory();

	wp_enqueue_style(
		'whitehomes-fonts',
		'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&family=Outfit:wght@100;300;400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'whitehomes-style',
		get_stylesheet_uri(),
		array( 'whitehomes-fonts' ),
		filemtime( $theme_dir . '/style.css' )
	);

	$main_js = $theme_dir . '/assets/js/main.js';
	if ( file_exists( $main_js ) ) {
		wp_enqueue_script(
			'whitehomes-main',
			get_template_directory_uri() . '/assets/js/main.js',
			array(),
			filemtime( $main_js ),
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'whitehomes_enqueue_assets' );

function whitehomes_preconnect_fonts( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type && wp_style_is( 'whitehomes-fonts', 'enqueued' ) ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
		$urls[] = 'https://fonts.googleapis.com';
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'whitehomes_preconnect_fonts', 10, 2 );

/**
 * ポップアップ表示メタ（MV 右下のセミナー/イベント告知カード）。
 *
 * チェック ON の投稿が MV 右下に最大 2 件表示される。
 * 既存メタは register_meta で REST 公開しておく（将来の用途）。
 */
function whitehomes_register_popup_meta() {
	$fields = array(
		'_whitehomes_show_popup'     => 'boolean',
		'_whitehomes_popup_month'    => 'string',
		'_whitehomes_popup_date_1'   => 'string',
		'_whitehomes_popup_date_2'   => 'string',
		'_whitehomes_popup_subtitle' => 'string',
		'_whitehomes_popup_url'      => 'string',
	);
	foreach ( $fields as $key => $type ) {
		register_post_meta(
			'post',
			$key,
			array(
				'type'              => $type,
				'single'            => true,
				'show_in_rest'      => true,
				'sanitize_callback' => 'string' === $type ? 'sanitize_text_field' : null,
				'auth_callback'     => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}
}
add_action( 'init', 'whitehomes_register_popup_meta' );

/**
 * ポップアップ対象（賃貸オーナー様向け 等）用のカスタムタクソノミー。
 * 管理画面の「投稿」配下に「対象」メニューが出る。カテゴリ感覚で追加・編集。
 */
function whitehomes_register_popup_audience_taxonomy() {
	register_taxonomy(
		'popup_audience',
		array( 'post' ),
		array(
			'labels'            => array(
				'name'          => __( '対象', 'whitehomes' ),
				'singular_name' => __( '対象', 'whitehomes' ),
				'menu_name'     => __( '対象', 'whitehomes' ),
				'add_new_item'  => __( '新しい対象を追加', 'whitehomes' ),
				'edit_item'     => __( '対象を編集', 'whitehomes' ),
				'search_items'  => __( '対象を検索', 'whitehomes' ),
				'all_items'     => __( 'すべての対象', 'whitehomes' ),
			),
			'public'            => false,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_admin_column' => false,
			'hierarchical'      => false,
			'rewrite'           => false,
			'show_in_rest'      => true,
			'meta_box_cb'       => false,
		)
	);
}
add_action( 'init', 'whitehomes_register_popup_audience_taxonomy' );

function whitehomes_add_popup_meta_box() {
	add_meta_box(
		'whitehomes_popup',
		__( 'ポップアップ表示（MV 右下カード）', 'whitehomes' ),
		'whitehomes_render_popup_meta_box',
		'post',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'whitehomes_add_popup_meta_box' );

function whitehomes_render_popup_meta_box( $post ) {
	$show     = get_post_meta( $post->ID, '_whitehomes_show_popup', true );
	$month    = get_post_meta( $post->ID, '_whitehomes_popup_month', true );
	$date1    = get_post_meta( $post->ID, '_whitehomes_popup_date_1', true );
	$date2    = get_post_meta( $post->ID, '_whitehomes_popup_date_2', true );
	$subtitle = get_post_meta( $post->ID, '_whitehomes_popup_subtitle', true );
	$url      = get_post_meta( $post->ID, '_whitehomes_popup_url', true );

	$audience_terms    = get_terms( array( 'taxonomy' => 'popup_audience', 'hide_empty' => false ) );
	$selected_audience = wp_get_object_terms( $post->ID, 'popup_audience', array( 'fields' => 'ids' ) );
	$selected_id       = ( ! is_wp_error( $selected_audience ) && ! empty( $selected_audience ) ) ? (int) $selected_audience[0] : 0;

	wp_nonce_field( 'whitehomes_save_popup', 'whitehomes_popup_nonce' );
	?>
	<p>
		<label>
			<input type="checkbox" name="whitehomes_show_popup" value="1" <?php checked( $show, '1' ); ?>>
			<strong><?php esc_html_e( 'この投稿を MV 右下のポップアップに表示する', 'whitehomes' ); ?></strong>
		</label>
	</p>
	<p class="description">
		<?php esc_html_e( '最新の ON 投稿が最大 2 件、MV 右下に表示されます。', 'whitehomes' ); ?>
	</p>
	<hr>
	<p>
		<label><?php esc_html_e( '月（表示用）', 'whitehomes' ); ?><br>
			<select name="whitehomes_popup_month" style="width:100%;">
				<option value=""><?php esc_html_e( '— 未指定 —', 'whitehomes' ); ?></option>
				<?php for ( $m = 1; $m <= 12; $m++ ) :
					$label = $m . '月'; ?>
					<option value="<?php echo esc_attr( $label ); ?>" <?php selected( $month, $label ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endfor; ?>
			</select>
		</label>
	</p>
	<p>
		<label><?php esc_html_e( '対象', 'whitehomes' ); ?><br>
			<select name="whitehomes_popup_audience" style="width:100%;">
				<option value="0"><?php esc_html_e( '— 未指定 —', 'whitehomes' ); ?></option>
				<?php if ( ! is_wp_error( $audience_terms ) ) : ?>
					<?php foreach ( $audience_terms as $term ) : ?>
						<option value="<?php echo esc_attr( $term->term_id ); ?>" <?php selected( $selected_id, $term->term_id ); ?>><?php echo esc_html( $term->name ); ?></option>
					<?php endforeach; ?>
				<?php endif; ?>
			</select>
		</label>
		<span class="description"><?php esc_html_e( '選択肢は管理画面 → 投稿 → 対象 で追加・編集できます。', 'whitehomes' ); ?></span>
	</p>
	<p>
		<label><?php esc_html_e( '開催日 1', 'whitehomes' ); ?><br>
			<input type="date" name="whitehomes_popup_date_1" value="<?php echo esc_attr( $date1 ); ?>" style="width:100%;">
		</label>
	</p>
	<p>
		<label><?php esc_html_e( '開催日 2', 'whitehomes' ); ?><br>
			<input type="date" name="whitehomes_popup_date_2" value="<?php echo esc_attr( $date2 ); ?>" style="width:100%;">
		</label>
		<span class="description"><?php esc_html_e( '曜日は自動表示されます。', 'whitehomes' ); ?></span>
	</p>
	<p>
		<label><?php esc_html_e( 'サブタイトル（2 行目）', 'whitehomes' ); ?><br>
			<input type="text" name="whitehomes_popup_subtitle" value="<?php echo esc_attr( $subtitle ); ?>" placeholder="テーマ：「認知症対策について」" style="width:100%;">
		</label>
	</p>
	<p>
		<label><?php esc_html_e( '詳細 URL', 'whitehomes' ); ?><br>
			<input type="url" name="whitehomes_popup_url" value="<?php echo esc_attr( $url ); ?>" placeholder="https://..." style="width:100%;">
		</label>
		<span class="description"><?php esc_html_e( '空欄なら投稿自身へリンク。', 'whitehomes' ); ?></span>
	</p>
	<?php
}

function whitehomes_save_popup_meta( $post_id, $post ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( 'post' !== $post->post_type ) {
		return;
	}
	if ( ! isset( $_POST['whitehomes_popup_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['whitehomes_popup_nonce'] ) ), 'whitehomes_save_popup' ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( ! empty( $_POST['whitehomes_show_popup'] ) ) {
		update_post_meta( $post_id, '_whitehomes_show_popup', '1' );
	} else {
		delete_post_meta( $post_id, '_whitehomes_show_popup' );
	}

	$text_fields = array(
		'_whitehomes_popup_month'    => 'whitehomes_popup_month',
		'_whitehomes_popup_subtitle' => 'whitehomes_popup_subtitle',
	);
	foreach ( $text_fields as $meta_key => $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			$value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
			if ( '' === $value ) {
				delete_post_meta( $post_id, $meta_key );
			} else {
				update_post_meta( $post_id, $meta_key, $value );
			}
		}
	}

	$date_fields = array(
		'_whitehomes_popup_date_1' => 'whitehomes_popup_date_1',
		'_whitehomes_popup_date_2' => 'whitehomes_popup_date_2',
	);
	foreach ( $date_fields as $meta_key => $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			$raw = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
			if ( '' === $raw ) {
				delete_post_meta( $post_id, $meta_key );
			} elseif ( preg_match( '/^\d{4}-\d{2}-\d{2}$/', $raw ) ) {
				update_post_meta( $post_id, $meta_key, $raw );
			}
		}
	}

	if ( isset( $_POST['whitehomes_popup_url'] ) ) {
		$url = esc_url_raw( wp_unslash( $_POST['whitehomes_popup_url'] ) );
		if ( '' === $url ) {
			delete_post_meta( $post_id, '_whitehomes_popup_url' );
		} else {
			update_post_meta( $post_id, '_whitehomes_popup_url', $url );
		}
	}

	if ( isset( $_POST['whitehomes_popup_audience'] ) ) {
		$term_id = (int) $_POST['whitehomes_popup_audience'];
		if ( $term_id > 0 ) {
			wp_set_object_terms( $post_id, array( $term_id ), 'popup_audience', false );
		} else {
			wp_set_object_terms( $post_id, array(), 'popup_audience', false );
		}
	}
}
add_action( 'save_post', 'whitehomes_save_popup_meta', 10, 2 );
