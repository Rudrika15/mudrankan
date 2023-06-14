<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Market;

class MarketController extends Controller
{
    //
    function index()
    {
        $data = Market::all();
        return view("back_end.market.index", compact('data'));
    }
    function create()
    {
        return view("back_end.market.create");
    }
    function edit($id)
    {
        $data = Market::find($id);
        return view("back_end.market.edit", compact('data'));
    }
    function market_code(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'information' => 'required',
            'admin_commision' => 'required',
            'delivery_fee' => 'required',
            'delivery_range' => 'required',
            'default_tax' => 'required',
            'close' => 'required',
            'active' => 'required',
            'available_for_delivery' => 'required',
        ]);

        $market = new Market();
        $market->name = $request->name;
        $market->description = $request->description;
        $market->address = $request->address;
        $market->longitude = $request->longitude;
        $market->latitude = $request->latitude;
        $market->phone = $request->phone;
        $market->mobile = $request->mobile;
        $market->information = $request->information;
        $market->admin_commision = $request->admin_commision;
        $market->delivery_fee = $request->delivery_fee;
        $market->delivery_range = $request->delivery_range;
        $market->default_tax = $request->default_tax;
        $market->close = $request->close;
        $market->active = $request->active;
        $market->available_for_delivery = $request->available_for_delivery;
        $market->save();
        return redirect("backend/market/show")
            ->with('success', 'Market submited successfully');
    }
    function marketdelete($id)
    {
        $data = Market::find($id);
        $data->delete();
        return redirect("backend/market/show")
            ->with('success', 'Market deleted successfully');
    }
    function edit_code(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $id = $request->id;
        $market = Market::find($id);
        $market->name = $request->name;
        $market->description = $request->description;
        $market->address = $request->address;
        $market->longitude = $request->longitude;
        $market->latitude = $request->latitude;
        $market->phone = $request->phone;
        $market->mobile = $request->mobile;
        $market->information = $request->information;
        $market->admin_commision = $request->admin_commision;
        $market->delivery_fee = $request->delivery_fee;
        $market->delivery_range = $request->delivery_range;
        $market->default_tax = $request->default_tax;
        $market->close = $request->close;
        $market->active = $request->active;
        $market->available_for_delivery = $request->available_for_delivery;
        $market->save();
        return redirect("backend/market/show")
            ->with('success', 'Update successfully');
    }
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
