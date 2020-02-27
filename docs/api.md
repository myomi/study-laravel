# WEB API
backend/routes/api.phpでAPIのルーティングを書く。

例：
```php
Route::get('foo', function () {
    return 'Hello World';
});
```
これで、GET htttp://localhost:8080/api/foo ができる。


public/index.php -> router -> controller 

## APIの開発手順
1. コントローラを作る
```sh
# 例 php backend/artisan make:controller UserController
php backend/artisan make:controller [コントローラ名]
```