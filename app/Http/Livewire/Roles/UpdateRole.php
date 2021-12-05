<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UpdateRole extends Component
{
    public $role_id;
    public $role_name;

    public $listeners = [
        'update-role:setRole'=>'setRole',
    ];

    public function setRole($id){
        $this->role_id = $id;
        $role = Role::find($id);
        $this->role_name = $role->name;
    }

    private function resetFields(){
        $this->role_name = '';
    }

    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.roles.update-role', ['permissions' => $permissions]);
    }

    public function close(){      
        $this->emit('component-modal-close','kt_modal_update_role');  
        $this->resetFields();
    }
}
