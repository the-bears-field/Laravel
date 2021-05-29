<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello/{msg?}', function ($msg = 'no message.') {
    $html = <<< HTML
    <html lang="ja">
    <head>
    <title>Hello</title>
    <style>
    body {
        color: #999;
        font-size: 16pt;
    }
    h1 {
        color: #eee;
        font-size: 100pt;
        margin: -40px 0px -50px 0px;
        text-align: right;
    }
    </style>
    </head>
    <body>
        <h1>Hello</h1>
        <p>{$msg}</p>
        <p>これは、サンプルで作ったページです。</p>
    </body>
    </html>
    HTML;
    return $html;
});
