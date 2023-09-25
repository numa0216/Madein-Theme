
// モード
"use strict";

// 環境変数読み込み
require('dotenv').config() // dotenv読み込み
const Ip = process.env.IP // .env.IP 環境変数の取得

// モジュール読み込み
const gulp = require("gulp");
const sass = require("gulp-sass")(require('sass'));
const sourcemaps = require("gulp-sourcemaps");
const sassParent = require("gulp-sass-parent"); // 親子関係を解決
const cache = require("gulp-cached");
const browserSync = require("browser-sync");
const plumber = require('gulp-plumber');

// リロードファイル
const reloadFile = (done) => {
  browserSync.init({
    proxy: Ip + ":8080", // ローカルにある「Site Domain」に合わせる
    notify: false, // ブラウザ更新時に出てくる通知を非表示にする
    open: "external", // ローカルIPアドレスでサーバを立ち上げる
  });
  done();
};

// リロード設定
const reloadBrowser = (done) => {
  browserSync.reload();
  done();
};

// SASS src
const paths = {
  src: "src/assets/scss/*.scss", // コンパイル対象
  parent: "src/assets/scss", // 親ディレクトリ
  dest: "src/assets/css", // 出力先
};

// sassコンパイル
const compileSass = (done) => {
  gulp
    .src(paths.src)
    .pipe(plumber())
    .pipe(cache("sass"))
    .pipe(sassParent({ dir: paths.parent })) // ファイルキャッシュ時でも親子関係を解決する
    .pipe(sourcemaps.init())
    .pipe(
      sass({
        outputStyle: "expanded",
      })
    )
    .pipe(sourcemaps.write("."))
    .on("error", sass.logError)
    .pipe(gulp.dest(paths.dest));
  done();
};

// タスク定義
exports.compileSass = compileSass;
exports.reloadFile = reloadFile;

// 監視ファイル
const watchFiles = (done) => {
  gulp.watch(paths.src, compileSass);
  gulp.watch(["./**", "!src/assets/css/*.*"], reloadBrowser);
  done();
};

// タスク実行
exports.default = gulp.series(
  watchFiles, reloadFile, compileSass
);

// END OF FILE