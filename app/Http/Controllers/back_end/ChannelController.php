<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Channel;

class ChannelController extends Controller
{
    public function index(Request $request)
    {
        $data = Channel::simplePaginate(0);
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
            'aadharcard' => 'required',
            'pancard' => 'required',
            'contact' => 'required',
            'partnership' => 'required',
            'url' => 'required',

        ]);
        $channel = new Channel();
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
        $data->delete();
        return redirect("backend/channel/show")
            ->with('success', 'Channel deleted successfully');
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
