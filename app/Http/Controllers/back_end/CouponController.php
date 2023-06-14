<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Market;
use App\Models\Category;
use App\Models\Discountable;

class CouponController extends Controller
{
    //
    function index()
    {
        $data = Coupon::all();
        return view("back_end.coupon.index", compact('data'));
    }
    function create()
    {
        $data1 = Product::all();
        $data2 = Market::all();
        $data3 = Category::all();
        return view("back_end.coupon.create", compact('data1', 'data2', 'data3'));
    }
    function coupon_code(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'discount' => 'required',
            'discount_type' => 'required',
            'description' => 'required',
            'expires_at' => 'required',

        ]);

        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->discount = $request->discount;
        $coupon->discount_type = $request->discount_type;
        $coupon->discription = $request->description;
        $coupon->expires_at = $request->expires_at;
        $coupon->save();
        $coupon_id = $coupon->id;


        $markets = $request->market_id;
        foreach ($markets as $market_id) {
            $discountable = new Discountable();
            $discountable->discountable_type = "market";
            $discountable->discountable_id = $market_id;
            $discountable->coupon_id = $coupon_id;
            $discountable->save();
        }


        $productsIds = $request->product_id;
        foreach ($productsIds as $product_id) {
            $discountable = new Discountable();
            $discountable->discountable_type = "product";
            $discountable->discountable_id = $product_id;
            $discountable->coupon_id = $coupon_id;
            $discountable->save();
        }


        $categoryIds = $request->category_id;
        foreach ($categoryIds as $category_id) {
            $discountable = new Discountable();
            $discountable->discountable_type = "category";
            $discountable->discountable_id = $category_id;
            $discountable->coupon_id = $coupon_id;
            $discountable->save();
        }

        return redirect("backend/coupon/show")
            ->with('success', 'Coupon submit successfully');
    }
    function coupondelete($id)
    {

        $data = Coupon::find($id);
        $data->delete();

        return redirect("backend/coupon/show")
            ->with('success', 'Coupon deleted successfully');
    }

    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
