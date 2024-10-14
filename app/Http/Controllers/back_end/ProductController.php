<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Productgallery;
use App\Models\Market;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    function index()
    {
        $data = Product::join('categories', 'categories.id', '=', 'products.category')
            ->join('markets', 'markets.id', '=', 'products.market')
            ->get([
                'products.*', 'categories.name as cname',
                'markets.name as mname'
            ]);

        return view("back_end.product.index", compact('data'));
    }
    function create()
    {
        $data = Category::all();
        $data1 = Market::all();
        return view("back_end.product.create", compact('data', 'data1'));
    }
    function edit($id)
    {
        $data = Product::find($id);
        $data1 = Category::all();
        $data2 = Market::all();
        $data3 = Productgallery::where('product_id',$data->id)->get();
        return view("back_end.product.edit", compact('data', 'data1', 'data2','data3'));
    }
    function Product_code(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'description' => 'required',
            'capacity' => 'required|numeric',
            'unit' => 'required',
            'package_count' => 'required',
            'category_id' => 'required',
            'market_id' => 'required',
            'featured' => 'required',
            'deliverable_product' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product();
        $product->user_id = $request->user_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->description = $request->description;
        $product->capacity = $request->capacity;
        $product->unit = $request->unit;
        $product->package_count = $request->package_count;
        $product->category = $request->category_id;
        $product->market = $request->market_id;
        $product->featured = $request->featured;
        $product->deliverable_product = $request->deliverable_product;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $product->image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('proimg'), $product->image);
        }
        $product->save();

        $product_id = $product->id;
        if (isset($request->g1)) {
            $productgallery = new Productgallery();
            $productgallery->product_id = $product->id;
            $productgallery->image = time() . '.' . rand() . '.' . $request->g1->extension();
            $request->g1->move(public_path('progaimg'), $productgallery->image);
            $productgallery->save();
        }

        if (isset($request->g2)) {
            $productgallery = new Productgallery();
            $productgallery->product_id = $product->id;
            $productgallery->image = time() . '.' . rand() . '.' . $request->g2->extension();
            $request->g2->move(public_path('progaimg'), $productgallery->image);
            $productgallery->save();
        }

        if (isset($request->g3)) {
            $productgallery = new Productgallery();
            $productgallery->product_id = $product->id;
            $productgallery->image = time() . '.' . rand() . '.' . $request->g3->extension();
            $request->g3->move(public_path('progaimg'), $productgallery->image);
            $productgallery->save();
        }

        if (isset($request->g4)) {
            $productgallery = new Productgallery();
            $productgallery->product_id = $product->id;
            $productgallery->image = time() . '.' . rand() . '.' . $request->g4->extension();
            $request->g4->move(public_path('progaimg'), $productgallery->image);
            $productgallery->save();
        }
        return redirect()->back()
            ->with('success', 'data submit successfully');
    }
    function prodelete($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect("backend/product/show")
            ->with('success', 'data deleted successfully');
    }
    function edit_code(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'description' => 'required',
            'capacity' => 'required',
            'unit' => 'required',
            'package_count' => 'required',
            'category_id' => 'required',
            'featured' => 'required',
            'deliverable_product' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $id = $request->id;
        $product = Product::find($id);
        $product->user_id = $request->user_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->description = $request->description;
        $product->capacity = $request->capacity;
        $product->unit = $request->unit;
        $product->package_count = $request->package_count;
        $product->category = $request->category_id;
        $product->featured = $request->featured;
        $product->deliverable_product = $request->deliverable_product;

        if ($request->hasFile('image') && !empty($request->image)) {
            // Check if the first image exists and is a file
            if (isset($request->image[0]) && $request->image[0]->isValid()) {
                $image = $request->file('image')[0]; // Get the first image
                $product->image = time() . '.' . $image->extension();
                $image->move(public_path('proimg'), $product->image);
            }
    
            // Handle multiple images
            foreach ($request->file('image') as $index => $image) {
                if ($image->isValid()) { // Ensure it's a valid file
                    $productGallery = new ProductGallery();
                    $productGallery->product_id = $product->id;
    
                    // Create a unique filename for each image
                    $galleryImageName = time() . '_' . $index . '.' . $image->extension();
                    $image->move(public_path('progaimg'), $galleryImageName);
    
                    // Save the gallery image path in the product gallery
                    $productGallery->image = $galleryImageName;
                    $productGallery->save();
                }
            }
        }
        
        $product->save();
        return redirect("backend/product/show")
            ->with('success', 'Update successfully');
    }
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}