<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Market;
use App\Models\Slide;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SlideController extends Controller
{
    
    function __construct()
    {
        $this->middleware('permission:slide-index' , ['only' => ['index']]);
        $this->middleware('permission:slide-create' , ['only' => ['create','slide_code']]);
        $this->middleware('permission:slide-edit' , ['only' => ['edit','edit_code']]);
        $this->middleware('permission:slide-delete' , ['only' => ['slidedelete']]);

    }
    
    //
    function index()
    {
        $user = auth()->user();

        if ($user->hasRole('Admin')) {

            $data = Slide::with(['market', 'product'])->where('status','Active')->simplePaginate(10);
        
        }else{
           $marketIds = Market::where('user_id', $user->id)->where('status', 'Active')->pluck('id');
    
           $data = Slide::with(['market', 'product'])->where('status','Active')
           ->where('market_id',$marketIds)
           ->simplePaginate(10);
        }
        // $data = Slide::join('products', 'products.id', '=', 'slides.product_id')->join('markets', 'markets.id', '=', 'slides.market_id')
        //     ->get([
        //         'slides.*', 'products.name as pname',
        //         'slides.*', 'markets.name as mname'
        //     ])->where('status','Active');

        return view("back_end.slide.index", compact('data'));
    }
    function create()
    {
        $roles = Auth::user()->roles->first();
        $user = Auth::user()->id;
        if($roles->name == 'Admin')
        {
            $data = Market::where('status','Active')->get();
            $data1 = Product::where('status','Active')->get();
    
        }else{
            $data = Market::where('status','Active')->where('user_id',$user)->get();
            $data1 = Product::where('status','Active')->where('user_id',$user)->get();
    
        }
        return view("back_end.slide.create", compact('data', 'data1'));
    }
    function edit($id)
    {
        $roles = Auth::user()->roles->first();
        $user = Auth::user()->id;
        if($roles->name == 'Admin')
        {
            $data1 = Product::where('status','Active')->get();
            $data2 = Market::where('status','Active')->get();
    
        }else{
            $data1 = Product::where('status','Active')->where('user_id',$user)->get();
            $data2 = Market::where('status','Active')->where('user_id',$user)->get();
    
        }
        $data = slide::find($id);
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
        $slide->order = $request->order;
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
        if($request->enabled){
            $slide->enabled = $request->enabled;
        }else{
            $slide->enabled = 'off';
        }

        $slide->save();
        return redirect()->back()
            ->with('success', 'data submit successfully');
    }
    function slidedelete($id)
    {

        $data = Slide::find($id);
        if($data){
            $data->status = "Deleted";
            $data->save();
            return redirect("backend/slide/show")
            ->with('success', 'Slide deleted successfully');
        }

        return redirect("backend/slide/show")
            ->with('error', 'Slide not found');
    }

    function edit_code(Request $request)
    {
        // return $request;
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
            // 'enabled' => 'required',
            'image_fit' => 'required',
            'product_id' => 'required',
            'market_id' => 'required',
        ]);
        $id = $request->id;
        $slide = Slide::find($id);
        $slide->order = $request->order;
        $slide->text = $request->text;
        $slide->button = $request->button;
        $slide->text_position = $request->text_position;
        $slide->text_color = $request->text_color;
        $slide->button_color = $request->button_color;
        $slide->background_color = $request->background_color;
        $slide->indicator_color = $request->indicator_color;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            // Store the uploaded image and generate a new filename
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('slidimg'), $imageName);
            
            // Update the slide image field with the new image name
            $slide->image = $imageName;
        }

        // if ($request->image) {

        //     $image = $request->image;
        //     $slide->image = time() . '.' . $request->image;
        //     $request->image->move(public_path('slidimg'), $slide->image);
        // }
        $slide->image_fit = $request->image_fit;
        $slide->product_id = $request->product_id;
        $slide->market_id = $request->market_id;
        if($request->enabled){

            $slide->enabled = $request->enabled;
        }else{
            $slide->enabled = 'off';
        }

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