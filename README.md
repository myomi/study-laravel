# Study Laravel
## 使い方
1. VSCodeのRemote Containerでこのプロジェクトを開く

## 実行方法(1)
index.phpを開き F5で実行。
デバッガの構成を *Launch application* にしておけばデバッグできる。

## 実行方法(2)
VSCodeのターミナルを開き、以下を実行

```sh
php -S 0.0.0.0:8000
```

VSCodeのリモートエクスプローラを開くと、 *転送されたポート* に0.0.0.0:8000 が表示されるので、
右クリックしてポートを転送。
ブラウザを開き、 http://localhost:8000 にアクセスすると、index.phpの内容が表示されるはず。
デバッガの構成を *Listen for XDebug* にしてデバッガを実行すれば、デバッグできる。