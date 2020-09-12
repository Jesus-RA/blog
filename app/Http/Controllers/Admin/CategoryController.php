<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request){
        
        $category = Category::create($request->all());
        return back();
    }

    public function getCategories(){
        $categories = Category::all(['id', 'name']);
        return ["data" => $categories];
    }
}
