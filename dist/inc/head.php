<?php
//$PAGENAMEでcanonicalとogptypeの出力を変える
global $PAGENAME;
$PAGENAME === 'top' ? $ogtype = 'website' : $ogtype = 'article';
?>
<!doctype html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <title><?= $TITLE . '｜' . SITENAME; ?></title>
    <meta name="description" content="<?= $DESCRIPTION; ?>">
    <meta name="author" content="HigaTsubasa｜COFUS">
    <link rel="canonical" href="<?= PAGEURL; ?>">

    <meta property="og:locale" content="ja_JP">
    <meta property="og:type" content="<?= $ogtype; ?>">
    <meta property="og:title" content="<?= $TITLE . '｜' . SITENAME; ?>">
    <meta property="og:description" content="<?= $DESCRIPTION; ?>">
    <meta property="og:url" content="<?= PAGEURL; ?>">
    <meta property="og:site_name" content="<?= SITENAME; ?>">
    <meta property="og:image" content="<?= SITEURL; ?>assets/images/ogpimg.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="fb:app_id" content="<?= FB_APPID; ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@_cofus">
    <meta name="twitter:creator" content="@_cofus">

    <link rel="shortcut icon" href="<?= SITEURL; ?>assets/images/favicon.ico">

    <link rel="preload" as="style" href="<?= SITEURL; ?>assets/css/style.css">
    <link rel="preload" as="script" href="<?= SITEURL; ?>assets/js/bundle.js">
    <link rel="stylesheet" href="<?= SITEURL; ?>assets/css/style.css">
    <?php
    require_once HTTP_PATH . '/analytics-head.php';
    ?>
</head>

<body class="<?= $PAGENAME; ?>" id="top">
    <?php
    require_once HTTP_PATH . '/analytics-body.php';
    require_once HTTP_PATH . '/parts-header.php';
    ?>
