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
        return view('roles.permissions');
    }

    public function permissions_json(Request $request) {
        $result = [];
        $result['draw'] = (isset($request['draw'])) ? $request['draw'] : 0;
        $query = Permission::select('*');
        
        $result['recordsTotal'] = $query->count();

        //Search by Name and Tags
        if (isset($request['search_key']) && trim($request['search_key'])) {
            $query->whereRaw('name like "%'.$request['search_key'].'%"');
        }

        //Шүүлт хийсний дараах бичлэгийн тоог авч бна
        $result["recordsFiltered"] = $query->count();

        if(isset($request['start']) && isset($request['length']))
        $query->offset($request['start'])->limit($request['length']);
    
        $result['data'] = $query->orderby('created_at', 'DESC')->get()->toArray();
        $result['draw']++;
        return $result;
    }

    public function permissions_ajax_add(Request $request) {
        $permission = false;
        DB::beginTransaction();
        try {
            $permission = Permission::create(['name' => $request['permission_name']]);
            DB::commit();

        }catch (\Exception $e) {
            DB::rollback();
        }
        return $permission;
    }

    public function permissions_delete(Request $request) {
        $permission = false;
        $message = '';
        $user = \Auth::user();
        try {
            if($user->hasPermissionTo('permission_delete')) {
                if(isset($request['ids']) && !empty($request['ids'])) {
                    DB::beginTransaction();
                    $permission = Permission::whereIn('id', $request['ids'])->delete();
                    $message = 'Амжилттай устгалаа.';
                    DB::commit();
                }
            }
            else {
                throw new \Exception('Та энэ үйлдлийг хийх эрхгүй байна !');
            }
            
            
        }catch (\Exception $e) {
            DB::rollback();
            $message = $e->getMessage();
        }
        
        return ['result' => ($permission) ? 'success' : 'failed', 'message' => $message ];
        
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
        $role_permissions = $role->permissions->pluck('name')->toArray();
        
        if(!empty($role_permissions) || empty($request['permissions'])) {
            $permission_to_revoke = array_diff($role_permissions, $request['permissions']);
            $permission_to_give = array_diff($request['permissions'],$role_permissions);
        }
        //Remove permissions
        if(!empty($permission_to_revoke)) {
            foreach($permission_to_revoke as $revoke) {
                $role->revokePermissionTo($revoke);
            }
        }
        //Assign selected permissions
        if(!empty($permission_to_give)) {
            foreach($permission_to_give as $give) {
                $role->givePermissionTo($give);
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
