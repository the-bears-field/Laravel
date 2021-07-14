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
        if (!$request->id) {
            return redirect('/hello');
        }

        $params = [
            'id' => $request->id
        ];
        $query = 'SELECT * FROM people WHERE id = :id';
        $item = DB::select($query, $params);
        return view('hello.edit', ['form' => $item[0]]);
    }

    public function update(Request $request) {
        $params = [
            'id'   => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age'  => $request->age
        ];
        $query = 'UPDATE people SET name = :name, mail = :mail, age = :age WHERE id = :id';
        DB::update($query, $params);
        return redirect('/hello');
    }

    public function del(Request $request) {
        if (!$request->id) {
            return redirect('/hello');
        }

        $params = [
            'id' => $request->id
        ];
        $query = 'SELECT * FROM people WHERE id = :id';
        $item = DB::select($query, $params);
        return view('hello.del', ['form' => $item[0]]);
    }

    public function remove(Request $request) {
        $params = [
            'id' => $request->id
        ];
        $query = 'DELETE FROM people WHERE id = :id';
        DB::delete($query, $params);
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
}
