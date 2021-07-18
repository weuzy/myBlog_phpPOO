<?php

use Router\Router;
use App\Exceptions\NotFoundException;

    require '../vendor/autoload.php';

    define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
    define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
    define('DB_NAME', 'weuzySite' );
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PWD', '');

    $router = new Router($_GET['url']);

    $router->get('/', 'App\Controllers\BlogController@welcome');
    $router->get('/posts', 'App\Controllers\BlogController@index');
    $router->get('/posts/:id', 'App\Controllers\BlogController@show');
    $router->get('/tags/:id', 'App\Controllers\BlogController@tag');

    $router->get('/login', 'App\Controllers\UserController@login');
    $router->post('/login', 'App\Controllers\UserController@loginPost');
    $router->get('/logout', 'App\Controllers\UserController@logout');

    $router->get('/admin/posts', 'App\Controllers\Admin\PostController@index');

    $router->get('/admin/posts/create', 'App\Controllers\Admin\PostController@create');
    $router->post('/admin/posts/create', 'App\Controllers\Admin\PostController@createPost');

    $router->post('/admin/posts/delete/:id', 'App\Controllers\Admin\PostController@destroy');

    $router->get('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@edit');
    $router->post('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@update');

    try {
        $router->run();
    } catch (NotFoundException $e) {
        // echo $e->getMessage();
        return $e->error404();
    }
