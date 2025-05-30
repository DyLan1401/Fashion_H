<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $category = Categories::all();
        return view('user.layouts.app', compact('category'));
    }
}
