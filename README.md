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
  * Docker (環境構築) -> ローカル環境がdarwin、docker上がLinuxとそれぞれ違うOSでうまく構築できなかったため保留
* その他
  * 国税庁 - 法人番号システムWeb-API

## DB設計

![ER図](https://github.com/IJproject/job-hunting-assistance/assets/113161429/ae39d914-e515-4dc7-a9d1-c71d986b3f9b)

## 画面設計

ここにFigmaで作成する画面設計の図を掲載予定

## 基本的な開発フロー

1. Figmaで画面のデザインをする。PC用とモバイル用の２種類を用意する。
2. StoryBookに共通化したいデザインのカタログを作成しておく。
3. 機能の実装と、vue-test-utilsとPHPUnitへのテストコードの記述をする。
4. コードフォーマットとテストが完了し次第、Git上にプッシュする。(GithubActionsで自動化の予定)

[簡易的な仕様書](https://docs.google.com/spreadsheets/d/1ipORPAk0xfJ4tmbIRVpkdpzZZPQWhMQMVK75dDDESas/edit#gid=682386544)　(修正してないので実際のものとは違う箇所が多くあります)

## 一言メモ

アプリケーションの特色上、SEO対策などもしないといけないからVueではなくNuxtやNextなどのSSRに変更した方がいいのだろうけどね、、、ま、いっか。

現状の構成は割とSSRを意識した構成(バックエンドとの通信の際に積極的にAPIを使用する)にしているから替えたいと思った時に変えます。
