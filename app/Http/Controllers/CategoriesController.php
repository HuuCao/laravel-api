<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct()
    {
    }

    // Hiển thị danh sách chuyên mục (GET)
    public function index(Request $request)
    {
        // $allData = $request->all();
        // if(isset($_GET['id'])){
        //     echo $_GET['id'];
        // }\

        // $id = $request->query('id');
        // dd($id);
        $query = $request->query();
        dd($query);

        return view('clients/categories/list');
    }

    // Lấy chuyên mục theo id (GET)
    public function getCategory($id)
    {
        return view('clients/categories/edit');
    }

    // Sửa chuyên mục theo id (POST)
    public function updateCategory($id)
    {
        return 'Submit sửa chuyên mục';
    }

    // Show form thêm dữ liệu (GET)
    public function addCategory(Request $request)
    {
        return view('clients/categories/add');
    }

    // Thêm dữ liệu vào chuyên mục (POST)
    public function handleAddCategory(Request $request)
    {
        // $allData = $request->all();
        // dd($allData);
        // return 'Submit thêm chuyên mục';
        // return redirect(route('categories.add'));
        // $cateName = $request->category_name;
        if($request->has('category_name')){
            $cateName = $request->category_name;
            $request->flash();
            return redirect(route('categories.add'));
        }else {
            return 'Không có category_name';
        }
        
    }

    // Xóa dữ liệu (DELETE)
    public function deleteCategory($id)
    {
        return 'Submit xóa chuyên mục';
    }

    // Show form upload file
    public function getFile() {
        return view('clients/categories/file');
    }

    // Xử lý lấy thống tin file
    public function handleFile (Request $request) {
        if($request->hasFile('photo')) {
            if($request->photo->isValid()){
                $file = $request->file('photo');
                $path = $file->store('files');
                dd($path); 
            }
           
        }else {
            return 'Vui lòng chọn file';
        }
    }
}
