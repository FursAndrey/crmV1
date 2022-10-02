<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /** вариант костыля */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function welcome()
    {
        return view('welcome');
    }

    public function allRoles()
    {
        return Role::get();
    }

    public function home()
    {
        return response(Auth::user());
    }

    public function createRole(Request $request)
    {
        $role = Role::create(
            [
                'name' => $request->input('name')
            ]
        );

        return response()->json(
            [
                'role' => $role
            ]
        );
    }

    public function updateRole(Request $request, int $roleId)
    {
        $role = Role::findOrFail($roleId);
        $role->update($request->only('name'));

        return response()->json(
            [
                'new' => $role
            ]
        );
    }

    public function showRole(int $roleId)
    {
        $role = Role::findOrFail($roleId);
        return response()->json(
            [
                'role' => $role
            ]
        );
    }

    public function showUsersByRole(int $roleId)
    {
        $role = Role::findOrFail($roleId);
        $users = $role->users;
        return response()->json(
            [
                'users' => $users
            ]
        );
    }

    public function users()
    {
        return User::get()->map(
            function (User $user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'role' => $user->role->name,
                ];
            }
        );
    }

    public function user($id)
    {
        return User::find($id)->only('name', 'email');
    }
}
