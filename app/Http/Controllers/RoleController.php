<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage roles')->except('index');
    }

    public function index()
    {
        $roles = Role::paginate(10);
        $permissions = Permission::all();

        return view('roles.index', compact('roles'))
            ->with('permissions',$permissions);
   }

   public function store(RoleStoreRequest $request)
   {
        $role = Role::create(['name' => $request->name]);

        return redirect()->route('roles.index');
   }

   public function edit(Role $role)
   {
       return view('roles.edit', compact('role'))
           ->with('permissions', Permission::all());
   }

   public function update(Role $role, RoleUpdateRequest $request)
   {
       $role->givePermissionTo($request->permissions);

       return redirect()->route('roles.index');
   }

   public function destroy(Role $role)
   {
       $role->delete();

       return redirect()->route('roles.index');
   }
}
