<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

       return view('category.create');

    }

    public function store(CategoryRequest $request)
    {
        $notShow = $request->has('notShow') ? 1 : 0;
        $Category = new Category($request->all());
        $Category->notShow=$notShow;
        $Category->url=get_url($request->get('ename'));
        $Category->parent_id=0;
        $Category->save();
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
