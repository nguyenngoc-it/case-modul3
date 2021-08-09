<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Foods;
use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FoodsController extends Controller
{
    public function index()
    {


        $user= Auth::user();
        $stores = $user->stores()->first();
        $foods= $stores->foods()->get();
        return view('backend.foods.list', compact('stores', 'foods'));

        $user = Auth::user();
        $store = $user->stores()->first();
        if ($user->stores()->count()==0){
            return redirect()->back();
        }
        else{
            $foods = $store->foods()->get();
            return view('backend.foods.list', compact('store', 'foods'));
        }


    }

    public function showAllFood()
    {
        $foods= Foods::all();
        return view('backend.foods.listFoodAll', compact('foods'));

    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.foods.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $user= Auth::user();
        $store= $user->stores()->first();
        $food = new Foods();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('imgs', 'public');
            $food->image = $path;
        }
        $food->name = $request->input('name');
        $food->category()->associate($request->input('address'));
        $food->store_id = $store->id;

        $food->price = $request->input('price');
        $food->sale_price = $request->input('sale-price');
        $food->discount_code = $request->input('discount-code');
        $food->incurred = $request->input('incurred');
        $food->save();
        return redirect()->route('home.index');
    }

    public function edit($id)
    {
        $food = Foods::findOrFail($id);
        $categories=Category::all();
        return view('backend.foods.edit', compact('food','categories'));
    }

    public function update(Request $request, $id)
    {
        $food = Foods::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('imgs', 'public');
            $food->image = $path;
        }
        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->category()->associate($request->input('address'));
        $food->sale_price = $request->input('sale-price');
        $food->discount_code = $request->input('discount-code');
        $food->incurred = $request->input('incurred');
        $food->save();
        return redirect()->route('home.index');
    }

    public function delete($id)
    {
        $food = Foods::findOrFail($id);
        $food->delete();
        return redirect()->route('home.index');
    }

    public function search(Request $request)
    {

        $key = $request->input_search;
        if (!$key) {
            return redirect()->route('home.index');
        }
        $foods = Foods::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        return view('backend.foods.list', compact('foods'));

    }


}
