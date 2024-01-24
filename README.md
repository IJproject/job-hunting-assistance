## アプリ概要

自己分析から企業ごとのメモまで、就活での情報を一括で管理することができるアプリ

## 技術スタック

* フロントエンド
  * Vue, Vuetify, TypeScript (実装)
  * Figma, StoryBook (デザイン)
  * ESLint, Prettier (コード統一)
  * Vue-Test-Utils, Jest (テスト)
  * Vite (ビルドツール)
* バックエンド
  * Laravel, Inertia (実装)
  * PHPUnit (テスト)
* インフラ
  * AWS(EC2, Route53) (デプロイ)
  * MySQL (データベース)
  * Docker (環境構築)

## DB設計

![er](https://github.com/IJproject/job-hunting-assistance/assets/113161429/833378f4-6d3e-48b9-ad9d-1c0999b1bd2d)

## 画面設計

ここにFigmaで作成する画面設計の図を掲載予定

## 基本的な開発フロー

1. Figmaで画面のデザインをする。PC用とモバイル用の２種類を用意する。
2. StoryBookに共通化したいデザインのカタログを作成しておく。
3. 機能の実装と、vue-test-utilsとPHPUnitへのテストコードの記述をする。
4. コードフォーマットとテストが完了し次第、Git上にプッシュする。(GithubActionsで自動化の予定)

[簡易的な仕様書](https://docs.google.com/spreadsheets/d/1ipORPAk0xfJ4tmbIRVpkdpzZZPQWhMQMVK75dDDESas/edit#gid=682386544)　(修正してないので実際のものとは違う箇所が多くあります)
