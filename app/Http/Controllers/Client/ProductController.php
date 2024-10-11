<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('client.product.index');
    }
    public function show()
    {
        //tìm sản phẩm theo id
        return view('client.product.show');
    }
}
