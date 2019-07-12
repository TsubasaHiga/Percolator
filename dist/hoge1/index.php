<?php
require_once '../inc/common.php';

// ページ固有の設定変数
$TITLE       = 'html5マークアップテストユニット';
$PAGENAME    = 'hoge1';
$DESCRIPTION = 'サンプルディスクリプションです。';
$KEYWORDS    = 'サンプルキーワード1,サンプルキーワード2';

// パンくず
$page_relation_list = [
    $TITLE => $PAGENAME, // 現在のページ
];

require_once HTTP_PATH . '/head.php';
?>
<main id="pagetop" class="l-page">
    <div class="l-page-header">
        <div class="l-page-header__inner">
            <h1 class="l-page-header__tit"><?= $TITLE ?></h1>
        </div>
    </div>
    <?= c_genBreadcrumbs($page_relation_list); ?>
    <div class="l-container">

        <h1>見出し壱</h1>
        <h2>見出し弐</h2>
        <h3>見出し参</h3>
        <h4>見出し四</h4>
        <h5>見出し五</h5>
        <h6>見出し六</h6>
        <h2>引用 (Blockquote)</h2>
        一行の引用:
        <blockquote>貪欲であれ、愚かであれ</blockquote>
        引用元の参照のある複数行の引用:
        <blockquote>集中という意味は集中しなくてはいけないことにイエスということだと、人は言います。しかし、それはまったく違います。そうではなく、そこにある何百ものいいアイディアにノーということなのです。慎重に選択しなくてはいけません。実際、私は成し遂げたことと同じように成し遂げられなかったことにも満足しています。革新というのは1000ものことにノーということなのです。
            <cite>スティーブ・ジョブズ - 1997年 Apple 世界的開発者会議</cite>
        </blockquote>
        <h2>テーブル</h2>
        <table>
            <tbody>
                <tr>
                    <th>従業員</th>
                    <th class="views">給与</th>
                    <th></th>
                </tr>
                <tr class="odd">
                    <td><a href="http://example.com/">ジェーン</a></td>
                    <td>$￥1</td>
                    <td>スティーブ・ジョブズの必要な給与。</td>
                </tr>
                <tr class="even">
                    <td><a href="http://example.com">ジョン</a></td>
                    <td>￥10万</td>
                    <td>ブログのすべて。</td>
                </tr>
                <tr class="odd">
                    <td><a href="http://example.com/">ジェーン</a></td>
                    <td>￥1億</td>
                    <td>百聞は一見にしかず。だよね ? なのでトムは1000倍。</td>
                </tr>
                <tr class="even">
                    <td><a href="http://example.com/">ジェーン</a></td>
                    <td>￥1000億</td>
                    <td>これみたいな髪?! もういいよね…</td>
                </tr>
            </tbody>
        </table>
        <h2>定義リスト</h2>
        <dl>
            <dt>定義リストタイトル</dt>
            <dd>これは定義リストです。</dd>
            <dt>スタートアップ</dt>
            <dd>スタートアップ会社もしくはスタートアップとは、反復可能でスケーラブルなビジネスモデルを追い求める会社もしくは一時的な組織です。</dd>
            <dt>#dowork</dt>
            <dd>ロブ・ダイデクと彼の個人的なボディーガードのクリストファー"ビッグ・ブラック"ボイキンスが作った言い回しで、"仕事しよう" が自己動機付けとして、友達を動機付けるために機能する。</dd>
            <dt>ライブでやろう</dt>
            <dd>ビル・オライリーが <a title="We'll Do It Live" href="https://www.youtube.com/watch?v=O_HyZ5aW76c">説明</a> してもらいましょう。
            </dd>
        </dl>
        <h2>非順序リスト（ネスト化）</h2>
        <ul>
            <li>リストアイテム1
                <ul>
                    <li>リストアイテム1
                        <ul>
                            <li>リストアイテム1</li>
                            <li>リストアイテム2</li>
                            <li>リストアイテム3</li>
                            <li>リストアイテム4</li>
                        </ul>
                    </li>
                    <li>リストアイテム2</li>
                    <li>リストアイテム3</li>
                    <li>リストアイテム4</li>
                </ul>
            </li>
            <li>リストアイテム2</li>
            <li>リストアイテム3</li>
            <li>リストアイテム4</li>
        </ul>
        <h2>順序リスト</h2>
        <ol>
            <li>リストアイテム1
                <ol>
                    <li>リストアイテム1
                        <ol>
                            <li>リストアイテム1</li>
                            <li>リストアイテム2</li>
                            <li>リストアイテム3</li>
                            <li>リストアイテム4</li>
                        </ol>
                    </li>
                    <li>リストアイテム2</li>
                    <li>リストアイテム3</li>
                    <li>リストアイテム4</li>
                </ol>
            </li>
            <li>リストアイテム2</li>
            <li>リストアイテム3</li>
            <li>リストアイテム4</li>
        </ol>
        <h2>HTML 要素タグテスト</h2>
        他の HTML タグは <a href="http://ja.support.wordpress.com/code/" rel="nofollow">FAQ</a> をご覧ください。
        <strong>住所タグ</strong>
        以下は住所の例です。<code>&lt;address&gt;</code> タグを使用しています:
        <address>〒100-0000 東京都千代田区1-1-1 日本</address>
        <strong>anchor タグ (リンク)</strong>
        これは <a href="http://example.com/" rel="nofollow"><code>&lt;anchor&gt;</code></a> (もしくはリンクとも呼ばれます) の例です。
        <strong>abbr タグ</strong>
        この <abbr title="abbreviation">abbr</abbr> は文章の中にある &lt;abbr&gt; タグの例です。
        <strong>Cite タグ</strong>
        "Code is poetry." --<cite>WordPress</cite>
        <strong>Code タグ</strong>
        <code>&lt;code&gt;</code> タグはこのように使います: <code>word-wrap: break-word;</code>
        <strong>Delete タグ</strong>
        <code>&lt;del&gt;</code> タグは<del>打ち消し線</del>などで表現されますが、このタグは HTML5 ではサポートされていません (代わりに <code>&lt;strike&gt;</code> を使ってください)。
        <strong>Emphasize タグ</strong>
        <code>&lt;em&gt;</code> タグは<em>文章の強調</em>に使われます。欧文では斜体になっていることがよくあります。
        <strong>Insert タグ</strong>
        <code>&lt;ins&gt;</code> タグは<ins>挿入されたコンテンツ</ins>を意味します。
        <strong>Keyboard タグ</strong>
        このあまり知られていない <code>&lt;kbd&gt;</code> タグは <kbd>Ctrl</kbd> のようにキーボードテキストをエミュレートします。通常、<code>&lt;code&gt;</code> タグと同じようにスタイリングされます。
        <strong>Preformatted タグ</strong>
        <code>&lt;pre&gt;</code> タグは複数行のコードのスタイリングに使います。
        <pre>.post-title {
            margin: 0 0 5px;
            font-weight: bold;
            font-size: 38px;
            line-height: 1.2;
            and here's a line of some really, really, really, really long text, just to see how the PRE tag handles it and to find out how it overflows;
        }</pre>
        <strong>Quote タグ</strong>
        <q>デベロッパーズ、デベロッパーズ, デベロッパーズ...</q> --スティーブ・バルマー
        <strong>Strong タグ</strong>
        このタグは<strong>太字</strong>テキストを表しています。
        <strong>Subscript タグ</strong>
        Subscript タグ <code>&lt;sub&gt;</code> を使うと H<sub>2</sub>O のような表示の際に「2」が下付きになります。
        <strong>Superscript タグ</strong>
        Superscript タグ <code>&lt;sup&gt;</code> を使うと E = MC<sup>2</sup> のような表示の際に「2」が上付きになります。
        <strong>Variable タグ</strong>
        変数や引数を表す <var>variables</var> タグです。

    </div>
</main>
<?php require_once HTTP_PATH . '/footer.php'; ?>
