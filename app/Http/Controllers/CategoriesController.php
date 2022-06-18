<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct(){

    }

    // Hiển thị danh sách chuyên mục (GET)
    public function index () {
        return view('clients/categories/list');
    }

    // Lấy chuyên mục theo id (GET)
    public function getCategory ($id) {
        return view('clients/categories/edit');
    }

    // Sửa chuyên mục theo id (POST)
    public function updateCategory ($id) {
        return 'Submit sửa chuyên mục';
    }

    // Show form thêm dữ liệu (GET)
    public function addCategory() {
        return view('clients/categories/add');
    }

    // Thêm dữ liệu vào chuyên mục (POST)
    public function handleAddCategory() {
        // return 'Submit thêm chuyên mục';
        return redirect(route('categories.add'));
    }

    // Xóa dữ liệu (DELETE)
    public function deleteCategory($id) {
        return 'Submit xóa chuyên mục';
    }
}
