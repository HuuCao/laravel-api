<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        // Hệ thống sẽ chạy construct đầu tiên
        // Sử dụng sesion để check login
    }
    public function index () {
        return '<h1>Dashboard Welcome!</h1>';
    }
}
