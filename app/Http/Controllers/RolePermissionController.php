<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use DB;

class RolePermissionController extends Controller
{
    protected $roles;
    protected $permissions;

    public function __construct(Role $roles, Permission $permissions)
    {
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roles->all();
        $permissions = $this->permissions->all();
        $rolepermission = $this->checkRolePermission();
        return view('rolepermission.index', compact('roles', 'permissions', 'rolepermission'));
    }

    /**
     * Check Role has Permission
     * @param $roleID
     * @param $permissionID
     * @return bool
     */
    protected function checkRolePermission()
    {
        $role_permissions = DB::table('permission_role')->select('permission_id', 'role_id')->get();
        $data = [];
        foreach ($role_permissions as $role_permission){
            $data[$role_permission->permission_id][$role_permission->role_id] = true;
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       //truncate table permission role before save data
       DB::table('permission_role')->truncate();

       $parametters = $request->except('_token');
       array_walk($parametters, function($value, $key){
         $key = explode('|', $key);
         $role = Role::where('name', $key[1])->first();
         $permission = Permission::where('name', $key[0])->first();
         $role->attachPermission($permission);
       });
       $request->session()->flash('message.level', 'success');
       $request->session()->flash('message.content', 'Cập nhật thành công');
       return redirect(route('Roles.permissions'))->with('status', 'Roles has been created.');
    }
}
