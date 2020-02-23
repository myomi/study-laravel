# Study Laravel
## 使い方
1. VSCodeのRemote Containerでこのプロジェクトを開く
2. ブラウザを開き、 http://localhost:8080 にアクセスすると、backend/public/index.php を表示する。

## トラブルシュート
### php Dockerfileのapt update で “Release file is not yet valid” のようなエラーが出る
Docker for windows を再起動する。

## メモ
### (1) プロジェクトを作る
/workspace で以下のコマンドを実行   
```sh
composer create-project --prefer-dist laravel/laravel backend
```