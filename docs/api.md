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
### 一般的なAPI用コントローラの作り方
1. コントローラを作る
```sh
# 例 php backend/artisan make:controller UserController
php backend/artisan make:controller [コントローラ名]
```

2. コントローラにメソッドを実装する
```php
class UserController extends Controller
{
    public function list() {
        return "Hello UserController";
    }
}
```

3. routes/api.php を編集し、URLパスとコントローラ・メソッドを紐づける
```php
Route::get('users', 'UserController@list');
```

### リソースコントローラの作り方
リソースに対するCRUDを提供するAPIを作るときは、リソースコントローラを作れば便利。メソッド名やURLパスの規約でマッピングしてくれる。

1. コントローラを作る
`--resource` オプションをつけてmake:controllerを実行する
```sh
# 例 php backend/artisan make:controller UserController --resource
php backend/artisan make:controller [コントローラ名] --resource
```