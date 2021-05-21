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
        <p>This is sample page.</p>
        <p>これは、サンプルで作ったページです。</p>
    </body>
    </html>
    HTML;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () use ($html) {
    return $html;
});
