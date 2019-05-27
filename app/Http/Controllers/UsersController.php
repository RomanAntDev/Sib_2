<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * @var User  $user
     */
    public $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createNewUser(Request $request)
    {
        if ($this->user->hasRole('admin')) {

            $this->validateData($request);

            $role = $request->get('role');

            $request['password'] = Hash::make($request['password']);
            $user = User::create($request->toArray());
            $user->assignRole($role);
            $user->createToken('token')->accessToken;

            return response()->json(User::find($user->id));
        };

        return response("Not access", 200);
    }

    /**
     * @param Request $request
     * @param $user
     * @return mixed
     */
    public function editUser(Request $request, $user)
    {
        if ($this->user->hasRole('admin')) {

            dd($user);

            $this->validateData($request);

            User::whereId($user)
                ->update([
                    'username' => $request['username'],
                    'fullname' => $request['fullname'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'password' => $request['password'] = Hash::make($request['password']),
                    'block' => $request['active'],
                ]);
            return response()->json(User::find($user->id));
        }
        return response("Not access", 200);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function createNewVendor(Request $request)
    {
//        dd($this->user->hasRole('admin'));
        if ($this->user->hasRole('admin')) {

            $this->validateData($request);

            $request['password'] = Hash::make($request['password']);
            $user = User::create($request->toArray());
            $user->assignRole('vendor');
            $user->createToken('token')->accessToken;

            return response()->json(User::find($user->id));
        };

        return response("Not access", 200);
    }

    public function editVendor(Request $request, $user)
    {
        if ($this->user->hasRole('admin')) {

            $this->validateData($request);

            User::whereId($user)
                ->update([
                    'username' => $request['username'],
                    'fullname' => $request['fullname'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'password' => $request['password'] = Hash::make($request['password'])
                ]);
            return response()->json(User::find($user->id));
        }
        return response("Not access", 200);
    }

    /**
     * @param Request $request
     * @return Request
     */
    protected function validateData(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'max:12',
            'password' => 'string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        return $request;
    }
}
