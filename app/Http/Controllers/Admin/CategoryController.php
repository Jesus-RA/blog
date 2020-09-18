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
        return back();//->withSuccess("$category->name created successfully!");
    }

    public function update(Request $request, Category $category){
        
        $category->name = $request->name;
        $category->save();

        return $category->name;
    }

    public function destroy(Category $category){
        $category->delete();

        return $category->name;
    }

    public function getCategories(){
        $categories = Category::all(['id', 'name']);
        return ["data" => $categories];
    }
}
