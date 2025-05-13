<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CustomerAuthController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('auth.index',compact('user'));
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $redi = $request->only('email', 'password');
        $remember = $request->filled('remember');
        if (Auth::attempt($redi,$remember)) {
            return redirect()->intended('/admin'); // Chuyển hướng đến '/admin' sau khi đăng nhập thành công
        }

        return redirect()->back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        // Create news user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('guest');
        // Log the user in after registration
        auth()->login($user);

        // Redirect to intended page or dashboard
        return redirect()->intended('/login'); // Hoặc chuyển hướng đến trang khác
    }
    public function edit()
    {
        return view('auth.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => [
                'required',
                'confirmed',
                Password::min(4)->mixedCase()->letters()->numbers()->symbols()
            ],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('password.edit')->with('status', 'Password changed successfully!');
    }
    public function listAccount(){
        $users = User::with('roles.permissions')->get();
        $roles = Role::all();
        return view('admin.accountList',compact('users','roles'));
    }

    public function listPermission(){
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('admin.permission', compact('roles', 'permissions'));
    }
    public function updatePermission(Request $request)
    {
        $role = Role::findById($request->role_id);
        $role->syncPermissions($request->permissions);
        return redirect()->route('list.index')->with('success', 'Cập nhật quyền thành công cho role!');
    }

    public function create()
    {
        return view('admin.permission.permissionCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Tạo quyền mới thành công!');
    }
    public function changeRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);
        $user->syncRoles([$request->role]);

        return back()->with('success', 'Đã cập nhật vai trò cho user!');
    }
    public function createRole()
    {
        return view('admin.roles.add');
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->route('list.index')->with('success', 'Tạo vai trò thành công!');
    }
    public function destroyRole($id)
    {
        $role = Role::findOrFail($id);

        $users = \App\Models\User::role($role->name)->get();
        foreach ($users as $user) {
            $user->removeRole($role->name);
            $user->assignRole('guest');
        }
        $role->delete();
        return redirect()->route('list.index')->with('success', 'Đã xóa vai trò và gán lại role "guest" cho user.');
    }
}
