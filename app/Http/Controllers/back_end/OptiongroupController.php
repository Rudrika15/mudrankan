<?php
namespace App\Http\Controllers\back_end;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Optiongroup;

class OptiongroupController extends Controller
{
    //
    function index()
    {
        $data=Optiongroup::where('status','Active')->get();
        return view("back_end.optiongroup.index",compact('data'));
    }
    function create()
    {
        $data=Optiongroup::all();
        return view("back_end.optiongroup.create",compact('data'));
    }
    function edit($id)
    {
        $data= Optiongroup::find($id);
        return view("back_end.optiongroup.edit",compact('data'));
    }
    function optiongroup_code(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $optiongroup =new Optiongroup();
        $optiongroup->name = $request->name;
        $optiongroup->save();
        return redirect()->back()
                        ->with('success','data submit successfully');
        
        
    }
    function optiongroupdelete($id)
    {
        $data= Optiongroup::find($id);
        if($data){
            $data->status = "Deleted";
            $data->save();
            return redirect("backend/optiongroup/show")
            ->with('success','data deleted successfully');
        }
         // return redirect('/index');
         return redirect("backend/optiongroup/show")
         ->with('error', 'OptionGroup not found');
     
     }

     function edit_code(Request $request)
     {
         $request->validate([
             'name' => 'required',
         ]);
 
            $id=$request->id;
            $optiongroup = Optiongroup::find($id);
            $optiongroup->name = $request->name;
            $optiongroup->save();
            return redirect("backend/optiongroup/show")
                         ->with('success','data update successfully');
         
         
     }
     public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}