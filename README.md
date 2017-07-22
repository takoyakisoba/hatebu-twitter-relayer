# Hatebu-Twitter-Relayer

## 何する人？
はてなブックマークのWebhookを受け取り、規定したフォーマットに整形してTwitterにポストする人。
ノーマルのはてぶ <-> Twitter連携だとメッセージの自由度が足りないかた向け。

## 動作要件
* PHP 7以上
* make

## インストール
0. このリポジトリをクローン
    * `https://github.com/mohimovi/hatebu-twitter-relayer.git`
0. 依存パッケージをインストール
    * `make setup`
0. 環境変数 (Twitter APIのクレデンシャル、はてぶとの事前共有鍵) を設定
    * `cp .env.example .env` したあと、 `.env` を編集
0. Webサーバの設定
    * すべてのリクエストを `public/index.php` にhandleさせる
    * エンドポイント: `http://some-domain.com/webhook/hatebu-notification`
        * エンドポイントは`config/routes.php` で変更可能
0. はてぶの設定
    * `http://b.hatena.ne.jp/$USER_NAME/config#tabmenu-config_table_coop`
    * 「受け取るイベントの種類」は、「ブックマークの追加/更新/削除」を選択

## ライセンス
[MIT License](https://osdn.jp/projects/opensource/wiki/licenses%2FMIT_license)

## 作った人
[@pinkumohikan](https://github.com/pinkumohikan)
