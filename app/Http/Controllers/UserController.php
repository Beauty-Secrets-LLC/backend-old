<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function register(Request $request) {
        
        $user_data = $request->get('user_data');
        $user_data['password'] = Hash::make($user_data['password']);
        DB::beginTransaction();
        try {
            $user = User::create($user_data);
            $user->assignRole($user_data['role']);
            DB::commit();
            return [
                'result' => 'success',
                'message' => 'Амжилттай',
                'user'  => $user
            ];
        }
        catch(\Exception $e) {
            DB::rollback();
            return [
                'result' => 'failed',
                'message' => $e->getMessage()
            ];
        }
    }

    public function roleAssign(Request $request, $user_id ) {
        if(isset($request['roles']) && !empty($request['roles'])) {
            $user = User::find($user_id);
            $user->syncRoles($request['roles']);
            session()->flash('success', 'Хэрэглэгчийн үүргийг шинэчиллээ.');
        }
        return redirect(route('user.view', $user_id));
    }

    public function delete($id) {
        
        $deletion = User::find($id)->delete();
        return [
            'result' => $deletion
        ];

    }
}
