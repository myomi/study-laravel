# Study Laravel
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

5. ブラウザを開き、 http://localhost:8080 にアクセスすると、backend/public/index.php を表示する。


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


## メモ
### (1) プロジェクトを作る
/workspace で以下のコマンドを実行   
```sh
composer create-project --prefer-dist laravel/laravel backend
```

/workspace/backend で以下のコマンドを実行
```
php artisan key:generate
```

### (2) DBマイグレーションを始める
/workspace で以下のコマンドを実行
```sh
# サンプル用のDDLファイルが自動生成されているので消す
rm -rf backend/database/migrations
# マイグレーション開始
php backend/artisan migrate
```
これで、以下のマイグレーション管理用テーブルが生成される
- migrations

### (3) Eloquent Model Generatorをインストール
```
cd backend
composer require krlove/eloquent-model-generator --dev
```