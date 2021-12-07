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

    public function show($id) {
        $user = User::find($id);
        $roles = Role::all();
        return view('users.view', compact('user', 'roles'));
    }

    public function roleAssign(Request $request, $user_id ) {
        if(isset($request['roles']) && !empty($request['roles'])) {
            $user = User::find($user_id);
            $user->syncRoles($request['roles']);
            session()->flash('success', 'Хэрэглэгчийн үүргийг шинэчиллээ.');
        }
        return redirect(route('user.view', $user_id));
    }
}
