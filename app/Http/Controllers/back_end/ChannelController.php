<?php

namespace App\Http\Controllers\back_end;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Channel;
use Illuminate\Support\Facades\Auth;

class ChannelController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:channel-index',['only' => ['index']]);
        $this->middleware('permission:channel-create',['only' => ['create','channel_code']]);
        $this->middleware('permission:channel-edit',['only' => ['edit','edit_code']]);
        $this->middleware('permission:channel-delete',['only' => ['channeldelete']]);        
    }
    
    public function index(Request $request)
    {
        $roles = Auth::user()->roles->first();
        $user = Auth::user()->id;
        if($roles->name == 'Admin')
        {
            $data = Channel::where('status','Active')->simplePaginate(0);
        }else{
            $data = Channel::where('status','Active')->where('user_id',$user)->simplePaginate(0);
        }
        return view("back_end.channel.index", compact('data'));
    }
    function create()
    {
        return view("back_end.channel.create");
    }
    function edit($id)
    {
        $data = Channel::find($id);
        return view("back_end.channel.edit", compact('data'));
    }
    public function channel_code(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'aadharcard' => 'required|numeric|digits:12',
            'pancard' => 'required|string|size:10|regex:/^[A-Z]{5}\d{4}[A-Z]{1}$/',
            'contact' => 'required|digits:10|numeric|regex:/^[6-9]\d{9}$/',
            'partnership' => 'required',
            'url' => 'required',
        ]);
        
        $channel = new Channel();
        $channel->user_id = $request->user_id;
        $channel->name = $request->name;
        $channel->address = $request->address;
        $channel->city = $request->city;
        $channel->aadharcard = $request->aadharcard;
        $channel->pancard = $request->pancard;
        $channel->contact = $request->contact;
        $channel->partnership = $request->partnership;
        $channel->url = $request->url;
        $channel->save();
        return redirect("backend/channel/show")
            ->with('success', 'Channel submit successfully');
    }
    function channeldelete($id)
    {
        $data = Channel::find($id);
        if($data){
            $data->status = "Deleted";
            $data->save();
            return redirect("backend/channel/show")
            ->with('success', 'Channel deleted successfully');
        }
        return redirect("backend/channel/show")
            ->with('error', 'Field not found');
    }
    function edit_code(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'aadharcard' => 'required',
            'pancard' => 'required',
            'contact' => 'required',
            'partnership' => 'required',
            'url' => 'required',
        ]);
        
        $id = $request->id;
        $channel = Channel::find($id);
        $channel->user_id = $request->user_id;
        $channel->name = $request->name;
        $channel->address = $request->address;
        $channel->city = $request->city;
        $channel->aadharcard = $request->aadharcard;
        $channel->pancard = $request->pancard;
        $channel->contact = $request->contact;
        $channel->partnership = $request->partnership;
        $channel->url = $request->url;
        $channel->save();
        return redirect("backend/channel/show")
            ->with('success', 'Channel Update successfully');
    }
}