<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use RealRashid\SweetAlert\Facades\Alert;


class RoleController extends Controller
{
    public function index()
    {
        $role = Role::orderBy('created_at', 'DESC')->paginate(10);
        return view('role.index', compact('role'))->with('i');
    }

    public function create()
    {
        $permission = Permission::get();
        // $roles = Role::pluck('name', 'name')->all();
        return view('role.create', compact('permission'));
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|string|max:50'
        // ]);

        // $role = Role::firstOrCreate(['name' => $request->name]);
        // return redirect()->back()->with(['success' => 'Role: <strong>' . $role->name . '</strong> Ditambahkan']);
        $this->validate($request, [
            'role_name' => 'required',
            'permission' => 'required',
        ]);


        $role = Role::create(['name' => $request->input('role_name')]);
        $role->syncPermissions($request->input('permission'));

        Alert::success('Success ', 'Berhasil Membuat permission Role ');
        return redirect()->route('role-index');
    }


    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->back()->with(['success' => 'Role: <strong>' . $role->name . '</strong> Dihapus']);
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();


        return view('role.update', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'name' => 'required',
            'permission' => 'required',
        ]);


        $role = Role::find($id);
        // $role->name = $request->input('name');
        // $role->save();
        $role->syncPermissions($request->input('permission'));


        Alert::success('Success ', 'Permission role Berhasil di Update');
        return redirect()->route('role-user');
    }
}
