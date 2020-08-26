<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    // indexを表示
    public function __invoke(){
        return view('index');
    }
}
