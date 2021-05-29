<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index() {
        return <<< HTML
        <html>
        <head>
        <title>Hello/index</title>
        <style>
        body {
            color: #999;
            font-size: 16pt;
        }
        h1 {
            color: #eee;
            font-size: 100pt;
            margin: -40px 0px -50px 0px;
            text-align: center;
        }
        </style>
        </head>
        <body>
        <h1>Index</h1>
        <p>これは、Helloコントローラのindexアクションです。</p>
        </body>
        </html>
        HTML;
    }
}
