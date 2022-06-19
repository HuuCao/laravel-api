@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent
    <h3>HOME SIDEBAR</h3>
@endsection

@section('content')
    @datetime('2022-06-19 19:12:00')
    <h1>Trang chủ</h1>

    @env('production')
        <p>Môi trường Production</p>
        @elseenv('test')
        <p>Môi trường test</p>
        @else
        <p>Môi trường dev</p>
    @endenv
@endsection

@section('css')

@endsection

@section('js')

@endsection