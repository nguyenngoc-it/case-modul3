<?php

namespace App\Http\Controllers;

use App\Models\Store;

//use Illuminate\Auth\Access\Gate;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $stores = Store::all();
        return view('backend.store.list', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.store.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $store = new Store();
        $store->name = $request->name;
        $store->address = $request->address;
        $store->user_id = $user->id;
        $store->save();
        return redirect()->route('store.index');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= Auth::user();
        if (Gate::allows('admin', $user)){
            if (Auth::check()){
                $store = Store::findOrFail($id);
                return view('backend.store.edit', compact('store'));

            }
            else{
                return redirect()->route('store.index');
            }
        }
        else{
            abort(403);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $store = Store::findOrFail($id);
        $store->name = $request->name;
        $store->address = $request->address;
        $store->save();
        return redirect()->route('store.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $stores = Store::findOrFail($id);
        $stores->delete($id);
        return redirect()->route('store.index');


    }
}
