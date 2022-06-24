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

    <h1>{{$title}}</h1>
    <a href="{{route('users.add')}}" class="btn btn-success ">Thêm người dùng</a><br><br>

    <form action="" method="GET" class="mb-3">
        <div class="row">
            <div class="col-10">
                <input type="search" class="form-control" placeholder="Search..." value="{{request()->keywords}}">
            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Tên</th>
                <th>Email</th>
                {{-- <th>Verified Email</th> --}}
                <th>Password</th>
                {{-- <th>Remember Token</th> --}}
                <th>Ngày tạo</th>
                {{-- <th>Ngày cập nhật</th> --}}
                <th width="5%">Sửa</th>
                <th width="5%">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($usersList))
                @foreach ($usersList as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        {{-- <td>{{$item->email_verified_at}}</td> --}}
                        <td>{{$item->password}}</td>
                        {{-- <td>{{$item->remember_token}}</td> --}}
                        <td>{{$item->created_at}}</td>
                        {{-- <td>{{$item->updated_at}}</td> --}}
                        <td>
                            <a href="{{route('users.edit', ['id'=>$item->id])}}" class="btn btn-warning btn-sm">Sửa</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{route('users.delete', ['id'=>$item->id])}}" class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-center">Không có người dùng</td>
                </tr>
            @endif
        </tbody>
    </table>
    
@endsection

@section('css')

@endsection

@section('js')

@endsection