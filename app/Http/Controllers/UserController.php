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
        $user = \Auth::user();
        $user_data = $request->get('user_data');
        $user_data['password'] = Hash::make($user_data['password']);
        DB::beginTransaction();
        try {
            if($user->hasPermissionTo('user_create')) {
                $user = User::create($user_data);
                $user->assignRole($user_data['role']);
                DB::commit();
                return [
                    'result' => 'success',
                    'message' => 'Амжилттай',
                    'user'  => $user
                ];
            }
            else {
                return [
                    'result' => 'failed',
                    'message' => 'Танд энэ үйлдлийг хийх эрхгүй байна.'
                ];
            }
            
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

        DB::beginTransaction();
        try {
            $deletion = User::find($id)->delete();
            DB::commit();

        }catch (\Exception $e) {
            DB::rollback();
            $deletion = false;
        }
        return [
            'result' => $deletion
        ];

    }

    public function delete_selected(Request $request) {

        $user = \Auth::user();
        
        if(isset($request['ids']) && !empty($request['ids'])) {
            if($user->hasPermissionTo('user_delete')) {
                $count = User::whereIn('id', $request['ids'])->delete();
                return [
                    'result' => 'success',
                    'message' => 'Таны сонгосон '.$count.' хэрэглэгч устлаа.'
                ]; 
            }
            else {
                return ['result' => 'failed', 'message' => 'Та энэ үйлдлийг хийх эрхгүй !'];
            }
            
        }
        return [
            'result' => 'failed',
            'message' => 'Мэдээлэл буруу эсвэл хэрэглэгч сонгоогүй байна.'
        ];
    }

    public function update($id, Request $request) {

        unset($request['_token']);
        unset($request['avatar_remove']);
        unset($request['email']);
        $user = \Auth::user();
        
        if($user->hasPermissionTo('user_edit')) {
            DB::beginTransaction();
            try {
                $user_update = User::find($id)->update($request->all());
                DB::commit();
                session()->flash('success', 'Хэрэглэгчийн мэдээллэл шинэчлэгдлээ.');
            }catch (\Exception $e) {
                DB::rollback();
                session()->flash('error', $e->getMessage());
            }
        }
        else {
            session()->flash('error', 'Хэрэглэгчийн мэдээллэл засах эрхгүй байна.');
        }

        return redirect()->back();
    }
}
