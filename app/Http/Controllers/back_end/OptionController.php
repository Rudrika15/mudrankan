<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Option;
use App\Models\Optiongroup;

class OptionController extends Controller
{
    //
    function index()
    {
        $data = Option::join('optiongroups', 'optiongroups.id', '=', 'options.option_group_id')->join('products', 'products.id', '=', 'options.product_id')

            ->get([
                'options.*', 'optiongroups.name as oname',
                'options.*', 'products.name as proname'
            ]);
        return view("back_end.option.index", compact('data'));
    }
    function create()
    {
        $data = Optiongroup::all();
        $data1 = Product::all();
        return view("back_end.option.create", compact('data', 'data1'));
    }
    function edit($id)
    {
        $data = Option::find($id);
        $data2 = Optiongroup::all();
        $data1 = Product::all();
        return view("back_end.option.edit", compact('data', 'data1', 'data2'));
    }

    function option_code(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'price' => 'required',
            'product_id' => 'required',
            'option_group_id' => 'required',
        ]);

        $option = new Option();
        $option->name = $request->name;
        // $option->image=$request->image;
        $image = $request->image;
        $option->image = time() . '.' . $request->image->extension();

        $request->image->move(public_path('opimg'), $option->image);

        $option->description = $request->description;
        $option->price = $request->price;
        $option->product_id = $request->product_id;
        $option->option_group_id = $request->option_group_id;
        $option->save();
        return redirect()->back()
            ->with('success', 'data submit successfully');
    }
    function optiondelete($id)
    {
        $data = Option::find($id)->delete();
        return redirect('backend/option/show');
    }

    function edit_code(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'price' => 'required',
            'product_id' => 'required',
            'option_group_id' => 'required',
        ]);
        $id = $request->id;
        $option = Option::find($id);
        $option->name = $request->name;
        // $option->image=$request->image;
        if ($request->image) {
            $image = $request->image;
            $option->image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('opimg'), $option->image);
        }
        $option->description = $request->description;
        $option->price = $request->price;
        $option->product_id = $request->product_id;
        $option->option_group_id = $request->option_group_id;
        $option->save();
        return redirect("backend/option/show")
            ->with('success', 'Update successfully');
    }
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
