<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use Illuminate\Http\Request;
use App\Models\Market;
use Illuminate\Support\Facades\Auth;

class MarketController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:market-index',['only' => ['index']]);  
        $this->middleware('permission:market-create',['only' => ['create','market_code']]);   
        $this->middleware('permission:market-edit',['only' => ['edit','edit_code']]);   
        $this->middleware('permission:market-delete',['only' => ['marketdelete']]);   
 
    }
    
    //
    function index()
    {
        $roles = Auth::user()->roles->first();
        $user = Auth::user()->id;
        if($roles->name == 'Admin')
        {
            $data = Market::where('status','Active')->get();
    
        }else{
            $data = Market::where('status','Active')->where('user_id',$user)->get();

        }
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
            'phone' => 'required|digits:10|numeric|regex:/^[6-9]\d{9}$/',
            'mobile' => 'required|digits:10|numeric|regex:/^[6-9]\d{9}$/',
            'information' => 'required',
            'admin_commision' => 'required',
            'delivery_fee' => 'required',
            'delivery_range' => 'required',
            'default_tax' => 'required',
            'close' => 'required',
            'active' => 'required',
            'available_for_delivery' => 'required',
        ]);
        $user = Auth::user()->id;
        $channel = Channel::where('user_id', $user)->pluck('id')->toArray();

        $market = new Market();
        $market->user_id = $request->user_id;
        $market->channel_id = json_encode($channel);
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
        if($data){
            $data->status = "Deleted";
            $data->save();
            return redirect("backend/market/show")->with('success', 'Market deleted successfully');
        }
        return redirect("backend/market/show")
        ->with('error', 'Market not found');
    }
    function edit_code(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $user = Auth::user()->id;
        $channel = Channel::where('user_id', $user)->pluck('id')->toArray();

        $id = $request->id;
        $market = Market::find($id);
        $market->user_id = $request->user_id;
        $market->channel_id = json_encode($channel);
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