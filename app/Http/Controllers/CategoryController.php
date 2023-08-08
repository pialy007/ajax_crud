<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories(){
        return view('category.axiso_dash');
    }

    public function add_category(Request $request){
        return $request->name;

    }
}
