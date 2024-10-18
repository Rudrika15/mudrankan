<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;
use App\Models\Market;
use Illuminate\Http\Request;
use App\Models\Voucharmaster;
use App\Models\Vouchardetail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VoucharmasterController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:voucharmaster-index', ['only' => ['index']]);
        $this->middleware('permission:voucharmaster-create', ['only' => ['create', 'voucharmaster_code']]);
        $this->middleware('permission:voucharmaster-edit', ['only' => ['edit', 'edit_code']]);
        $this->middleware('permission:voucharmaster-delete', ['only' => ['voucharmasterdelete']]);
    }


    //
    function index()
    {
        $roles = Auth::user()->roles->first();
        $user = Auth::user()->id;

        $expiredVouchers = Voucharmaster::whereDate('vouchar_validUp', '<=', Carbon::today())
            ->where('status', 'Active')
            ->get();

        foreach ($expiredVouchers as $voucher) {
            $voucher->status = "Inactive";
            $voucher->save();
        }

        if($roles->name == 'Admin'){
            $data = Voucharmaster::whereDate('vouchar_validUp', '>=', Carbon::today())->where('status', 'Active')->get();

        }else{
            $data = Voucharmaster::whereDate('vouchar_validUp', '>=', Carbon::today())->where('user_id',$user)->where('status', 'Active')->get();
        }


        // $data = Voucharmaster::whereDate('vouchar_validUp', '>=', Carbon::today())->where('status', 'Active')->get();
        return view("back_end.voucharmaster.index", compact('data'));
    }
    function create()
    {
        $user = Auth::user()->id;
        $roles = Auth::user()->roles->first();
        if ($roles->name == 'Admin') {
            $market = Market::where('status', 'Active')->get();
        } else {
            $market = Market::where('user_id', $user)->where('status', 'Active')->get();
        }

        $data = Voucharmaster::where('status', 'Active')->get();
        return view("back_end.voucharmaster.create", compact('market'));
    }
    function voucharmaster_code(Request $request)
    {
        $request->validate([
            'market_id' => 'required',
            'vouchar_name' => 'required',
            'vouchar_price' => 'required',
            'vouchar_detail' => 'required',
            'vouchar_code' => 'required',
            'vouchar_validUp' => 'required',
        ]);

        $voucharmaster = new Voucharmaster();
        $voucharmaster->user_id = $request->user_id;
        $voucharmaster->market_id = $request->market_id;
        $voucharmaster->vouchar_name = $request->vouchar_name;
        $voucharmaster->vouchar_price = $request->vouchar_price;
        $voucharmaster->vouchar_detail = $request->vouchar_detail;
        $voucharmaster->vouchar_code = $request->vouchar_code;
        if($image = $request->file('photo')){
            $path = 'voucharimage/';
            $imagename = time(). "." . $image->getClientOriginalExtension();
            $image->move($path,$imagename);
            $voucharmaster->vouchar_image = $imagename;
        }
        $voucharmaster->vouchar_validUp = $request->vouchar_validUp;
        $voucharmaster->save();

        return redirect()->back()
            ->with('success', 'data submit successfully');
    }

    function edit($id)
    {
        $user = Auth::user()->id;
        $roles = Auth::user()->roles->first();
        if ($roles->name == 'Admin') {
            $market = Market::where('status', 'Active')->get();
        } else {
            $market = Market::where('user_id', $user)->where('status', 'Active')->get();
        }

        $voucharmaster = Voucharmaster::findOrFail($id);
        return view("back_end.voucharmaster.edit", compact('voucharmaster', 'market'));
    }

    function edit_code(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'market_id' => 'required',
            'vouchar_name' => 'required',
            'vouchar_price' => 'required',
            'vouchar_detail' => 'required',
            'vouchar_code' => 'required',
            'vouchar_validUp' => 'required',
        ]);

        $voucharmaster =  Voucharmaster::find($id);
        $voucharmaster->user_id = $request->user_id;
        $voucharmaster->market_id = $request->market_id;
        $voucharmaster->vouchar_name = $request->vouchar_name;
        $voucharmaster->vouchar_price = $request->vouchar_price;
        $voucharmaster->vouchar_detail = $request->vouchar_detail;
        $voucharmaster->vouchar_code = $request->vouchar_code;
        $voucharmaster->vouchar_validUp = $request->vouchar_validUp;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $path = 'voucharimage/';
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move($path, $imageName);
            $voucharmaster->vouchar_image = $imageName;

        }
        $voucharmaster->save();


        return redirect()->back()
            ->with('success', 'data submit successfully');
    }
    function voucharmasterdelete($id)
    {

        $data = Voucharmaster::find($id);
        if ($data) {
            $data->status = "Inactive";
            $data->save();
            return redirect("backend/voucharmaster/show")
                ->with('success', 'vouchar deleted successfully');
        }

        return redirect("backend/voucharmaster/show")
            ->with('error', 'vouchar not found');
    }
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}