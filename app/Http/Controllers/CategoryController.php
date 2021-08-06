<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.list', compact('categories'));
  }

    public function create()
    {
        return view('backend.category.create');
  }

    public function store(Request $request)
    {
        $category=new Category();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('imgs', 'public');
            $category->image = $path;
        }
        $category->name=$request->input('name');
        $category->save();
        return redirect()->route('category.index');
  }

    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('backend.category.edit',compact('category'));
  }

    public function update(Request $request,$id)
    {
        $category=Category::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('imgs', 'public');
            $category->image = $path;
        }
        $category->name=$request->input('name');
       $category->save();
       return redirect()->route('category.index');
}

    public function delete($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index');
}
}
