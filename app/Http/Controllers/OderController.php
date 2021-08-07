<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Foods;
use Illuminate\Http\Request;

class OderController extends Controller
{
    public function index()
    {
        $foods=Foods::wherenotNull('discount_code')->limit('8')->get();
        $categories=Category::all();
        return view('frontend.index',compact('foods','categories'));
  }

    public function showAll()
    {
        $foods=Foods::wherenotNull('discount_code')->get();
        return view('frontend.showAll',compact('foods'));

  }

    public function foodCategory($id)
    {
        $category=Category::findOrFail($id);
        $foods=$category->foods()->get();
        dd($foods);

  }
}
