<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function index(Request $request)
    {
        $checkRole = $request->has('role') && intval($request->get('role')) > 0;
        $userRoles = UserRole::query()->get();
        $user = User::query()
            ->join('user_roles', 'users.user_role_id', '=', 'user_roles.id')
            ->when($checkRole, function ($q) use ($request) {

                $q->where('user_roles.id', $request->get('role'));
            })
            ->addSelect('users.*', 'user_roles.name as role')
            ->paginate(10);
        $user['userRoles'] = $userRoles;
        return response()->json($user);
    }
    public function create()
    {
        return UserRole::query()->get();
    }
    public function store(StoreUserRequest $request)
    {
        $userData = $request->validated();
        // User::query()->create([
        //     'name' => $userData['name'],
        //     'email' => $userData['email'],
        //     'username' => $userData['username'],
        //     'password' => Hash::make($request['password']),
        //     'phone_number' => $userData['phone_number'],
        //     'user_role_id' => $userData['role'],
        // ]);
        User::query()->create($userData);
    }
    public function edit($id)
    {
        return User::query()->findOrFail($id);
    }
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::query()->findOrFail($id);
        $data = $request->validated();
        $user->fill($data);
        $user->save();
        // User::query()->where('id',$id)->update($request->get());
    }
    public function destroy($id)
    {
        User::destroy($id);
    }
}
