<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $data = Category::where('deleted_at',null)->get();
     return view('admin.categories.categories-list',['data'=>$data]);
    }

    public function addCategory(Request $request){
        
    }
}
