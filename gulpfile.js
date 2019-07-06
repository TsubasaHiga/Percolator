"use strict";

/**
 *
 * 初期設定（プラグイン読み込み、webpack設定、変数、入出力設定など）
 *
 * @description
 *
 */

// Load plugins.
const autoprefixer = require("gulp-autoprefixer");
const browserSync = require("browser-sync").create();
const css = require("gulp-sass");
const changed = require("gulp-changed");
const cssnano = require("cssnano");
const cssDeclarationSorter = require("css-declaration-sorter");
const del = require("del");
const gulp = require("gulp");
const imagemin = require("gulp-imagemin");
const mozjpeg = require("imagemin-mozjpeg");
const mqpacker = require("css-mqpacker");
const plumber = require("gulp-plumber");
const pngquant = require("imagemin-pngquant");
const postcss = require("gulp-postcss");
const webpack = require("webpack");
const webpackStream = require("webpack-stream");

// webpackの設定ファイルの読み込み.
const webpackConfig = require("./webpack.config");

// BrowserSyncの設定.
const browsersync = {
  browser: "google chrome",
  proxy: "http://localhost/Percolator/dist/",
  open: "local"
};

// 入出力設定.
const input = {
  css: "src/css/",
  img: "src/images/",
  js: "src/js/"
};
const output = {
  css: "dist/assets/css/",
  img: "dist/assets/images/",
  js: "dist/assets/js/"
};

/**
 *
 * 以下各種タスク記述
 *
 * @description
     - 可読性維持の為、タスク間は3行改行して記述する
     - 固有設定は変数として初期設定項目に記述する
     - なるべく簡潔な記述を行いメンテナンス性を維持する
 *
 */

// BrowserSync - tsk is sync.
gulp.task("sync", () => {
  browserSync.init({
    browser: browsersync.browser,
    proxy: browsersync.proxy,
    notify: false,
    open: browsersync.open,
    ghostMode: {
      clicks: false,
      forms: false,
      scroll: false
    }
  });
});

// BrowserSync - task is reload.
gulp.task("reload", () => {
  browserSync.reload();
});

// Clean.
gulp.task("clean", () => {
  return del(output.img + "**/*.{png,jpg,gif,svg}");
});

// Scss compile.
gulp.task("css", () => {
  return gulp
    .src(input.css + "**/*.scss")
    .pipe(
      plumber({
        errorHandler: err => {
          console.log(err.messageFormatted);
          this.emit("end");
        }
      })
    )
    .pipe(
      css({
        precision: 5,
        outputStyle: "compressed"
      })
    )
    .pipe(autoprefixer({}))
    .pipe(
      postcss([
        mqpacker(),
        cssnano({ autoprefixer: false }),
        cssDeclarationSorter({
          order: "smacss"
        })
      ])
    )
    .pipe(gulp.dest(output.css))
    .pipe(browserSync.stream());
});

// CCSS.
// gulp.task('critical-css', () => {
//   return gulp
//     .src(output.css + 'style.css')
//     .pipe(
//       criticalCss({
//         out       : 'critical.css',
//         url       : 'http://cofus.work',
//         width     : 1366,
//         height    : 900,
//         userAgent :
//           'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'
//       })
//     )
//     .pipe(replace('../', '//cofus.work:3000/assets/'))
//     .pipe(
//       css({
//         precision   : 5,
//         outputStyle : 'compressed'
//       })
//     )
//     .pipe(gulp.dest(output.css + '/css/'));
// });

// Img compressed
gulp.task("img", () => {
  return gulp
    .src(input.img + "**/*.{png,jpg,gif,svg}")
    .pipe(
      plumber({
        errorHandler: err => {
          console.log(err.messageFormatted);
          this.emit("end");
        }
      })
    )
    .pipe(changed(output.img + "**/*.{png,jpg,gif,svg}")) //srcとdistを比較して異なるものだけ処理
    .pipe(
      imagemin([
        pngquant({
          quality: [0.5, 0.9],
          speed: 1,
          floyd: 0
        }),
        mozjpeg({
          quality: 85,
          progressive: true
        }),
        imagemin.svgo(),
        imagemin.optipng(),
        imagemin.gifsicle()
      ])
    )
    .pipe(gulp.dest(output.img));
});

// WebpackStream
gulp.task("js", () => {
  return gulp
    .src(input.js + "**/*.js")
    .pipe(
      plumber({
        errorHandler: err => {
          console.log(err.messageFormatted);
          this.emit("end");
        }
      })
    )
    .pipe(webpackStream(webpackConfig, webpack))
    .pipe(gulp.dest(output.js))
    .pipe(browserSync.stream());
});

// Watch files
gulp.task("watch", () => {
  gulp.watch(input.css + "**/*.scss", gulp.task("css"));
  gulp.watch(input.img + "**/*", gulp.series("clean", "img"));
  gulp.watch(input.js + "**/*.js", gulp.task("js"));
  gulp.watch("**/*.html", { interval: 250 }, gulp.task("reload"));
});

// Default task
// gulp.task('default', gulp.series('watch'));

// Defalut + Sync task.
gulp.task("default", gulp.parallel("watch", "sync"));
