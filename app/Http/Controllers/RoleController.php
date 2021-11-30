<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::withCount('users')->get();
        return view('roles.list', compact('roles'));
        
    }

    public function create(Request $request)
    {
        dd($request->all());
        Role::create(['name' => $request['role_name']]);
        return redirect('users/roles');
    }
}
