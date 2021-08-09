<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Foods;
use Illuminate\Http\Request;

class OderController extends Controller
{
    public function index()
    {

        $foods = Foods::wherenotNull('discount_code')->get();

        $categories = Category::all();
        return view('frontend.index', compact('foods', 'categories'));
    }



    public function showAll()
    {
        $foods = Foods::wherenotNull('discount_code')->get();
        return view('frontend.showAll', compact('foods'));

    }

    public function foodCategory($id)
    {
        $category = Category::findOrFail($id);
        $foods = $category->foods()->get();
        return view('frontend.listcategory', compact('foods', 'category'));

    }

    public function viewCart()
    {
        $cart= session()->get('cart');
//        dd($cart);
        return view('frontend.cart', compact('cart'));
    }

    public function addToCart($id)
    {
        $foods = Foods::findOrFail($id);

        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'name' => $foods->name,
                'price' => $foods->price,
                'image' => $foods->image,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);
//        toastr()->success('thêm thành công', 'Thông báo');
        return response()->json($cart);
    }

    public function updateCart(Request $request)
    {

        if ($request->id && $request->quantity){
            $cart= session()->get('cart');
            $cart[$request->id]['quantity']=$request->quantity;
            session()->put('cart',$cart);
            $cart=session()->get('cart');
            $cartCompoment= view('frontend.compoments.cart_compoment', compact('cart'))->render();
            return response()->json(['cart_compoment'=>$cartCompoment,'code'=>200],200);
        }

    }

    public function removeCart(Request $request)
    {

        if ($request->id ){
            $cart= session()->get('cart');
            unset($cart[$request->id]);
            session()->put('cart',$cart);
            $cart=session()->get('cart');
            $cartCompoment= view('frontend.compoments.cart_compoment', compact('cart'))->render();
            return response()->json(['cart_compoment'=>$cartCompoment,'code'=>200],200);
        }

    }

    public function order()
    {
        return view('frontend.order');

    }
}
