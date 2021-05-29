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
    public function index() {
        global $head, $style, $body, $end;

        $html = $head. tag('title', 'Hello/Index'). $style. $body
        . tag('h1', 'Index'). tag('p', 'this is Index page')
        . tag('a', 'go to Other page', 'href="/hello/other"')
        . $end;
        return $html;
    }

    public function other() {
        global $head, $style, $body, $end;
        $html = $head. tag('title', 'Hello/Other'). $style. $body
        . tag('h1', 'Other'). tag('p', 'this is Other page'). $end;
        return $html;
    }
}
