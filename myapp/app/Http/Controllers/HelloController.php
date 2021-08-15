<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request) {
        $items = DB::table('people')->get();
        return view('hello.index', ['items' => $items]);
    }

    public function post(Request $request) {
        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = response()->view('hello.index', ['msg' => '「'. $msg. '」をクッキーに保存しました。']);
        $response->cookie('msg', $msg, 100);
        return $response;
    }

    public function add(Request $request) {
        return view('hello.add');
    }

    public function create(Request $request) {
        $params = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age'  => $request->age
        ];
        DB::table('people')->insert($params);
        return redirect('/hello');
    }

    public function edit(Request $request) {
        if (!isset($request->id)) {
            return redirect('/hello');
        }

        $id = $request->id;
        $item = DB::table('people')->where('id', $id)->get();
        if ($item->isNotEmpty()) {
            return view('hello.edit', ['form' => $item[0]]);
        } else {
            return redirect('/hello');
        }
    }

    public function update(Request $request) {
        $id = $request->id;
        $params = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age'  => $request->age
        ];
        DB::table('people')->where('id', $id)->update($params);
        return redirect('/hello');
    }

    public function del(Request $request) {
        if (!isset($request->id)) {
            return redirect('/hello');
        }

        $id = $request->id;
        $item = DB::table('people')->where('id', $id)->get();
        if ($item->isNotEmpty()) {
            return view('hello.del', ['form' => $item[0]]);
        } else {
            return redirect('/hello');
        }
    }

    public function remove(Request $request) {
        if (!isset($request->id)) {
            return redirect('/hello');
        }
        $id = $request->id;
        DB::table('people')->where('id', $id)->delete();
        return redirect('/hello');
    }

    public function show(Request $request) {
        if (isset($request->page)) {
            return redirect('/hello');
        }

        $page = $request->page;
        $items = DB::table('people')
            ->offset($page * 3)
            ->limit(3)
            ->get();

        if ($items) {
            return view('hello.show', ['items' => $items]);
        } else {
            return redirect('/hello');
        }
    }

    public function rest()
    {
        return view('hello.rest');
    }

    public function getSession(Request $request)
    {
        $sessionData = $request->session()->get('msg');
        return view('hello.session', ['sessionData' => $sessionData]);
    }

    public function putSession(Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('hello/session');
    }
}
