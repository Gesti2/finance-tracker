<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::simplePaginate(10);

        return view('pages.categories.index', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
    }
}
