---
name: wp-templatize
description: 静的 HTML のセクションを WordPress クラシックテーマの template-part (PHP) に変換する。img パスを get_template_directory_uri に、リンクや動的箇所を WP テンプレートタグに置換するときに使う。
---

# wp-templatize

`website/website/website/index-skill-responsive.html` の特定セクションを、`wordpress/theme/whitehomes/template-parts/section-<name>.php` として切り出すための変換ルール。

## 入力

- 元 HTML ファイル: `website/website/website/index-skill-responsive.html`
- 対象セクションのコメント区切り（例: `<!-- ABOUT -->` 〜 次の `<!--` まで）

## 出力

- `wordpress/theme/whitehomes/template-parts/section-<name>.php`
- 必要なら `front-page.php` に `<?php get_template_part('template-parts/section', '<name>'); ?>` の追記

## 変換ルール

1. **画像パス**
   - `src="img/foo.svg"` → `src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/foo.svg"`
   - 日本語ファイル名（例: `創業54年.png`）はリネームしない。そのまま `assets/img/` 配下にコピー。

2. **内部リンク**
   - `href="#mv"` のようなページ内アンカーは変更しない。
   - `href="#"` のダミーは、行先が判明するまで `href="#"` のまま残し、コメント `<!-- TODO: link -->` を直前に付ける。

3. **テキスト固定値で「あとから差し替えそうな箇所」**
   - 電話番号 / 営業時間 / 住所 / 店舗名 / SNS URL は **そのまま** PHP に書き写す（先回りで CF 化しない）。差し替え頻度が出てきた段階で `get_option()` か CF に移す。

4. **動的化が必要な箇所**
   - お知らせ（NEWS）セクションのカード一覧のみ `WP_Query( ['post_type' => 'post', ...] )` に置換する。それ以外は静的なまま。

5. **PHP ファイル冒頭**
   - 1 行目に `<?php` を置き、直後に `if ( ! defined( 'ABSPATH' ) ) { exit; }` を入れる。
   - その下にセクションの HTML を貼る。

6. **触らないもの**
   - `class` 属性、`data-*` 属性、`aria-*` 属性、`id` 属性は **一切変更しない**（CSS / JS が依存しているため）。
   - MV セクションの `.mv-pc` と `.mv-sp-wrap` の二重 DOM 構造は両方そのまま残す。

## チェック

変換後に以下を確認:
- [ ] `class`, `id`, `data-*`, `aria-*` が原文と完全一致
- [ ] `img` の `src` が全て `get_template_directory_uri()` 経由
- [ ] インラインスタイル / インライン `<script>` をうっかり残していない（JS は最終的に `assets/js/main.js` へ）
- [ ] `front-page.php` から `get_template_part` で呼ばれている

## 該当しない場合

- ブロックテーマ（FSE）の HTML テンプレート作成には使わない。本プロジェクトはクラシックテーマ。
- ヘッダ / フッタは template-parts ではなく `header.php` / `footer.php` に直接置く。
