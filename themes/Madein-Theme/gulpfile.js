//----------------------------------------------------------------------
//  モード
//----------------------------------------------------------------------
"use strict";

//----------------------------------------------------------------------
//  モジュール読み込み
//----------------------------------------------------------------------
const gulp = require("gulp");
const { src, dest, series, parallel, watch, tree } = require("gulp");
// Sassをコンパイルするプラグインの読み込み
const sass = require("gulp-sass")(require("sass"));

const bs = require("browser-sync");

//----------------------------------------------------------------------
//  関数定義
//----------------------------------------------------------------------
function bsInit(done) {
  bs.init({
    proxy: "localhost:8000",       // ローカルにある「Site Domain」に合わせる
    notify: false,                  // ブラウザ更新時に出てくる通知を非表示にする
    open: "external",               // ローカルIPアドレスでサーバを立ち上げる
  });

  done();
}

function bsReload(done) {
  bs.reload();

  done();
}

function watchTask(done) {
  watch(["./**", "!./*.css"], series(bsReload));    //	監視対象とするパスはお好みで
}

//----------------------------------------------------------------------
//  タスク定義
//----------------------------------------------------------------------
exports.bs = series(bsInit, bsReload, watchTask);


//----------------------------------------------------------------------
//  SASS コンパイル
//----------------------------------------------------------------------

gulp.task('sass',  () => {
  return gulp.watch("assets/scss/common.scss", () => {
      return gulp
      .src('assets/scss/common.scss')
      .pipe(sass({
                  outputStyle: 'expanded'
              })
          )
      .pipe(gulp.dest('assets/css'));
  });
});

/************************************************************************/
/*  END OF FILE                                                         */
/************************************************************************/