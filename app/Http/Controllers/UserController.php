<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    //
    public function index()
    {
        //
        $roles = Role::all();
        $users = User::with('roles')->get();
        return view('users.list', compact('users', 'roles'));
    }
}
