# Database
DBに関する設定は backend/config/database.php に記述されてます。
.env の設定が優先されるので、開発者がこのファイルを編集することは無いと思う。


## どこにDB関連の定義(DDL, DML) を配置するか。
DDLはbackend/database/migrations フォルダ配下に配置する。ここに置くファイルは後述の `artisan migrate` コマンドで生成する。
DMLはbackend/database/seeds フォルダは以下に配置する。

## マイグレーション


### 1. 1手進める
```sh
php backend/artisan migrate
```

### 2. 1手戻る
```sh
php backend/artisan migrate:rollback

## 戻る手数を指定したい場合は step オプションをつける
php backend/artisan migrate:rollback --step=5

## 振り出しに戻る場合は resetコマンド
php backend/artisan migrate:reset

## 最初から流し直す
php backend/artisan migrate:refresh

## 最初から流し直し、ついでに初期データも入れる
php backend/artisan migrate:refresh --seed
```

### 3. DDLの作成
以下のコマンドで backend/database/migrations フォルダにマイグレーション用のファイルが生成される。
生成したファイルを開いてup(1手進む)、down(1手戻る)メソッドを実装していく。
```sh
# 新規テーブルの追加 create [ファイル名] --create=[テーブル名]
php backend/artisan make:migration create_users_table --create=users
```

### 4. テスト用データ(Seeder)の作成
```sh
php backend/artisan make:seeder UsersTableSeeder
```

### 5. Seederを実行してテストデータ投入
```sh
php backend/artisan db:seed
```

### 6. model クラスを作る
Laravelの標準コマンドだと以下のようになる。
```sh
php backend/artisan make:model Models/User
```
が、このプロジェクトでは一括モデル自動生成のコマンドを導入しているので、以下のコマンドですべてのモデルが自動生成される
```sh
php backend/artisan krlove:generate:all-models
```