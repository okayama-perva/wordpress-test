---
description: index-skill-responsive.html の指定セクションを template-parts/section-<name>.php として切り出す
argument-hint: <section-name>（例: about / business / strengths / service / news / stores / sns / torikumi / cta）
---

引数 `$ARGUMENTS` で指定されたセクション名のテンプレートパートを作成してください。

## 手順

1. `website/website/website/index-skill-responsive.html` を Read し、`<!-- $ARGUMENTS -->`（大文字小文字を無視）のコメント区切りから次の `<!--` までを対象範囲として抽出する。見つからない場合は、入っていそうな別表記（例: `BUSINESS BANNER` / `BUSINESS`）も探す。

2. `wp-templatize` Skill の変換ルールに完全に従って `wordpress/theme/whitehomes/template-parts/section-$ARGUMENTS.php` を作成する:
   - 1 行目 `<?php` + `ABSPATH` ガード
   - `img` の `src` を `get_template_directory_uri()` 経由に置換
   - `class` / `id` / `data-*` / `aria-*` は原文と完全一致を維持
   - 電話番号・住所などの固定値は先回りで CF 化しない
   - インライン `<script>` / インラインスタイルは取り除く（あれば別途報告）

3. `wordpress/theme/whitehomes/front-page.php` が既にあれば、適切な位置に `<?php get_template_part( 'template-parts/section', '$ARGUMENTS' ); ?>` を追記する。まだ無い場合はその旨を伝えるだけで、`front-page.php` 自体は作らない（雛形作成は別タスク）。

4. 完了後、変換時に判断が必要だった箇所（リンク先未定の `href="#"`、動的化保留にした箇所など）を箇条書きで報告する。長文の要約は不要。

## やらないこと

- テーマ本体（`style.css` / `functions.php` / `header.php` など）の新規作成。
- 画像ファイルの物理コピー（パスだけ書き換える）。
- `class` の整理やリファクタ。
