@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent
    <h3>User Sidebar</h3>
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success text-center">{{session('msg')}}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
    @endif

    <h1>{{$title}}</h1>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="">Họ và tên</label>
            <input type="text" class="form-control" name="name" id="" placeholder="Họ và tên" value="{{old('name')}}">
            @error('name')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="" placeholder="Email" value="{{old('email')}}">
            @error('email')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" id="" placeholder="Password" value="{{old('password')}}">
            @error('password')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="{{route('users.index')}}" class="btn btn-warning">Quay lại</a>
        @csrf
    </form>
    
@endsection

{{-- @section('css')

@endsection

@section('js')

@endsection --}}