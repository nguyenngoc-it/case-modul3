<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function index()
    {
        $foods = Foods::all();
        return view('backend.foods.list', compact('foods'));
    }

    public function create()
    {
        return view('backend.foods.create');
    }

    public function store(Request $request)
    {   $food=new Foods();
        if ($request->hasFile('image')){
            $image=$request->file('image');
            $path=$image->store('imgs','public');
            $food->image=$path;
        $food->name=$request->input('name');
        $food->address=$request->input('address');
        $food->start_time=$request->input('start-time');
        $food->end_time=$request->input('end-time');
        $food->price=$request->input('price');
        $food->sale_price=$request->input('sale-price');
        $food->incurred=$request->input('incurred');
        $food->save();
        return redirect()->route('home.index');
    }
}
}
