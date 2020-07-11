<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Str;
use App\Permission;

class RoleController extends Controller
{
    //
    public function index(){
        return view('admin.roles.index', [
            'roles'=>Role::all(),
        ]);
    }

    public function store(){

        request()->validate([
            'name'=>['required']
        ]);

        Role::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-') //making lower case and adding seperator '-' between words
        ]);

        return back();
    }

    public function destroy(Role $role){
        $role->delete();
        session()->flash('roleMessage','Role '.$role->name.' was deleted successfully.');
        return back();
    }

    public function edit(Role $role){
        return view('admin.roles.edit',[
            'role'=>$role,
            'permissions'=>Permission::all()
        ]);
    }

    public function update(Role $role){
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(Str::ucfirst(request('name')))->slug('-');

        if($role->isDirty('name')){         //checks to see if data passed is different in the database. can also use isClean()
            session()->flash('roleUpdatedMessage','Role was updated successfully.');
            $role->save();
        } else{
            session()->flash('roleUpdatedMessage','No changes made.');
        }

        
        return redirect(route('roles.index'));
    }

    
    public function attach_permission(Role $role){          //attach permission to a role
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detach_permission(Role $role){          //detach permission to a role
        $role->permissions()->detach(request('permission'));
        return back();
    }
}
