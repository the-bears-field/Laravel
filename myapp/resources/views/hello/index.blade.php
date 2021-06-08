@extends('layouts.helloapp')

@section('title', 'index')
@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです。</p>
    <p>必要なだけ記述できます。</p>
    
    @component('components.message')
        @slot('msg_title')
            CAUTION!
        @endslot
        
        @slot('msg_content')
            これはメッセージです。
        @endslot
    @endcomponent
@endsection

@section('footer')
    copyright 2020 tuyano.
@endsection
