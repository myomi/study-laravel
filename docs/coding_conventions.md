# コーディング規約
## 1. ルーティングは必ずコントローラを使用する。
クロージャを使用してはいけない。

### 動機
(ルートキャッシュ)[https://laravel.com/docs/6.x/controllers#route-caching]を活用したいから。

## 2. ファイルの構成
app/Http
  |- Controllers ・・・make:controller で生成したコントローラ
  |- Models ・・・make:model で生成したモデル
  |- Repositories ・・・データベースアクセスクラスを置く場所