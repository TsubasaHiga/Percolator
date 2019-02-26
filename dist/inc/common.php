<?php
// テスト環境か本番環境かを設定するファイルを読み込む
require_once(dirname(__FILE__) . '/common-env.php');
// 設定値を読み込む
require_once(dirname(__FILE__) . '/define-protocol.php');
require_once(dirname(__FILE__) . '/define-site.php');
// toolsを読み込む
require_once(dirname(__FILE__) . '/tools.php');


// 開発環境用
if (APPLICATION_ENV !== 'production') {
    // PHPエラーを表示する
    ini_set('display_errors', 1);
}
