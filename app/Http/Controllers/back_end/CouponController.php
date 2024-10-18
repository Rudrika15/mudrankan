<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Market;
use App\Models\Category;
use App\Models\Discountable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    
    function __construct()
    {
        $this->middleware('permission:coupon-index',['only' => ['index']]);
        $this->middleware('permission:coupon-create',['only' => ['create','coupon_code']]);
        $this->middleware('permission:coupon-edit',['only' => ['edit','edit_code']]);
        $this->middleware('permission:coupon-delete',['only' => ['coupondelete']]);

    }

    function index()
    {
        $userId = Auth::user()->id;
        $roles = Auth::user()->roles->first();
        $expiredCoupons = Coupon::whereDate('expires_at', '<=', Carbon::today())
        ->where('status', 'Active')
        ->get();

        foreach ($expiredCoupons as $coupon) {
            $coupon->status = "Inactive";
            $coupon->save();
        }
        if($roles->name == 'Admin')
        {
            $data = Coupon::whereDate('expires_at', '>=', Carbon::today()) 
            ->with(['products', 'markets', 'categories'])
            ->get()->where('status','Active');

        }else{
            $data = Coupon::where('user_id', $userId)
            ->whereDate('expires_at', '>=', Carbon::today()) 
            ->with(['products', 'markets', 'categories'])
            ->get()->where('status','Active')->where('user_id',$userId);

        }

        return view("back_end.coupon.index", compact('data'));
    }
    function create()
    {

        $user = Auth::user()->id;
        $roles = Auth::user()->roles->first();
        if($roles->name == 'Admin')
        {
            $data1 = Product::where('status','Active')->get();
            $data2 = Market::where('status','Active')->get();


        }else{
            $data1 = Product::where('user_id', $user)->where('status','Active')->get();
            $data2 = Market::where('user_id', $user)->where('status','Active')->get();

        }
        $data3 = Category::where('status','Active')->get();
        return view("back_end.coupon.create", compact('data1', 'data2', 'data3'));
    }

    function coupon_code(Request $request)
    {

        $request->validate([
            'code' => 'required',
            'discount' => 'required',
            'discount_type' => 'required',
            'description' => 'required',
            'product_id' => 'required',
            'market_id' => 'required',
            'category_id' => 'required',
            'expires_at' => 'required',

        ]);
        $coupon = new Coupon();
        $coupon->user_id = $request->user_id;
        $coupon->code = $request->code;
        $coupon->discount = $request->discount;
        $coupon->discount_type = $request->discount_type;
        $coupon->discription = $request->description;
        $coupon->product_id = $request->product_id;
        $coupon->market_id = $request->market_id;
        $coupon->category_id = $request->category_id;
        $coupon->expires_at = $request->expires_at;
        $coupon->save();

        $product = Product::find($request->product_id);

        if ($product) {
            $product->coupon_id = $coupon->id;
            $product->save();
        }

        $market = Market::find($request->market_id);
        if ($market) {
            $market->coupon_id = $coupon->id;
            $market->save();
        }

        $category = Category::find($request->category_id);
        if ($category) {
            $category->coupon_id = $coupon->id;
            $category->save();
        }

        $discountable = new Discountable();
        $discountable->coupon_id = $coupon->id;
        $discountable->discountable_type = $coupon->discount_type;
        $discountable->save();



        // $coupon = new Coupon();
        // $coupon->code = $request->code;
        // $coupon->discount = $request->discount;
        // $coupon->discount_type = $request->discount_type;
        // $coupon->discription = $request->description;
        // $coupon->expires_at = $request->expires_at;
        // $coupon->save();
        // $coupon_id = $coupon->id;


        // $markets = $request->market_id;
        // foreach ($markets as $market_id) {
        //     $discountable = new Discountable();
        //     $discountable->discountable_type = "market";
        //     $discountable->discountable_id = $market_id;
        //     $discountable->coupon_id = $coupon_id;
        //     $discountable->save();
        // }


        // $productsIds = $request->product_id;
        // foreach ($productsIds as $product_id) {
        //     $discountable = new Discountable();
        //     $discountable->discountable_type = "product";
        //     $discountable->discountable_id = $product_id;
        //     $discountable->coupon_id = $coupon_id;
        //     $discountable->save();
        // }


        // $categoryIds = $request->category_id;
        // foreach ($categoryIds as $category_id) {
        //     $discountable = new Discountable();
        //     $discountable->discountable_type = "category";
        //     $discountable->discountable_id = $category_id;
        //     $discountable->coupon_id = $coupon_id;
        //     $discountable->save();
        // }

        return redirect("backend/coupon/show")
            ->with('success', 'Coupon submit successfully');
    }
    function edit($id)
    {
        $user = Auth::user()->id;
        $roles = Auth::user()->roles->first();
        if($roles->name == 'Admin')
        {
            $products = Product::where('status','Active')->get();
            $markets = Market::where('status','Active')->get();


        }else{
            $products = Product::where('user_id', $user)->where('status','Active')->get();
            $markets = Market::where('user_id', $user)->where('status','Active')->get();

        }


        $coupon = Coupon::findOrFail($id);
        $categories = Category::all();
        return view('back_end.coupon.edit', compact('coupon', 'products', 'markets', 'categories'));
    }
    function edit_code(Request $request)
    {

        // return $request;
        $id = $request->id;
        $request->validate([
            'code' => 'required',
            'discount' => 'required',
            'discount_type' => 'required',
            'description' => 'required',
            'product_id' => 'required',
            'market_id' => 'required',
            'category_id' => 'required',
            'expires_at' => 'required',

        ]);
        $coupon = Coupon::find($id);
        $coupon->user_id = $request->user_id;
        $coupon->code = $request->code;
        $coupon->discount = $request->discount;
        $coupon->discount_type = $request->discount_type;
        $coupon->discription = $request->description;
        $coupon->product_id = $request->product_id;
        $coupon->market_id = $request->market_id;
        $coupon->category_id = $request->category_id;
        $coupon->expires_at = $request->expires_at;
        $coupon->save();

        $product = Product::find($request->product_id);

        if ($product) {
            $product->coupon_id = $coupon->id;
            $product->save();
        }

        $market = Market::find($request->market_id);
        if ($market) {
            $market->coupon_id = $coupon->id;
            $market->save();
        }

        $category = Category::find($request->category_id);
        if ($category) {
            $category->coupon_id = $coupon->id;
            $category->save();
        }

        $discountable = new Discountable();
        $discountable->coupon_id = $coupon->id;
        $discountable->discountable_type = $coupon->discount_type;
        $discountable->save();

        return redirect("backend/coupon/show")
            ->with('success', 'Coupon submit successfully');
    }

    function coupondelete($id)
    {
        $data = Coupon::find($id);
        if($data){
            $data->status = "Inactive";
            $data->save();
            return redirect("backend/coupon/show")
            ->with('success', 'Coupon deleted successfully');
        }

        return redirect("backend/coupon/show")
            ->with('error', 'Coupon not found');
    }

    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}