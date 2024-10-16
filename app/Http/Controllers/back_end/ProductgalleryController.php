<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productgallery;
use Illuminate\Support\Facades\Auth;

class ProductgalleryController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:productgallery-index' , ['only' => ['index']]);
        $this->middleware('permission:productgallery-create' , ['only' => ['create','Productgallery_code']]);
        $this->middleware('permission:productgallery-edit' , ['only' => ['edit','edit_code']]);
        $this->middleware('permission:productgallery-delete' , ['only' => ['progallerydelete']]);

    }


    //
    function index()
    {
        $roles = Auth::user()->roles->first();
        $user = Auth::user()->id;
        if($roles->name == 'Admin')
        {
            $data = Productgallery::with('product')->where('status','Active')->get();

        }else{
            $data = Productgallery::with('product')->where('user_id',$user)->where('status','Active')->get();

        }
        // $data = Productgallery::join('products', 'products.id', '=', 'productgalleries.product_id')
        //     ->get(['productgalleries.*', 'products.name as pname']);
        // $data = Productgallery::with('product')->where('status','Active')->get();
        // return $data;   
        return view("back_end.productgallery.index", compact('data'));
    }
    function create()
    {
        $roles = Auth::user()->roles->first();
        $user = Auth::user()->id;
        if($roles->name == 'Admin')
        {
            $data = Product::where('status','Active')->get();

        }else{
            $data = Product::where('user_id',$user)->where('status','Active')->get();

        }
        return view("back_end.productgallery.create", compact('data'));
    }
    function edit($id)
    {
        $data = Productgallery::find($id);
        $roles = Auth::user()->roles->first();
        $user = Auth::user()->id;
        if($roles->name == 'Admin')
        {
            $data1 = Product::where('status','Active')->get();

        }
        else{
            $data1 = Product::where('user_id',$user)->where('status','Active')->get();

        }

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
        if($data){
            $data->status = "Deleted";
            $data->save();
            return redirect("backend/productgallery/show")
            ->with('success', 'data deleted successfully');
        }

        return redirect("backend/productgallery/show")
            ->with('error', 'ProductGallery not found');
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