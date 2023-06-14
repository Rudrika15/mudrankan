<?php
namespace App\Http\Controllers\back_end;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeeController extends Controller
{
    //
    public function index() 
    {
        return view('back_end.home.index');
    }
}
