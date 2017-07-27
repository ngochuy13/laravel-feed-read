<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('role.index')->withRoles($roles);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Role $role )
    {
        return view('role.form', compact('role'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show( Role $role )
    {
        return view('role.form', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        Role::create($request->all());
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Chức vụ đã được tạo thành công');
        return redirect(route('Role.index'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function update(RoleRequest $request, $id)
    {
        $data = $request->all();
        Role::where('id', $id)->update([
            'name' => $data['name'],
            'display_name' => $data['display_name'],
            'description' => $data['description'],
        ]);
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Chức vụ đã được cập nhật thành công');
        return redirect(route('Role.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('role.form', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $role = Role::findOrFail($id);
        $role->forceDelete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Chức vụ đã được xóa thành công');
        return redirect(route('Role.index'))->with('status', 'Roles has been deleted.');
    }
}
