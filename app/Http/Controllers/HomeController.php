<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    // // Action home
    // public function index()
    // {
    //     $title = "Học lập trình laravel";
    //     $content = "Nội dung học lập trình laravel";
    //     /*
    //         return view('home', compact('title', 'content'));
    //         hàm compact sẽ tự động tạo ra 1 mảng;
    //         [
    //             'title' => $title,
    //             'content' => $content,
    //         ]
    //     */
    //     return view('home')->with(['title' => $title, 'content' => $content]);

    //     // return View::make('home')->with(['title' => $title, 'content' => $content]);
    //     // $contentView = view('home')->render(); //hàm render tác dụng xuất html thô dùng để xuất excel hoặc in PDF
    //     // dd($contentView);
    // }

    // // Action news
    // public function getNews()
    // {
    //     return 'Danh sach tin tuc';
    // }

    // // Action Products
    // public function getProducts()
    // {
    //     return 'Danh sach san pham';
    // }

    // public function getProductDetail($id){
    //     return view('clients.products.detail', compact('id'));
    // }
    public $data = [];
    
    public function index() {
        $this->data['welcome'] = 'Học lập trình laravel';
        $this->data['title'] = 'Minh Hữu';
        return view('clients.home', $this->data);
    }

    public function products(){
        $this->data['title'] = 'Sản Phẩm';
        return  view('clients.products', $this->data);
    }

    public function getAdd (){
        $this->data['title'] = 'Thêm sản phẩm';
        return view('clients.add', $this->data);
    }

    public function postAdd (Request $request){
        dd($request);
    }
}
