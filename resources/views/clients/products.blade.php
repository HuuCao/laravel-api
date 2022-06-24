@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent
    <h3>Product Sidebar</h3>
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success text-center">{{session('msg')}}</div>
    @endif

    <h1>SẢN PHẨM</h1>
    {{-- <x-package-alert/> --}}
@endsection

@section('css')

@endsection

@section('js')

@endsection