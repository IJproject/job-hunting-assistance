module.exports = {
  // Vueファイルを処理するためのトランスフォーマー
  transform: {
    ".*\\.(vue)$": "@vue/vue3-jest",
    "^.+\\.js$": "babel-jest"
  },
  
  // テストファイルが存在するディレクトリ
  testMatch: [
    "<rootDir>/resources/js/Test/**/*.test.js",
  ],

  // テスト中に無視するファイルやディレクトリ
  testPathIgnorePatterns: ["/node_modules/"],

  // モジュール名のエイリアス設定
  // moduleNameMapper: {
  //   "^@/(.*)$": "<rootDir>/resources/js/$1"
  // },

  // Jestが環境をセットアップするためのファイル
  // setupFiles: ["<rootDir>/jest.setup.js"],

  // スナップショットのシリアライザ
  // snapshotSerializers: ["jest-serializer-vue"]
};