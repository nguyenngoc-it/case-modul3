<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Foods;
use Illuminate\Http\Request;

class OderController extends Controller
{

    public function index()
    {
        $foods = Foods::wherenotNull('discount_code')->limit('8')->get();
        $categories = Category::all();
        return response()->json($foods);
    }

}
