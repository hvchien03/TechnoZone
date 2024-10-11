<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('client.blog.index');
    }
    public function show()
    {
        //tìm blog theo id
        return view('client.blog.show');
    }
}
