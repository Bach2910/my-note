<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleOrPermissionController extends Controller
{
    //
    public function index()
    {
        $users = User::with('roles.permissions')->get();
        $roles = Role::all();
        return view('auth.listAuth', compact('users', 'roles'));
    }

    public function listPermission()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('auth.listPermission', compact('roles', 'permissions'));
    }
    public function updatePermission(Request $request)
    {
        $role = Role::findById($request->role_id);
        $role->syncPermissions($request->permissions);
        return redirect()->route('list-account')->with('success', 'Cập nhật quyền thành công cho role!');
    }
    public function changeRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);
        $user->syncRoles([$request->role]);

        return back()->with('success', 'Đã cập nhật vai trò cho user!');
    }
    public function listRole(){
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }
    public function createRole()
    {
        return view('roles.create');
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
        Role::create(['name' => $request->name]);
        return redirect()->route('list-account');
    }

    public function destroyRole(string $id){
        $role = Role::findOrFail($id);

        $users = User::role($role->name)->get();
        foreach($users as $user){
            $user->removeRole($role->name);
            $user->assignRole('student');
        }
        $role->delete();
        return redirect()->route('list-account')->with('success', 'Xóa role thanh cong!');
    }
}
