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

        <x-alert type="success" content="Cao Minh Hữu" data-icon="youtube"/>
        {{-- <x-inputs.button/>
        <x-forms.button/> --}}

        <img src="https://znews-photo.zingcdn.me/w660/Uploaded/jugtzb/2022_06_20/A_Vien.jpg" alt="" srcset=""><br><br>

        <p><a href="{{route('download-image').'?image=https://znews-photo.zingcdn.me/w660/Uploaded/jugtzb/2022_06_20/A_Vien.jpg'}}" class="btn btn-primary">Download ảnh</a></p>
    @endenv
@endsection

@section('css')
    <style>
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('js')

@endsection