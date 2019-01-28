# html5-template

![facebook_cover_photo_2](https://user-images.githubusercontent.com/33184716/51615853-2f2e4000-1f6c-11e9-853d-35bdd1882004.png)

PHPで構築された一般的な静的サイト構築に最適なHTML5標準対応の初期構築テンプレートです。なるべくモダンな仕様で低コスト開発出来るよう定期的にアップデートしております。スモールスタート・LP開発・小規模静的サイトとの相性が高いです。

## Install & Use

リポジトリよりクローンを行い、`npm -i`をして頂くだけで準備が整います。

```bash
$ git clone https://github.com/TsubasaHiga/fe_html5-template.git
$ npm i
```

gulp起動は`npx gulp`で可能です。標準で`browser-sync`を導入済み。

```bash
$ npx gulp
```

## Documentation

基本的にnpm環境があれば即使用することが可能です。Gulp4系対応済み。

| 項目                           | 内容                  |
| ------------------------------ | --------------------- |
| コンパイル環境、タスクランナー | npm + Gulp4 + Webpack |
| CSS トランスパイラ             | npm + Gulp            |
| CSS 設計                       | FLOCSS                |
| JavaScript モジュールバンドラ  | npm + Webpack         |
| JavaScript ライブラリ          | Vanilla JS（Pure JS） |
| パッケージマネージャー         | npm                   |

## Directory structure

`tree -a -I "node_modules|.git" -N -L 2 --dirsfirst`で表示したディレクトリ構造

```
.
|-- dist
|   |-- assets
|   |-- hoge1
|   |-- hoge2
|   |-- hoge3
|   |-- hoge4
|   |-- inc
|   `-- index.php
|-- src
|   |-- css
|   |-- images
|   `-- js
|-- .gitignore
|-- .htaccess
|-- LICENSE
|-- README.md
|-- gulpfile.js
|-- package-lock.json
|-- package.json
`-- webpack.config.js
```

## Code Standard

デフォルトは[PSR-2](https://www.php-fig.org/psr/psr-2/)です。

## Browser support

サポートしているブラウザは以下の通りです。基本的にはモダンブラウザの内（[> 0.5% in JP](https://browserl.ist/?q=%3E+0.5%25+in+JP)）に該当するブラウザをデフォルト対応と致します。

### PC

- Chrome
- Edge
- Firefox
- IE11
- Safari - macOS

### Mobile

- Chrome - Android
- Safari - iOS

## History

プロジェクト管理の履歴を残しておきます。

|             Deta              | Detail                                                       | Public or Private | Repository                                                   |
| :---------------------------: | ------------------------------------------------------------ | ----------------- | ------------------------------------------------------------ |
|        2019.01.28<br>-        | パブリック版として開発開始。コミットログを持たない様最新ファイルのみインポートしたリポジトリを別途用意。 | Public            | https://github.com/TsubasaHiga/fe_html5-template             |
| 2019.01.22<br>-<br>2019.01.28 | 正式にhtml5テンプレートとして開発開始する為別途リポジトリ用意。凍結。 | Private           | https://github.com/TsubasaHiga/fe_template_html5             |
| 2018.04.25<br>-<br>2019.01.22 | 社内Fork版として開発開始。各種テンプレート管理リポジトリの1つとして管理。 | Private           | https://github.com/TsubasaHiga/fe_template/tree/master/html5 |

## License

MIT License
