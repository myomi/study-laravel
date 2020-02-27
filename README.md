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
3. ブラウザを開き、 http://localhost:8080 にアクセスすると、backend/public/index.php を表示する。


## PHPプロセスのデバッグ方法
1. VSCodeのデバッグpaneを開く
2. Listen for XDebug の実行ボタンを押す
3. デバッグしたい箇所にブレイクポイントをおき、実行


## トラブルシュート
### php Dockerfileのapt update で “Release file is not yet valid” のようなエラーが出る
Docker for windows を再起動し、VSCodeのコマンド **Remote-Containers: Rebuild Container** を実行する

### http:localhost:8080 にアクセスすると、autoload.phpが見つからないとエラーが出る
以下のようなエラーが出た場合
```
Warning: require(/var/www/html/public/../vendor/autoload.php): failed to open stream: No such file or directory in /var/www/html/public/index.php on line 24
```
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