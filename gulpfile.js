'use strict';

/** ------------------------------------------------------------
*
* 初期設定（プラグイン読み込み、webpack設定、変数、入出力設定など）
*
* @description
    実行手順
    $ npm init -y
    $ npm i -D gulp gulp-plumber gulp-changed del browser-sync webpack webpack-stream gulp-sass gulp-autoprefixer gulp-imagemin imagemin-pngquant imagemin-mozjpeg
    $ npx gulp
    アンインストール
    $ npm uninstall -D package name
*
* -------------------------------------------------------------*/

// Load plugins
const autoprefixer      = require('gulp-autoprefixer');           //autoprefixer
const browserSync       = require('browser-sync').create();       //browser-sync
const css               = require('gulp-sass');                   //gulp-sass
const changed           = require('gulp-changed');                //ファイル変更検知
const del               = require("del");                         //ファイル削除
const gulp              = require("gulp");                        //gulp
const imagemin          = require('gulp-imagemin');               //imagemin
const mozjpeg           = require('imagemin-mozjpeg');            //mozjpeg
const plumber           = require('gulp-plumber');                //エラーによる強制停止を回避
const pngquant          = require('imagemin-pngquant');           //pngquant
const webpack           = require("webpack");                     //webpack
const webpackStream     = require("webpack-stream");              //webpack-stream


// webpackの設定ファイルの読み込み
const webpackConfig = require("./webpack.config");

// BrowserSyncの設定
const browsersync = {
    browser : 'google chrome',
    proxy   : 'https://localhost/fe_html5-template/dist',
    open    : 'local',
    sslkey  : '/Applications/MAMP/conf/apache/ssl/localhost.key',
    sslcrt  : '/Applications/MAMP/conf/apache/ssl/localhost.crt',
}

// 入出力設定
const input = {
    css : 'src/css/',
    img : 'src/images/',
    js  : 'src/js/'
};
const output = {
    css : 'dist/assets/css/',
    img : 'dist/assets/images/',
    js  : 'dist/assets/js/'
};





/** ------------------------------------------------------------
*
* 以下各種タスク記述
*
* @description
    - 可読性維持の為、タスク間は3行改行して記述する
    - 固有設定は変数として初期設定項目に記述する
    - なるべく簡潔な記述を行いメンテナンス性を維持する
*
* -------------------------------------------------------------*/

// BrowserSync - tsk is sync
gulp.task('sync', () => {
    browserSync.init({
        browser: browsersync.browser,
        proxy: browsersync.proxy,
        notify: false,
        open: browsersync.open,
        https: true,
        ghostMode: {
            clicks: false,
            forms: false,
            scroll: false
        },
        https: {
            key: browsersync.sslkey,
            cert: browsersync.sslcrt
        }
    });
});

// BrowserSync - task is reload
gulp.task('reload', () => {
    browserSync.reload();
});

// clean
gulp.task('clean', () => {
    return del(output.img  + '**/*.{png,jpg,gif,svg}');
});

// Scss compile
gulp.task('css', () => {
    return gulp
        .src(input.css + '**/*.scss')
        .pipe(plumber())
        .pipe(css({
            precision  : 5,
            outputStyle: 'compressed'
        }))
        .pipe(autoprefixer({
            browsers: ['> 0.5% in JP']
        }))
        .pipe(gulp.dest(output.css))
        .pipe(browserSync.stream());
});

// img compressed
gulp.task('img', () => {
    return gulp
        .src(input.img + '**/*.{png,jpg,gif,svg}')
        .pipe(plumber())
        .pipe(changed(output.img + '**/*.{png,jpg,gif,svg}'))  //srcとdistを比較して異なるものだけ処理
        .pipe(imagemin([
            pngquant({
                quality : [0.5, 0.9],
                speed   : 1,
                floyd   : 0
            }),
            mozjpeg({
                quality     : 85,
                progressive : true
            }),
            imagemin.svgo(),
            imagemin.optipng(),
            imagemin.gifsicle()
        ]))
        .pipe(gulp.dest(output.img));
});

// webpackStream
gulp.task("js", () => {
    return gulp
        .src(input.js + '**/*.js')
        .pipe(plumber())
        .pipe(webpackStream(webpackConfig, webpack))
        .pipe(gulp.dest(output.js))
        .pipe(browserSync.stream());
});

// Watch files
gulp.task('watch', () => {
    gulp.watch(input.css + '**/*.scss', gulp.task('css'));
    gulp.watch(input.img + '**/*', gulp.series('clean', 'img'));
    gulp.watch(input.js + '**/*.js', gulp.task('js'));
    gulp.watch('**/*.html', {interval: 250}, gulp.task('reload'));
    gulp.watch('**/*.php', {interval: 250}, gulp.task('reload'));
})

// default task
//gulp.task('default', gulp.series('watch'));
gulp.task('default', gulp.parallel('watch', 'sync'));
