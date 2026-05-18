# WordPress テーマ実装ルール（whitehomes）

このプロジェクトで WordPress テーマのコードを書くときは、以下を必ず守る。

## ファイル配置

- テーマ本体は `wp-content/themes/whitehomes/` に直接置く（リポジトリルート = WordPress ルート = `C:\xampp\htdocs\wordpress\`）。シンボリックリンクは使わない。
- セクション単位の PHP は `wp-content/themes/whitehomes/template-parts/section-<name>.php`。
- 画像は `wp-content/themes/whitehomes/assets/img/`、JS は `assets/js/`、追加 CSS は `assets/css/`。
- デザイン素材（リファレンス）は `_design-source/` 配下。テーマからは参照せず、移植元として読むだけ。

## PHP コーディング

- すべての PHP ファイルの先頭に `<?php` と `if ( ! defined( 'ABSPATH' ) ) { exit; }` を入れる。
- 出力エスケープを徹底:
  - URL: `esc_url()`
  - 属性値: `esc_attr()`
  - HTML 本文テキスト: `esc_html()`
  - 翻訳対象テキスト: `esc_html__( 'text', 'whitehomes' )` / `esc_html_e( ... )`
- パスは必ず `get_template_directory_uri()` / `get_stylesheet_uri()` 経由。相対パスや絶対 URL のベタ書きは禁止。
- `<?php bloginfo( 'charset' ); ?>` 等、`bloginfo()` で取れるものはハードコードしない。

## アセット読み込み

- CSS / JS は `<link>` / `<script>` をテンプレートに直書きせず、`functions.php` の `wp_enqueue_scripts` フックから `wp_enqueue_style` / `wp_enqueue_script` で登録。
- JS はフッター読み込み（`wp_enqueue_script( $handle, $src, $deps, $ver, true )` の第 5 引数 `true`）。
- バージョン引数には `filemtime( get_template_directory() . '/...' )` を使ってキャッシュバスティングする。
- Google Fonts（Noto Sans JP / Outfit）も `wp_enqueue_style` で。`<link>` のベタ書き禁止。

## テンプレート構造

- `header.php` / `footer.php` には必ず `wp_head()` / `wp_footer()` / `wp_body_open()` を入れる。
- `<body>` には `<?php body_class(); ?>`、`<article>` 等には `<?php post_class(); ?>`。
- `front-page.php` ではセクションを `get_template_part( 'template-parts/section', '<name>' )` で呼ぶ。HTML をそのまま貼らない。
- ループの内側で `get_template_part()` を使う際は `get_template_part( 'template-parts/content', get_post_type() )` のように post type 別を意識。

## 触ってはいけないもの

- 既存 HTML の `class` / `id` / `data-*` / `aria-*` 属性。CSS / JS が依存している。
- MV セクションの PC 用 `.mv-pc` と SP 用 `.mv-sp-wrap` の **二重 DOM**。両方残す。
- `style.css` のメディアクエリ群（≤480, ≤670, ≤760, ≤768, ≤840, 769–1024 など）。整理しない。
- `:root` のデザイントークン（`--orange #E67545` ほか）。値を変えない / リネームしない。
- アクセシビリティ属性と `@media (prefers-reduced-motion: reduce)` ブロック。

## カスタムフィールド方針

- 先回りで ACF / SCF を入れない。
- 「同じ箇所を編集する作業が 2 回以上発生した」「クライアントが触る前提の箇所」になった時点で初めて CF 化を検討する。
- CF を入れる際は、その時点でプラグイン選定（ACF / SCF / `register_meta`）の判断を別途行う。

## やらないこと

- ブロックテーマ化（FSE）/ `theme.json` 主体の構成への移行。
- webpack / Vite / Sass などビルドツールの導入。
- 既存日本語コピーの翻訳・改変（明示指示がある場合のみ可）。
- `wp-content/plugins/` への独自プラグイン作成（テーマ内で完結させる）。
- セキュリティチェックなしの `$_GET` / `$_POST` 取扱い。必要時は `wp_verify_nonce()` + `sanitize_text_field()` 等。

## コミット / 配布

- 本リポジトリは Git 管理下（`.git/` 既存）。コミットは通常通り運用可。
- `wp-config.php` / `wp-content/uploads/` / `wp-admin/` / `wp-includes/` 等 WordPress 本体・機微情報は `.gitignore` で除外する方針。`.gitignore` の見直しが追いついていない場合は、コミット前にステージ内容を確認する。
- 追跡対象は: `wp-content/themes/whitehomes/`、`_design-source/`、`.claude/`、`CLAUDE.md`、`.gitignore`。
