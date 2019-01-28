<?php
include_once('../inc/common.php');

// ページ固有の設定変数
$TITLE       = 'Swiperサンプル';
$PAGENAME    = 'hoge3';
$DESCRIPTION = 'サンプルディスクリプションです。';
$KEYWORDS    = 'サンプルキーワード1,サンプルキーワード2';

// パンくず
$page_relation_list = [
    $TITLE => $PAGENAME, // 現在のページ
];
?>

<?php include_once(HTTP_PATH . '/head.php'); ?>

<main id="pagetop" class="l-page">
    <div class="l-page-header">
        <div class="l-page-header__inner">
            <h1 class="l-page-header__tit"><?= $TITLE ?></h1>
        </div>
    </div>
    <?= c_genBreadcrumbs($page_relation_list); ?>
    <div class="l-container">

        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="https://picsum.photos/1366/300" alt="ダミー画像"></div>
                <div class="swiper-slide"><img src="https://picsum.photos/1366/300" alt="ダミー画像"></div>
                <div class="swiper-slide"><img src="https://picsum.photos/1366/300" alt="ダミー画像"></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </div><!--/l-container-->
</main><!--/main-->

<?php include_once(HTTP_PATH . '/footer.php'); ?>
