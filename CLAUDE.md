# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## 必読ルール

実装時は `.claude/rules/wp-theme-rules.md` のルールに従う（ファイル配置 / PHP エスケープ / アセット読み込み / 触ってはいけないもの / CF 方針 など）。

## プロジェクトのゴール

`website/website/website/` 配下にある静的 HTML / CSS / 画像を素材として、株式会社ホワイトホームズの **WordPress クラシックテーマをゼロから構築する**。テーマ構造の作成・カスタムフィールド・メニュー / リンク設定・パーマリンクなど、WordPress 側の設定一式を整える。

## 開発スタック・配置

- **ローカル環境**: XAMPP / MAMP（Apache + MySQL + PHP）。`htdocs` 配下に WordPress 本体を展開する想定。
- **テーマ形式**: クラシックテーマ（`functions.php` + `header.php` / `footer.php` / `front-page.php` などの PHP テンプレート分割）。ブロックテーマ / FSE は使わない。
- **カスタムフィールド**: 必要になった時点で都度判断。まずは標準機能のみで進め、繰り返し編集が必要な箇所が出てきたら ACF / SCF / `register_meta` のどれを使うか検討する。**先回りでプラグインを入れない**。
- **テーマフォルダの置き場所**: 本リポジトリ内の **別フォルダ**（例: `wordpress/theme/whitehomes/`）でテーマを管理し、XAMPP 側の `htdocs/<site>/wp-content/themes/whitehomes/` へシンボリックリンク（または同期コピー）で反映する。`wp-content/themes/` 直下で直接編集はしない。

## 素材（静的 HTML）の場所

```
wordpress/website/website/website/
├── index-skill-responsive.html   ← 全セクションのマークアップ元
├── style.css                     ← テーマ style.css のベース
└── img/                          ← 画像（assets/img/ などへ移植）
```

`wordpress/website/__MACOSX/` は macOS のアーカイブ残骸なので無視。

## 静的 HTML → クラシックテーマへの分割方針

`index-skill-responsive.html` は単一の長いページ。WordPress 化する際は以下のように分割する想定:

- `header.php` — `<head>` 〜 `<header>` ブロック（行 1〜46 相当） + モバイルナビ（行 48〜67）。`wp_head()` / `body_class()` / `wp_body_open()` を必ず差し込む。
- `footer.php` — フッター（行 696〜774） + インライン `<script>`（行 776〜905）。スクリプトは最終的に `assets/js/main.js` に切り出し、`wp_enqueue_script` でフッター読み込みに移す。
- `front-page.php` — トップ用テンプレート。MV / ABOUT / BUSINESS / STRENGTHS / SERVICE / NEWS / STORES / SNS / TORIKUMI / CTA の各セクションを順番に呼び出す。
- `template-parts/` — セクション単位（`section-mv.php`, `section-about.php`, `section-business.php`, `section-strengths.php`, `section-service.php`, `section-news.php`, `section-stores.php`, `section-sns.php`, `section-torikumi.php`, `section-cta.php` 等）に分け、`get_template_part()` で呼び出す。
- `functions.php` — テーマセットアップ（`add_theme_support`）、`wp_enqueue_style` / `wp_enqueue_script`、ナビメニュー登録、カスタム投稿タイプ登録（必要になったら）など。
- `style.css` — 先頭に WordPress テーマヘッダコメント（`Theme Name:` など）を付け、現行 `style.css` の中身をそのまま下に続ける。

セクション位置の目安は `website/website/website/index-skill-responsive.html` 内の `<!-- ABOUT -->` / `<!-- BUSINESS -->` などのコメントを参照。

## WordPress 側で設定すべき項目（チェックリスト）

実装フェーズで都度埋めていく前提のチェックリスト:

- **基本設定**: サイトタイトル / キャッチフレーズ / 管理者メール / タイムゾーン（Asia/Tokyo） / 日付表記。
- **パーマリンク**: 「投稿名」を基本に、必要に応じて `/news/%postname%/` などにカスタマイズ。
- **表示設定**: フロントページ → 固定ページ（「ホーム」）に設定。投稿ページ → 「お知らせ（news）」に設定。
- **メニュー**: グローバルナビ（ヘッダ）／モバイルナビ／フッターナビ 1 / フッターナビ 2 を `register_nav_menus()` で登録し、管理画面の「メニュー」で構成。
- **カスタム投稿タイプ**（必要に応じ追加）: `news`（お知らせ）、`event`（セミナー / イベント MV カード）、`store`（店舗）など。
- **カスタムタクソノミー**: 必要に応じ `news_category` 等。
- **カスタムフィールド**: 電話番号・営業時間・店舗住所・SNS リンクなど、頻繁に差し替わる項目を切り出す。プラグイン採否は実装時に決める。
- **ウィジェット / theme.json**: クラシックテーマなので基本は不要。`add_theme_support('title-tag')` / `'post-thumbnails'` / `'html5'` などは入れる。

## ローカル開発の流れ

1. XAMPP の Apache / MySQL を起動。`http://localhost/phpmyadmin/` で DB を作成（例: `whitehomes_local`）。
2. `htdocs/whitehomes/` に WordPress 本体を展開し、ブラウザでセットアップウィザードを実行。
3. 本リポジトリの `wordpress/theme/whitehomes/` を `htdocs/whitehomes/wp-content/themes/whitehomes/` にシンボリックリンク（PowerShell: `New-Item -ItemType SymbolicLink -Path <dest> -Target <src>`、要管理者）。
4. 管理画面 → 外観 → テーマ で「whitehomes」を有効化。
5. 画像は `assets/img/` 配下にコピーし、テンプレートからは `<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/...` で参照。**`img/` 直下の日本語ファイル名はリネームせず維持**（HTML 側参照と一致させる）。

## 既存 HTML を移植するときの注意

- **ハードコードされたパスを書き換える**: `src="img/..."` / `href="style.css"` などはすべて `get_template_directory_uri()` / `get_stylesheet_uri()` 経由に置換。
- **MV は PC/SP 二重 DOM**: `.mv-pc` と `.mv-sp-wrap` は両方残す。CSS で表示切替しているため、片方だけテンプレートに移すと壊れる。
- **ブレークポイントは触らない**: `style.css` の `@media` 群（768 がメイン切替）はそのまま `style.css` に維持。テーマ化を理由に整理しない。
- **CSS デザイントークン** は `:root` の変数（`--orange #E67545` ほか）をそのまま使う。
- **インライン JS の責務**（アコーディオン / ハンバーガー / イベントカード閉じる / スクロール出現 / カウントアップ）は最終的に `assets/js/main.js` に切り出し、`wp_enqueue_script` でフッター（`in_footer = true`）から読み込む。アコーディオンの `onclick="toggleAcc(this)"` は addEventListener へ書き換える前提。
- **フォント読み込み**: `Noto Sans JP`（本文）と `Outfit`（数字 / ラテン表示）は `wp_enqueue_style` で読み込む。本文 / 数字の使い分けを変えない。
- **アクセシビリティ属性**（`aria-*` / `:focus-visible` / `prefers-reduced-motion`）は移植時に欠落させない。

## Figma 連携

`website/website/website/.claude/settings.local.json` で Figma MCP サーバ (`figma-developer-mcp`) が事前許可されている。レイアウト確認や差分実装の際は Figma ノードを参照しながら作業する想定。

## やらないこと

- ブロックテーマ化 / FSE 化。
- ビルドツール（webpack / Vite / Sass）の追加。当面は素の CSS / JS で進める。
- プラグインの先回り導入。必要になった機能だけ最小構成で入れる。
- 既存日本語コピーの翻訳・改変（指示が無い限り）。
