<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function index()
    {
        $users = User::latest()->paginate(5);
        $roles = Role::get();

        return view('back_end.users.index', compact('users','roles'));
    }

    /**
     * Show form for creating user
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('back_end.users.create', compact('roles'));
    }

    /**
     * Store a newly created user
     * 
     * @param User $user
     * @param StoreUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //For demo purposes only. When creating user or inviting a user
        // you should create a generated random password and email it to the user


        $user = new User();

        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->contactNo = $request->contactNo;
        $user->password = bcrypt('123456');
        $user->save();
        $user->assignRole($request->role);

        // $user->assignRole($request->role);



        return redirect()->back()
            ->withSuccess(__('User created successfully.'));
    }

    /**
     * Show user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('back_end.users.show', [
            'user' => $user
        ]);
    }


    public function assignRole(Request $request)
    {

        // return $request();

            // Validate the incoming request
            $request->validate([
                'userId' => 'required|exists:users,id',
                'roleId' => 'required|exists:roles,id',
            ]);

            // Find the circle member
            //   return  $member = CircleMember::findOrFail($request->memberId);

            $user = User::where('id', $request->userId)->first();

            // Find the role
            $role = Role::findOrFail($request->roleId);

            // Attach the role to the user (assuming the relationship is defined)
            $user->roles()->attach($role);

            return redirect()->back()->with('success', 'Role assigned successfully.');
    
    }
    public function removeRole(Request $request)
    {
            // Validate the incoming request
            $request->validate([
                'userId' => 'required|exists:users,id',
                'roleId' => 'required|exists:roles,id',
            ]);

            // Find the circle member
            $member = User::where('id', $request->userId)->firstOrFail();

            // Find the role
            $role = Role::findOrFail($request->roleId);

            // Detach the role from the user (assuming the relationship is defined)
            $member->roles()->detach($role);

            return redirect()->back()->with('success', 'Role removed successfully.');
       
    }
    /**
     * Edit user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('back_end.users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    /**
     * Update user data
     * 
     * @param User $user
     * @param UpdateUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'fistName' => 'required|string|max:255',
        //     'lastName' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email,' . $id,
        //     'role' => 'required'
        // ]);

        $user = User::findOrFail($id);

        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->contactNo = $request->contactNo;

        $user->save();
        $user->syncRoles($request->role);


        return redirect()->back()
            ->withSuccess(__('User updated successfully.'));
    }

    /**
     * Delete user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }
}