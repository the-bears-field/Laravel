<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $hasItems = Person::has('boards')->get();
        $noItems = Person::doesntHave('boards')->get();
        $params = [
            'hasItems' => $hasItems,
            'noItems' => $noItems
        ];
        return view('person.index', $params);
    }

    public function find(Request $request)
    {
        return view('person.find', ['input' => '']);
    }

    public function search(Request $request)
    {
        $input = $request->input;
        $min = $input * 1;
        $max = $min + 10;
        $item = Person::ageGreaterThan($min)->ageLessThan($max)->first();
        $param = [
            'input' => $input,
            'item' => $item
        ];
        return view('person.find', $param);
    }

    public function add(Request $request)
    {
        return view('person.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Person::$rules);
        $form = $request->all();
        unset($form['_token']);
        (new Person)->fill($form)->save();
        return redirect('/person');
    }

    public function edit(Request $request)
    {
        if(!isset($request->id)) {
            return redirect('/person');
        }
        $id = $request->id;
        $person = Person::find($id);
        if($person) {
            return view('person.edit', ['form' => $person]);
        } else {
            return redirect('/person');
        }
    }

    public function update(Request $request)
    {
        if(!isset($request->id)) {
            return redirect('/person');
        }
        $this->validate($request, Person::$rules);
        $id = $request->id;
        $person = Person::find($id);
        $form = $request->all();
        unset($form['_token']);
        if($person) {
            $person->fill($form)->save();
        }
        return redirect('/person');
    }

    public function delete(Request $request)
    {
        if(!isset($request->id)) {
            return redirect('/person');
        }
        $id = $request->id;
        $person = Person::find($id);
        if($person) {
            return view('person.del', ['form' => $person]);
        } else {
            return redirect('/person');
        }
    }

    public function remove(Request $request)
    {
        if(!isset($request->id)) {
            return redirect('/person');
        }
        $id = $request->id;
        $person = Person::find($id);
        if($person) {
            $person->delete();
        }
        return redirect('/person');
    }
}
