<?php

namespace App\routes;

use App\Modules\Router\Route;
use App\Modules\Http\Controller\LogController;
use App\Modules\Http\Controller\AdminController;
use App\Modules\Http\Controller\OrderController;
use App\Modules\Http\Controller\PublicController;
use App\Modules\Http\Controller\ArticleController;
use App\Modules\Http\Controller\ProfileController;

$route = new Route;

$route::get('/', function () {
    return view('welcome');
});

$route::get('/login', [PublicController::class, 'login']);

$route::post('/login/submit', [PublicController::class, 'tryLogin']);
$route::post('/logout', [PublicController::class, 'logout']);

$route::get('/monitoring/siem', [LogController::class, 'controlPanel']);

$route::get('/admin', [AdminController::class, 'admin']);

$route::get('/articles/index', [ArticleController::class, 'index']);

$route::get('/articles/show', [ArticleController::class, 'show']);

$route::get('/articles/checkstock', [ArticleController::class, 'checkStock']);

$route::get('/profile', [ProfileController::class, 'profilePage']);
$route::post('/profile/update', [ProfileController::class, 'update']);
$route::get('/profile/orders', [OrderController::class, 'ordersPage']);
$route::get('/order/print', [OrderController::class, 'print']);

return $route;
