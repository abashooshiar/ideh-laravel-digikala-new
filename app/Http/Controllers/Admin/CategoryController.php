<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends CustomController
{
    protected $model = 'Category';
    protected $title = 'Kategorie';
    protected $route_params = 'category';

    public function index(Request $request)
    {
        $category = Category::getData($request->all());
        $trash_cat_count = Category::onlyTrashed()->count();
        return view('category.index', ['category' => $category, 'trash_cat_count' => $trash_cat_count ,'req'=>$request]);
    }


    public function create()
    {
        $parent_cat = Category::get_parent();
        return view('category.create', ['parent_cat' => $parent_cat]);
    }

    public function store(CategoryRequest $request)
    {
        $notShow = $request->has('notShow') ? 1 : 0;
        $Category = new Category($request->all());
        $Category->notShow = $notShow;
        $Category->url = get_url($request->get('ename'));
        $img_url = upload_file($request, 'pic', 'upload');
        $Category->img = $img_url;
        //$Category->parent_id=0;
        $Category->save();

        return redirect('admin/category')->with('message', 'Kategorieregistrierung erfolgreich abgeschlossen.');

    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parent_cat = Category::get_parent();
        return view('category.edit', ['category' => $category, 'parent_cat' => $parent_cat, 'id' => $id]);
    }

    public function update($id, CategoryRequest $request)
    {
        $data = $request->all();
        $category = Category::findOrFail($id);
        $notShow = $request->has('notShow') ? 1 : 0;
        $category->url = get_url($request->get('ename'));
        $img_url = upload_file($request, 'pic', 'upload');
        if ($img_url != null) {
            $category->img = $img_url;
        }
        $data['notShow'] = $notShow;
        $category->update($data);
        return redirect('admin/category')->with('message', 'Kategoriebearbeitung erfolgreich abgeschlossen.');
    }


}
