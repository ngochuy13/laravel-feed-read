<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $listUser = $user->orderBy('created_at', 'desc')->paginate(10);
        return view('user.index', compact('listUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Role $role)
    {
        $role = $role->pluck('display_name', 'id')->toArray();
        $rolesChecked = [];

        return view('user.form', compact('user' , 'role', 'rolesChecked'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CustomerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request, UserService $userService)
    {
        $userService->createUser($request->all());
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Tài khoản đã được tạo thành công');
        return redirect()->route('User.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Role $role)
    {
        $user = User::findOrFail($id);
        $role = $role->pluck('display_name', 'id')->toArray();

        //load user has roles
        $rolesChecked = $user->roles()->addSelect('id')->get()->toArray();
        $rolesChecked = array_map(function($value) {
            return $value['id'];
        }, $rolesChecked);

        return view('user.form', compact('user', 'role', 'rolesChecked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, UserService $userService)
    {
        $userService->updateUser($request->all());
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Tài khoản đã được cập nhật thành công');
        return redirect(route('User.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Tài khoản đã được xoá thành công');
        return redirect(route('User.index'));
    }
}
