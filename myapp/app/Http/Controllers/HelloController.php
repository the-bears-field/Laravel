<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

global $head, $style, $body, $end;

$head  = '<html><head>';
$style = <<< EOF
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
EOF;
$body  = '</head><body>';
$end   = '</body></html>';

function tag(string $tag, string $txt, string $attributes = '') {
    $endTag = $tag;

    if($attributes) {
        $tag = $tag. ' '. $attributes;
    }

    return "<{$tag}>". $txt. "</{$endTag}>";
}

class HelloController extends Controller
{
    public function __invoke() {
        return <<< EOF
        <html>
        <head>
        <title>Hello</title>
        <style>
        body {
            color: #999;
            font-size: 16pt;
        }
        h1 {
            color: #eee;
            font-size: 30pt;
            margin: -15px 0px 0px 0px;
            text-align: right;
        }
        </style>
        </head>
        <body>
        <h1>Single Action</h1>
        <p>これは、シングルアクションコントローラのアクションです。</p>
        </body>
        </html>
        EOF;
    }
}
