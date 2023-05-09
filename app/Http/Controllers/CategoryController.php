<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        $data = [
            'title' => 'Dashboard',
            'currentRoute' => 'admin.category',
            'categories' => $category,
        ];

        return view('admin.category.category', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Dashboard',
            'currentRoute' => 'admin.category',
        ];
        return view('admin.category.category_add', $data);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return redirect('admin/category');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $data = [
            'title' => 'Dashboard',
            'currentRoute' => 'admin.category',
            'category' => $category,
        ];

        return view('admin.category.category_update', $data);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect('admin/category');
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        return redirect('admin/category');
    }
}

