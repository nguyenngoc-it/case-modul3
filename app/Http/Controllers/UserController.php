<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        $user= Auth::user();
        if (Gate::allows('admin', $user)){
            if(Auth::check()){
                $users= User::all();
                return view('backend.admin.users.list', compact('users'));
            }
            else{
                return redirect()->route('home.login');
            }
        }
        else{
            abort(403);
        }

    }

    public function create()
    {

        $roles= Role::all();
        return view('backend.admin.users.create', compact('roles'));

    }

    public function store(Request $request)
    {

        if ($request->password === $request->password_confirm){

            $users= new User();
            $users->role_id= $request->role;
            $users->username= $request->username;
            $users->email= $request->email;
            $users->password= Hash::make($request->password);
            $users->save();
            return redirect()->route('user.index');

        }

    }

    public function edit($id)
    {
        $user= User::findOrFail($id);
        $roles= Role::all();
        return view('backend.admin.users.edit', compact('user', 'roles'));

    }

    public function update(Request $request, $id)
    {
        $user= User::findOrFail($id);
        $user->role_id= $request->role;
        $user->username= $request->username;
        $user->email= $request->email;
        $user->password= Hash::make($request->password);
        $user->save();
        return redirect()->route('user.index');

    }

    public function destroy($id)
    {
//        $user= User::findOrFail($id);
//        $user->role()->dissociate();
////        $user->stores()->dissociate();
//        $user->delete();
//        return redirect()->route('user.index');

    }

}
