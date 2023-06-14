<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Market;
use App\Models\Slide;


use Illuminate\Http\Request;

class SlideController extends Controller
{
    //
    function index()
    {
        $data = Slide::join('products', 'products.id', '=', 'slides.product_id')->join('markets', 'markets.id', '=', 'slides.market_id')
            ->get([
                'slides.*', 'products.name as pname',
                'slides.*', 'markets.name as mname'
            ]);
        return view("back_end.slide.index", compact('data'));
    }
    function create()
    {
        $data = Market::all();
        $data1 = Product::all();
        return view("back_end.slide.create", compact('data', 'data1'));
    }
    function edit($id)
    {
        $data = slide::find($id);
        $data1 = Product::all();
        $data2 = Market::all();
        return view("back_end.slide.edit", compact('data', 'data1', 'data2'));
    }
    function slide_code(Request $request)
    {
        $request->validate([
            'order' => 'required',
            'text' => 'required',
            'button' => 'required',
            'text_position' => 'required',
            'text_color' => 'required',
            'button_color' => 'required',
            'background_color' => 'required',
            'indicator_color' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_fit' => 'required',
            'product_id' => 'required',
            'market_id' => 'required',

        ]);

        $slide = new Slide();
        $slide->order_id = $request->order;
        $slide->text = $request->text;
        $slide->button = $request->button;
        $slide->text_position = $request->text_position;
        $slide->text_color = $request->text_color;
        $slide->button_color = $request->button_color;
        $slide->background_color = $request->background_color;
        $slide->indicator_color = $request->indicator_color;
        $image = $request->image;
        $slide->image = time() . '.' . $request->image->extension();

        $request->image->move(public_path('slidimg'), $slide->image);
        $slide->image_fit = $request->image_fit;
        $slide->product_id = $request->product_id;
        $slide->market_id = $request->market_id;
        $slide->enabled = $request->enabled;

        $slide->save();
        return redirect()->back()
            ->with('success', 'data submit successfully');
    }
    function slidedelete($id)
    {

        $data = Slide::find($id);
        $data->delete();

        return redirect("backend/slide/show")
            ->with('success', 'data deleted successfully');
    }

    function edit_code(Request $request)
    {
        $request->validate([
            'order' => 'required',
            'text' => 'required',
            'button' => 'required',
            'text_position' => 'required',
            'text_color' => 'required',
            'button_color' => 'required',
            'background_color' => 'required',
            'indicator_color' => 'required',
            // 'image' => 'required',
            'image_fit' => 'required',
            'product_id' => 'required',
            'market_id' => 'required',
        ]);
        $id = $request->id;
        $slide = new Slide();
        $slide->order_id = $request->order;
        $slide->text = $request->text;
        $slide->button = $request->button;
        $slide->text_position = $request->text_position;
        $slide->text_color = $request->text_color;
        $slide->button_color = $request->button_color;
        $slide->background_color = $request->background_color;
        $slide->indicator_color = $request->indicator_color;
        if ($request->image) {
            $image = $request->image;
            $slide->image = time() . '.' . $request->image;
            $request->image->move(public_path('slidimg'), $slide->image);
        }
        $slide->image_fit = $request->image_fit;
        $slide->product_id = $request->product_id;
        $slide->market_id = $request->market_id;
        $slide->enabled = $request->enabled;

        $slide->save();
        return redirect("backend/slide/show")
            ->with('success', 'data submit successfully');
    }
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
