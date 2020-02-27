# Laravelプロジェクトの作り方
これは、最初にこのプロジェクトを作るときに実施した作業のメモです。

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
```sh
cd backend
composer require krlove/eloquent-model-generator --dev
```

backend/config/eloquent_model_generator.phpを作り、モデルの生成先ディレクトリを設定する。
```php
<?php

return [
    'model_defaults' => [
        'namespace'       => 'App\\Models',
        'base_class_name' => \Illuminate\Database\Eloquent\Model::class,
        'output_path'     => 'Models',
        'no_timestamps'   => false,
        'date_format'     => 'U',
        'connection'      => null,
        'backup'          => false,
    ],
];
```

さらに、DBスキーマを読み取ってモデルを一括生成する仕組みを取り入れる。
[このプルリクエスト](https://github.com/krlove/eloquent-model-generator/pull/46)を参考に、以下の手順でコマンドを作った

```
# これで app/Console/Commands/GenerateAllModels.php ができる
php backend/artisan make:command GenerateAllModels
```
app/Console/Commands/GenerateAllModels.phpにプルリクのコードを記述する。
これで、 `php backend/artisan krlove:generate:all-models`
