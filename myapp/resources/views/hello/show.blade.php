@extends('layouts.helloapp')

@section('title', 'show')
@section('menubar')
    @parent
    詳細ページ
@endsection

@section('content')
    @if($items)
        @foreach($items as $item)
            <table style="width: 400px;">
                <tr>
                    <th style="width: 50px;">id:</th>
                    <td style="width: 50px;">{{ $item->id }}</td>
                    <th style="width: 50px;">name:</th>
                    <td>{{ $item->name }}</td>
                </tr>
            </table>
        @endforeach
    @endif
@endsection

@section('footer')
    copyright 2020 tuyano.
@endsection
