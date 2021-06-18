<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request) {
        return view('hello.index', ['msg' => 'フォームを入力：']);
    }

    public function post(Request $request) {
        $validate_rule = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];
        $validator = Validator::make($request->all(), $validate_rule);

        if ($validator->fails()) {
            return redirect('/hello')->withErrors($validator)->withInput();
        }

        return view('hello.index', ['msg' => '正しく入力されました！']);
    }
}
