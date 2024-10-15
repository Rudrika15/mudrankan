<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    //
    function index()
    {
        $data = Currency::where('status','Active')->get();
        return view("back_end.currency.index", compact('data'));
    }
    function create()
    {
        return view("back_end.currency.create");
    }
    function edit($id)
    {
        $data = Currency::find($id);
        return view("back_end.currency.edit", compact('data'));
    }
    function currency_code(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'symbol' => 'required',
            'code' => 'required',
            'decimal_digits' => 'required',
            'rounding' => 'required',
        ]);

        $currency = new Currency();
        $currency->name = $request->name;
        $currency->symbol = $request->symbol;
        $currency->code = $request->code;
        $currency->decimal_digits = $request->decimal_digits;
        $currency->rounding = $request->rounding;
        $currency->save();
        return redirect("backend/currency/show")
            ->with('success', 'Currency submited successfully');
    }
    function currencydelete($id)
    {
        $data = Currency::find($id);
        if($data){
            $data->status = "Deleted";
            $data->save();
            return redirect("backend/currency/show")
            ->with('success', 'Currency deleted successfully');
        }
        return redirect("backend/currency/show")
            ->with('error', 'Currency not found');
    }
    function edit_code(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'symbol' => 'required',
            'code' => 'required',
            'decimal_digits' => 'required',
            'rounding' => 'required',
        ]);
        $id = $request->id;
        $currency = Currency::find($id);
        $currency->name = $request->name;
        $currency->symbol = $request->symbol;
        $currency->code = $request->code;
        $currency->decimal_digits = $request->decimal_digits;
        $currency->rounding = $request->rounding;
        $currency->save();
        return redirect("backend/currency/show")
            ->with('success', 'Currency Update successfully');
    }
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}