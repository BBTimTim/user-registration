<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Tool;
use App\Models\Category;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $tools = Tool::with('tags')->get();
        return view('tools.index', compact('tools'));
       }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view ('tools.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    function store(Request $request)
    {
         $request->validate(
            ['name' => 'required|string|min:3|max:30|unique:tools,name',
             'category_id' => 'required|exists:categories,id',
             'description' => 'required|string|min:20',
             'price' => 'nullable|numeric',
        ]);


        $tool = Tool::create($request->all());
        $tool->tags()->attach($request->tags);
        
        return redirect()->back()->with('success', __('The tool successfully created!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tool = Tool::with('tags')->find($id);
        return view('tools.show', compact('tool'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tool = Tool::find($id);
        $categories = Category::all();
        return view('tools.edit', compact('tool','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            ['name' => 'required|string|min:3|max:30|unique:tools,name',
             'category_id' => 'required|exists:categories,id',
             'description' => 'required|string|min:20',
             'price' => 'nullable|numeric',
        ]);


        $tool = Tool::create($request->all());
        $tool->tags()->attach($request->tags);

        return redirect()->back()->with('success', __('Successfully edited!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy (string $id) {

        $tools = Tool::find($id);
        $tools->delete(); 

        return redirect()->back()->with('success', __('The tool is successfully deleted!'));
    }
}
