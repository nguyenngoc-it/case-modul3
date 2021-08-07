<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use Illuminate\Http\Request;

class FoodApiController extends Controller
{
    public function index()
    {
        $foods=Foods::all();
        return view ('frontend.index',compact('foods'));
    }
}
