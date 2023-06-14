<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productgallery;


class ProductgalleryController extends Controller
{
    //
    function index()
    {
        $data = Productgallery::join('products', 'products.id', '=', 'productgalleries.product_id')
            ->get(['productgalleries.*', 'products.name as pname']);
        return view("back_end.productgallery.index", compact('data'));
    }
    function create()
    {
        $data = Product::all();
        return view("back_end.productgallery.create", compact('data'));
    }
    function edit($id)
    {
        $data = Productgallery::find($id);
        $data1 = Product::all();
        return view("back_end.productgallery.edit", compact('data', 'data1'));
    }
    function Productgallery_code(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $productgallery = new Productgallery();
        $productgallery->product_id = $request->product_id;
        // $productgallery->image = $request->image;
        $image = $request->image;
        $productgallery->image = time() . '.' . $request->image->extension();

        $request->image->move(public_path('progaimg'), $productgallery->image);

        $productgallery->save();
        return redirect()->back()
            ->with('success', 'data submit successfully');
    }
    function progallerydelete($id)
    {

        $data = Productgallery::find($id);
        $data->delete();

        return redirect("backend/productgallery/show")
            ->with('success', 'data deleted successfully');
    }

    function edit_code(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $id = $request->id;
        $productgallery = Productgallery::find($id);
        $productgallery->product_id = $request->product_id;
        // $productgallery->image = $request->image;
        if ($request->image) {
            $image = $request->image;
            $productgallery->image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('progaimg'), $productgallery->image);
        }
        $productgallery->save();
        return redirect("backend/productgallery/show")
            ->with('success', 'Update successfully');
    }
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
