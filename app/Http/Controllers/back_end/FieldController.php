<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Field;

class FieldController extends Controller
{
    //
    function index()
    {
        $data = Field::where('status','Active')->get();
        return view("back_end.field.index", compact('data'));
    }
    function create()
    {
        return view("back_end.field.create");
    }
    function edit($id)
    {
        $data = Field::find($id);
        return view("back_end.field.edit", compact('data'));
    }
    function field_code(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $field = new Field();
        $field->name = $request->name;
        $field->description = $request->description;
        $field->save();
        return redirect("backend/field/show")
            ->with('success', 'Field submited successfully');
    }
    function fielddelete($id)
    {
        
        $data = Field::find($id);
        if($data){
            $data->status = 'Deleted';
            $data->save();
            return redirect("backend/field/show")->with('success', 'Field deleted successfully');
        }
        return redirect("backend/field/show")
            ->with('error', 'Field not found');
    }
    function edit_code(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $id = $request->id;
        $field = Field::find($id);
        $field->name = $request->name;
        $field->description = $request->description;
        $field->save();
        return redirect("backend/field/show")
            ->with('success', 'Field Update successfully');
    }
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}