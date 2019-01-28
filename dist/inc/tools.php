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
