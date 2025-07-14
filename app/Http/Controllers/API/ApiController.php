<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User; // Assuming you have a User model
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function loginAction(Request $request)
    {
        $credential = $request->only('email', 'password');
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        if (!Auth::attempt($credential)) {
            return response()->json(['status' => 'error', 'message' => 'InvaliD Cedentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('api_token')->plainTextToken;
        return response()->json(['status' => 'success', 'user' => $user, 'token' => $token]);
    }

    public function me()
    {
        return response()->json(['status' => 'success', 'data' => Auth::user()]);
    }
    public function getUsers()
    {
        $users = User::get();
        return response()->json(['data' => $users]);
    }

    public function storeUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:3',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
            }

            $users = User::create($request->all());
            return response()->json(['data' => $users, 'message' => 'Request success'], 201);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'Request failed', 'errors' => $th->getMessage()], 500);
        }
    }

    public function updateUser(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:3',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
            }

            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            return response()->json(['status' => 'success', 'message' => 'Request Update Sucess', 'data' => $user]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'Request failed', 'errors' => $th->getMessage()], 500);
        }
    }

    public function deleteUser($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return response()->json(['status' => 'success', 'message' => 'Request Delete Sucess']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'Request failed', 'errors' => $th->getMessage()], 500);
        }
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['status' => 'success', 'message' => 'Request Sucess', 'data' => $user]);
    }
}
