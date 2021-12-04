<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
}
