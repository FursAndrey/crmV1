<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class MainController extends Controller
{
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
}
