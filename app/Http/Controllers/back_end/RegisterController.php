<!-- <?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    // public function show()
    // {
    //     return view('back_end.auth.register');
    // }

    // /**
    //  * Handle account registration request
    //  * 
    //  * @param RegisterRequest $request
    //  * 
    //  * @return \Illuminate\Http\Response
    //  */
    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'firstname' => 'required',
    //         'lastname' => 'required',
    //         'email' => 'required',
    //         'contactNo' => 'required|digits:10',
    //         'password' => 'required|confirmed',
    //         'userStatus' => 'required',
    //     ]);

    //     $user = new User();
    //     $user->firstname = $request->firstname;
    //     $user->lastname = $request->lastname;
    //     $user->email = $request->email;
    //     $user->contactNo = $request->contactNo;
    //     $user->password = $request->password;
    //     $user->userStatus = $request->userStatus;
    //     $user->status = "Active";
    //     $user->save();

    //     // $user = User::create($request->validated());

    //     auth()->login($user);

    //     return redirect()->route('login.perform')->with('success', "Account successfully registered.");
    // }
} 