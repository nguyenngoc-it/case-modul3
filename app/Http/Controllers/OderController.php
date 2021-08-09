<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OderController extends Controller
{
    public function index()
    {

        $foods = Foods::wherenotNull('discount_code')->limit('8')->get();

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
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $foods = $category->foods()->get();
        return view('frontend.listcategory', compact('foods', 'category','categories'));

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
    public function search(Request $request)
    {

        $key = $request->input('input_search');
        if (!$key) {
            return redirect()->route('shop.index');
        }
        $foods = Foods::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        $categories = Category::all();
        return view('frontend.index', compact('foods', 'categories'));

    }
    public function logout(Request $request)
    {
      Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home.login');
    }

}
