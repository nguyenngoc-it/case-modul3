<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use Illuminate\Database\Eloquent\Model;
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
    {
        $food = new Foods();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('imgs', 'public');
            $food->image = $path;
        }
        $food->name = $request->input('name');
        $food->address = $request->input('address');
        $food->start_time = $request->input('start-time');
        $food->end_time = $request->input('end-time');
        $food->price = $request->input('price');
        $food->sale_price = $request->input('sale-price');
        $food->incurred = $request->input('incurred');
        $food->save();
        return redirect()->route('home.index');
    }

    public function edit($id)
    {
        $food= Foods::findOrFail($id);
        return view('backend.foods.edit',compact('food'));
    }

    public function update(Request $request , $id)
    {
        $food = Foods::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('imgs', 'public');
            $food->image = $path;
        }
        $food->name = $request->input('name');
        $food->address = $request->input('address');
        $food->start_time = $request->input('start-time');
        $food->end_time = $request->input('end-time');
        $food->price = $request->input('price');
        $food->sale_price = $request->input('sale-price');
        $food->incurred = $request->input('incurred');
        $food->save();
        return redirect()->route('home.index');
    }

    public function delete($id)
    {
        $food= Foods::findOrFail($id);
        $food->delete();
        return redirect()->route('home.index');
    }

    public function search(Request $request)
    {

        $key = $request->input_search;
        if (!$key){
         return   redirect()->route('home.index');
        }
        $foods= Foods::where('name', 'LIKE','%'.$key.'%')->paginate(5);
        return view('backend.foods.list',compact('foods'));



    }

}
