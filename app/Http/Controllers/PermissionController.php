<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //
    public function index(){
        return view('admin.permissions.index', [
            'permissions'=>Permission::all(),
        ]);
    }

    public function store(){

        request()->validate([
            'name'=>['required']
        ]);

        Permission::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-') //making lower case and adding seperator '-' between words
        ]);

        return back();
    }

    public function edit(Permission $permission){
        return view('admin.permissions.edit',[
            'permission'=>$permission,
            'permissions'=>Permission::all(),
        ]);
    }

    public function update(Permission $permission){
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(Str::ucfirst(request('name')))->slug('-');

        if($permission->isDirty('name')){         //checks to see if data passed is different in the database. can also use isClean()
            session()->flash('permissionUpdatedMessage','Role was updated successfully.');
            $permission->save();
        } else{
            session()->flash('permissionUpdatedMessage','No changes made.');
        }

        
        return redirect(route('permissions.index'));
    }

    public function destroy(Permission $permission){
        $permission->delete();
        session()->flash('permissionDeletedMessage','Permission: '.$permission->name.' was deleted successfully.');
        return back();
    }
}
