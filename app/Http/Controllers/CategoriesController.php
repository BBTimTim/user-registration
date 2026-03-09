<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoriesController extends Controller {

     public function create(){
        return view('categories.create');
     }

   public function index() {
    $categories = Category::all();
    return view('categories.index', compact('categories'));
   }

     function store(Request $request)
    {
         $request->validate(
            [ 'name' => 'required|min:3|max:30|unique:categories,name',],
            ['name.min' => 'A kategória nevének legalább 3 karakternek kell lennie!']
        );

        $category = new Category();
        $category->name = $request->name;
        $category->save(); 

        return redirect()->back()->with('success', __('The category successfully created!'));
    }

    public function show (string $id) {
//
    }

    public function edit (string $id) {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update (Request $request, string $id) {

        $request->validate(
            [ 'name' => 'required|min:3|max:30|unique:categories,name',],
            ['name.min' => 'A kategória nevének legalább 3 karakternek kell lennie!']
        );

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save(); 

        return redirect()->back()->with('success', __('The category is successfully edited!'));
    }

    public function destroy (string $id) {

        $category = Category::find($id);
        $category->delete(); 

        return redirect()->back()->with('success', __('The category is successfully deleted!'));
    }
}