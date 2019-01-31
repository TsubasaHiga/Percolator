<?php
/** ------------------------------------------------------------
*
* レスポンシブ用の画像出力（@2xまで対応）
*
* @param string $dir 画像のディレクトリとファイル名、拡張子までを設定
* @param string $alt 画像のaltを設定
* @return string htmlタグを返します
*
* -------------------------------------------------------------
*/
function c_getImages($dir, $alt)
{
    $dir_explode = explode(".", $dir);
    $SITEURL = SITEURL;

    $html = <<< EOM
    <source media="(max-width: 767px)" srcset="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-srcset="{$SITEURL}assets/images/{$dir_explode[0]}_sm.{$dir_explode[1]} 1x">
    <source media="(min-width: 768px)" srcset="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-srcset="{$SITEURL}assets/images/{$dir_explode[0]}_lg.{$dir_explode[1]} 1x,{$SITEURL}assets/images/{$dir_explode[0]}_lg@2x.{$dir_explode[1]} 2x"><img class="lazyload" src="{$SITEURL}assets/images/{$dir_explode[0]}_lg.{$dir_explode[1]}" alt="{$alt}">
EOM;

    return $html;
}


/** ------------------------------------------------------------
*
* コピーライトの日付を返す
*
* @param string $then サイトローンチ日の指定
* @return string サイトローンチ日に経過年を足した年を返します
* @link https://terkel.jp/archives/2010/12/auto-update-copyright-date-using-php/
*
* -------------------------------------------------------------
*/
function c_getCopyrighDate($then)
{
    $now = date('Y');
    if ($then < $now) {
        return $then.'–'.$now;
    } else {
        return $then;
    }
}


/** ------------------------------------------------------------
*
* パンくずリスト生成
*
* @param string $page_relation_list 兄弟関係のページが入った連想配列
* @return string htmlテキストを返します
*
* -------------------------------------------------------------
*/
function c_genBreadcrumbs($page_relation_list)
{
    $SITEURL         = SITEURL;
    $BREADCRUMBS_TOP = BREADCRUMBS_TOP;

    $html_first = <<< EOM
    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="{$BREADCRUMBS_TOP}" href="{$SITEURL}" class="home"><span property="name">{$BREADCRUMBS_TOP}</span></a><meta property="position" content="1"></span>
EOM;

    $i = 2;
    $html = "<div class='l-breadcrumbs' typeof='BreadcrumbList' vocab='https://schema.org/'>";
    $html .= "<div class='l-breadcrumbs__inner'>";
    $html .= $html_first;
    foreach ($page_relation_list as $page_name => $page_url) {
        $html .= "<span property='itemListElement' typeof='ListItem'>";
        $html .= "<a property='item' typeof='WebPage' title='{$page_name}' href='{$SITEURL}{$page_url}/'>";
        $html .= "<span property='name'>{$page_name}</span>";
        $html .= "</a>";
        $html .= "<meta property='position' content='{$i}'>";
        $html .= "</span>";
        $i ++;
    }
    $html .= "</div></div>\n";

    return $html;
}


/** ------------------------------------------------------------
*
* SNSシェアリンク生成
*
* @param string $title タイトルを指定します
* @param string $pageurl ページURLを指定します
* @param string $kind SNSの種類を指定します
* @param string $class aタグに指定するクラス名を指定します
* @return string $kindで指定したSNSのシェアリンク`<a>`タグを返します
*
* -------------------------------------------------------------
*/
function c_genSnsBtn($title, $pageurl, $kind, $class)
{
    $title    = rawurlencode($title);
    $pageurl  = rawurlencode($pageurl);
    $FB_APPID = FB_APPID;

    switch ($kind) {
        case 'TW':
            $html = <<< EOM
            <a class="{$class}" href="https://www.facebook.com/dialog/share?text={$title};url={$pageurl}" target="_blank" aria-label="twitter">twitter</a>
EOM;
            return $html;
            break;

        case 'FB':
            $html = <<< EOM
            <a class="{$class}" href="https://www.facebook.com/dialog/share?app_id={$FB_APPID}&display=popup&href={$pageurl}&redirect_uri={$pageurl}" target="_blank" aria-label="facebook">facebook</a>
EOM;
            return $html;
            break;

        case 'HB':
            $html = <<< EOM
            <a class="{$class}" href="http://b.hatena.ne.jp/add?mode=confirm&url={$pageurl}" target="_blank" aria-label="hatena">hatena</a>
EOM;
            return $html;
            break;

        case 'LN':
            $html = <<< EOM
            <a class="{$class}" href="http://line.me/R/msg/text/?{$title};url={$pageurl}" target="_blank" aria-label="line">line</a>
EOM;
            return $html;
            break;

        case 'PK':
            $html = <<< EOM
            <a class="{$class}" href="http://getpocket.com/edit?url={$title};url={$pageurl}" target="_blank" aria-label="pocket">pocket</a>
EOM;
            return $html;
            break;
    }
}
