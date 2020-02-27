# Study Laravel
## これはなに？
Laravelを使ったアプリケーション開発のひな形です。

### 必要ツール
- Docker
- VSCode (Remote Container機能を利用して開発します)

### 構成
- PHP7
- Nginx 1.17
- PostgreSQL 12.2

## 使い方
1. VSCodeのRemote Containerでこのプロジェクトを開く

2. (初回のみ) ターミナルで以下を実行する。
```sh
cd backend
# 依存ライブラリのインストール
composer install
# .envファイルを作成する
cp .env.example .env
# APP keyの生成
php artisan key:generate
```

3. backend/.env をVSCodeで開き、DB関連の設定を以下のように変更します。
```ini
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=laravel_db
DB_USERNAME=postgres
DB_PASSWORD=ZtG*GSdvdT_W
```

4. 以下のコマンドを実行して、DBのテーブル生成・テスト用データの登録を行います。
```sh
php backend/artisan migrate:refresh --seed
```

5. ブラウザを開き、 http://localhost:8080 にアクセスすると、backend/resources/views/welcome.blade.php を表示する。
上記のページに加え、 WEB API `GET http://localhost:8080/api/users` も用意している。併せて試してみてください。


## PHPプロセスのデバッグ方法
1. VSCodeのデバッグpaneを開く
2. Listen for XDebug の実行ボタンを押す
3. デバッグしたい箇所にブレイクポイントをおき、ブラウザでデバッグしたいページないしはAPIにアクセスする


## トラブルシュート
### php Dockerfileのapt update で “Release file is not yet valid” のようなエラーが出る
Docker for windows を再起動し、VSCodeのコマンド **Remote-Containers: Rebuild Container** を実行する

### http:localhost:8080 にアクセスすると、autoload.phpが見つからないとエラーが出る
以下のようなエラーが出た場合

> Warning: require(/var/www/html/public/../vendor/autoload.php): failed to open stream: No such file or directory in /var/www/html/public/index.php on line 24

composer install に失敗して、ダウンロードできてない依存ライブラリがある。以下の手順でもう一度ダウンロードし直す
```sh
cd backend
rm -rf vendor
composer install
```

## ドキュメント
このプロジェクトひな形を使って、アプリケーションを開発するための手順は以下のドキュメントを参照してください。

- [WEB APIの開発方法](./docs/api.md)
- [Database関連の開発方法](./docs/database.md)
- [コーディング規約](./docs/coding_conventions.md)
- [(参考資料)このプロジェクトひな形を作ったときに行った作業メモ](./docs/how_to_create_laravel_project.md)