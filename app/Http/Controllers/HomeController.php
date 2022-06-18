<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Action home
    public function index()
    {
        return 'Home';
    }

    // Action news
    public function getNews()
    {
        return 'Danh sach tin tuc';
    }

    // Action Products
    public function getProducts()
    {
        return 'Danh sach san pham';
    }
}
