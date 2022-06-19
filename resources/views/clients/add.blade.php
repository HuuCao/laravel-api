@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>Thêm sản phẩm</h1>
    <form action="" method="POST">
        <input class="form-control" type="text" name="username" id=""><br>
        @csrf
        <button class="btn btn-success" type="submit">Submit</button>
    </form>
@endsection

@section('css')

@endsection

@section('js')

@endsection