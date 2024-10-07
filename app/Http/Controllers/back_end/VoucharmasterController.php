<?php
namespace App\Http\Controllers\back_end;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Voucharmaster;
use App\Models\Vouchardetail;
use Illuminate\Support\Str;

class VoucharmasterController extends Controller
{
    //
    function index()
    {
        $data = Voucharmaster::all();
        return view("back_end.voucharmaster.index", compact('data'));
    }
    function create()
    {
        $data = Voucharmaster::all();
        return view("back_end.voucharmaster.create");
    }
    function voucharmaster_code(Request $request)
    {
        $request->validate([
            'vouchar_name' => 'required',
            'vouchar_prize' => 'required',
            'vouchar_expiry' => 'required',
            'vouchar_associated_mobile' => 'required|numeric|digits:10',
            'quantity' => 'required',
            'vouchar_status' => 'required',

        ]);

        $voucharmaster = new Voucharmaster();
        $voucharmaster->vouchar_name = $request->vouchar_name;
        $voucharmaster->vouchar_prize = $request->vouchar_prize;
        $voucharmaster->vouchar_expiry = $request->vouchar_expiry;
        $voucharmaster->vouchar_associated_mobile = $request->vouchar_associated_mobile;
        $voucharmaster->quantity = $request->quantity;
        $voucharmaster->vouchar_status = $request->vouchar_status;
        $voucharmaster->save();

        $vouchar_id = $voucharmaster->id;
        for ($i = 0; $i < $request->quantity; $i++) {

            $vouchardetail =  new Vouchardetail();
            $vouchardetail->vouchar_id = $vouchar_id;
            $vouchardetail->vouchar_code = Str::uuid("5");
            $vouchardetail->status = 'Active';
            $vouchardetail->save();
        }
        //$productgallery->product_id=$product->id;

        return redirect()->back()
            ->with('success', 'data submit successfully');
    }

    function edit($id){
        $voucharmaster = Voucharmaster::findOrFail($id);
        return view("back_end.voucharmaster.edit", compact('voucharmaster'));
    }

    function edit_code(Request $request){
        $id = $request->id;
        $request->validate([
            'vouchar_name' => 'required',
            'vouchar_prize' => 'required',
            'vouchar_expiry' => 'required',
            'vouchar_associated_mobile' => 'required|numeric|digits:10',
            'quantity' => 'required',
            'vouchar_status' => 'required',

        ]);

        $voucharmaster =  Voucharmaster::find($id);
        $voucharmaster->vouchar_name = $request->vouchar_name;
        $voucharmaster->vouchar_prize = $request->vouchar_prize;
        $voucharmaster->vouchar_expiry = $request->vouchar_expiry;
        $voucharmaster->vouchar_associated_mobile = $request->vouchar_associated_mobile;
        $voucharmaster->quantity = $request->quantity;
        $voucharmaster->vouchar_status = $request->vouchar_status;
        $voucharmaster->save();

        $vouchar_id = $voucharmaster->id;
        for ($i = 0; $i < $request->quantity; $i++) {

            $vouchardetail =  new Vouchardetail();
            $vouchardetail->vouchar_id = $vouchar_id;
            $vouchardetail->vouchar_code = Str::uuid("5");
            $vouchardetail->status = 'Active';
            $vouchardetail->save();
        }
        //$productgallery->product_id=$product->id;

        return redirect()->back()
            ->with('success', 'data submit successfully');

    }
    function voucharmasterdelete($id)
    {

        $data = Voucharmaster::find($id);
        $data->delete();

        return redirect("backend/voucharmaster/show")
            ->with('success', 'data deleted successfully');
    }
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
