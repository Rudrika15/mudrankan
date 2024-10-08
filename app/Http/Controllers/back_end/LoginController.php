<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('back_end.auth.login');
    }

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)){
            
             return redirect()->back()
            ->withInput() 
            ->withErrors(['auth_failed' => 'These credentials do not match our records.']);
        }
    
        //     return redirect()->to('/backend/login')
        //         ->withErrors(['auth.failed' => 'These credentials do not match our records.']);
        // endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user) 
    {
        return redirect('/backend/home');
    }

}