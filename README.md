[簡易的な仕様書](https://docs.google.com/spreadsheets/d/1ipORPAk0xfJ4tmbIRVpkdpzZZPQWhMQMVK75dDDESas/edit#gid=682386544)　(修正してないので実際のものとは違う箇所が多くあります)

### アプリ概要

自己分析から企業ごとのメモまで、就活での情報を一括で管理することができるアプリ

### 技術スタック

frontend: Vue, Vuetify, TypeScript, ESLint, Vue-Test-Utils, Jest, Figma, StoryBook

backend: Laravel, Inertia, PHPUnit

infra: AWS(EC2, Route53), docker, MySQL, Vite

### 基本的な開発フロー

1.Figmaで画面のデザインをする。PC用とモバイル用の２種類を用意する。
2.StoryBookに共通化したいデザインのカタログを作成しておく。
3.機能の実装と、vue-test-utilsとPHPUnitへのテストコードの記述をする。
4.コードフォーマットとテストが完了し次第、Git上にプッシュする。
