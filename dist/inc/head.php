<?php
// ---------------------------------------
// head要素読み込み
// 2018/12/13 HigaTsubasa
// ---------------------------------------

//$PAGENAMEでcanonicalとogptypeの出力を変える
global $PAGENAME;
$PAGENAME === 'top' ? $ogtype = 'website' : $ogtype = 'article';
?>
<!doctype html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="skype_toolbar" content="skype_toolbar_parser_compatible">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="<?= $DESCRIPTION; ?>">
    <meta name="keywords" content="<?= $KEYWORDS; ?>">
    <meta property="fb:app_id" content="<?= FB_APPID; ?>">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:type" content="<?= $ogtype; ?>">
    <meta property="og:title" content="<?= $TITLE . '｜' . SITENAME; ?>">
    <meta property="og:description" content="<?= $DESCRIPTION; ?>">
    <meta property="og:url" content="<?= PAGEURL; ?>">
    <meta property="og:site_name" content="<?= SITENAME; ?>">
    <meta property="og:image" content="<?= SITEURL; ?>assets/images/ogpimg.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="<?= $DESCRIPTION; ?>">
    <meta name="twitter:title" content="<?= $TITLE; ?>">
    <meta name="twitter:image" content="<?= SITEURL; ?>assets/images/ogpimg.png">
    <title><?= $TITLE . '｜' . SITENAME; ?></title>
    <link rel="canonical" href="<?= PAGEURL; ?>">
    <link rel="shortcut icon" href="<?= SITEURL; ?>assets/images/favicon.ico">
    <!--Include CSS Resources | preload-->
    <link rel="preload" as="style" href="<?= SITEURL; ?>assets/css/style.css">
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700">
    <!--Include CSS Resources | normalload-->
    <link rel="stylesheet" href="<?= SITEURL; ?>assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700">
    <!--Include JavaScript Resources | preload-->
    <link rel="preload" as="script" href="<?= SITEURL; ?>assets/js/bundle.js">
    <?php
    include_once(HTTP_PATH . '/analytics-head.php');
    ?>
</head>

<body class="<?= $PAGENAME; ?>" id="top">
    <?php
    include_once(HTTP_PATH . '/analytics-body.php');
    include_once(HTTP_PATH . '/parts-header.php');
    ?>
