<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Market;
use DataTables;
use Illuminate\Support\Facades\Auth;

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
        $user = auth()->user();

        if ($user->hasRole('Admin')) {
            $data = Category::where('status', 'Active')
                ->simplePaginate(10);
        } else {

            $marketIds = Market::where('user_id', $user->id)->where('status', 'Active')->pluck('id');

            $data = Category::where('status', 'Active')
                ->where('market_id', $marketIds)
                ->simplePaginate(10);
        }
        return view("back_end.category.index", compact('data'));
    }
    function create()
    {
        $user = Auth::user()->id;
        $roles = Auth::user()->roles->first();
        if ($roles->name == 'Admin') {
            $market = Market::where('status', 'Active')->get();
        } else {
            $market = Market::where('user_id', $user)->where('status', 'Active')->get();
        }

        return view("back_end.category.create", compact('market'));
    }
    function edit($id)
    {
        $user = Auth::user()->id;
        $roles = Auth::user()->roles->first();
        if ($roles->name == 'Admin') {
            $market = Market::where('status', 'Active')->get();
        } else {
            $market = Market::where('user_id', $user)->where('status', 'Active')->get();
        }
        $data = Category::find($id);
        return view("back_end.category.edit", compact('data', 'market'));
    }
    public function category_code(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'market_id' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->market_id = $request->market_id;
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
            'market_id' => 'required',
            'description' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $id = $request->id;
        $category = Category::find($id);
        $category->name = $request->name;
        $category->market_id = $request->market_id;
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