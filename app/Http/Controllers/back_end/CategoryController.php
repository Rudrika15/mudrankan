<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:category-index', ['only' => ['index']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'category_code']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'edit_code']]);
        $this->middleware('permission:category-delete', ['only' => ['catdelete']]);
    }

    public function index()
    {
        $data = Category::where('status', 'Active')->simplePaginate(0);
        return view("back_end.category.index", compact('data'));
    }
    function create()
    {
        return view("back_end.category.create");
    }
    function edit($id)
    {
        $data = Category::find($id);
        return view("back_end.category.edit", compact('data'));
    }
    public function category_code(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $image = $request->image;
        $category->image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('catimg'), $category->image);
        $category->save();
        return redirect("backend/category/show")
            ->with('success', 'data submit successfully');
    }
    function catdelete($id)
    {
        $data = Category::find($id);
        if ($data) {
            $data->status = 'Deleted';
            $data->save();
            return redirect("backend/category/show")
                ->with('success', 'data deleted successfully');
        }
        return redirect("backend/category/show")
            ->with('error', 'Field not found');
    }
    function edit_code(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $id = $request->id;
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->image) {
            $image = $request->image;
            $category->image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('catimg'), $category->image);
        }
        $category->save();
        return redirect("backend/category/show")
            ->with('success', 'Update successfully');
    }
}