<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ProductRequest;
// use Dotenv\Validator;

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
        $this->data['title'] = 'Trang chủ';

        return view('clients.home', $this->data);
    }

    public function products(){
        $this->data['title'] = 'Sản Phẩm';
        return  view('clients.products', $this->data);
    }

    public function getAdd (){
        $this->data['title'] = 'Thêm sản phẩm';
        $this->data['errorMess'] = 'Vui lòng kiểm tra dữ liệu nhập.';
        return view('clients.add', $this->data);
    }

    public function postAdd (Request $request){
        $rules = [
            'product_name' => 'required|min:6',
            'product_price' => 'required|integer'
        ];
        // $message = [
        //     'product_name.required' => 'Tên sản phẩm bắt buộc nhập.',
        //     'product_name.min' => 'Tên sản phẩm phải lớn hơn 6 kí tự.',
        //     'product_price.required' => 'Giá sản phẩm bắt buộc nhập.',
        //     'product_price.integer' => 'Giá sản phẩm phải là số.'
        // ];

        $message = [
            'required' => 'Trường :attribute bắt buộc nhập.',
            'min' => 'Trường :attribute phải lớn hơn 6 kí tự.',
            'integer' => 'Trường :attribute phải là số.'
        ];

        $attributes = [
            'product_name' => 'Tên sản phẩm',
            'product_price' => 'Giá sản phẩm'
        ];

        $validator = Validator::make($request->all(), $rules, $message, $attributes);
        // $validator->validate();
        // return response()->json(['status'=>'success']);
        if($validator->validate()) {
            $validator->errors()->add('msg', 'Vui lòng kiểm tra lại dữ liệu');
        }
        else {
            // return redirect()->route('product')->with('msg', 'Validate thành công!');
            return response()->json(['status'=>'success']);
        }
        // return back()->withErrors($validator);
        // $request->validate($rules, $message); // nếu validate thành công sẽ chuyển hướng, nếu validate thất bại (false) sẽ flash session về chính nó
    }

    // Download file
    public function downloadImage (Request $request){
        if(!empty($request->image)){
            $image = trim($request->image);

            // $fileName = 'image_'.uniqid().'.jpg';
            $fileName = basename($image);

            return response()->streamDownload(function () use($image){
                $imageContent = file_get_contents($image);
                echo $imageContent;
            }, $fileName);
        }
    }
}
