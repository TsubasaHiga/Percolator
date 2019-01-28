<?php
include_once('../inc/common.php');

// ページ固有の設定変数
$TITLE       = 'サンプルページ2';
$PAGENAME    = 'hoge2';
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

        <picture class="image"><?= c_getImages($dir = 'sample/sample1.png', $alt = 'サンプル画像1'); ?></picture>
        <p>サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。</p>
        <p>サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。</p>
        <p>サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。サンプルテキストです。</p>

    </div><!--/l-container-->
</main><!--/main-->

<?php include_once(HTTP_PATH . '/footer.php'); ?>
