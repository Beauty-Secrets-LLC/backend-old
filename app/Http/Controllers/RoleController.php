<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::withCount('users')->get();
        $permissions = Permission::all()->toArray();
        return view('roles.list', compact('roles', 'permissions'));
    }

    public function permissions_list() {
        $permissions = Permission::all()->toArray();
        return view('roles.permissions', compact('permissions'));
    }

    public function permissions_ajax_add(Request $request) {
        DB::beginTransaction();
        try {
            $permission = Permission::create(['name' => $request['permission_name']]);
            DB::commit();

        }catch (\Exception $e) {
            DB::rollback();
            $permission = false;
        }
        return $permission;
    }

    public function permissions_delete($id) {
        $permission = Permission::find($id)->delete();
        return $permission;
    }



    public function create(Request $request)
    {
        $role = Role::create(['name' => $request['role_name']]);
        if(isset($request['permissions']) && !empty($request['permissions'])) {
            foreach($request['permissions'] as $permission) {
                $role->givePermissionTo($permission);
            }
        }
        return redirect('users/roles');
    }

    public function view($id) {
        $role = Role::find($id);
        $users = User::role($role->name)->get();
        return view('roles.view', compact('role', 'users'));
    }

    public function update(Request $request) {
        $role = Role::find($request['role_id']);
        $role_permissions = $role->permissions;
        //Remove all permissions
        if(!empty($role_permissions) || empty($request['permissions'])) {
            foreach($role_permissions as $role_permission) {
                $role->revokePermissionTo($role_permission->id);
            }
        }
        //Assign selected permissions
        if(!empty($request['permissions'])) {
            foreach($request['permissions'] as $permission) {
                $role->givePermissionTo($permission);
            }
        }
        session()->flash('success', 'Амжилттай шинэчлэгдлээ.');
        return redirect('/user/roles');
    }

    public function removeUser($role_id, $user_id) {
        $role = Role::find($role_id);
        $user = User::find($user_id)->removeRole($role->name);
        return true;
    }
}
