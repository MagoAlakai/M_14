<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PassportController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //$token = $user->createToken('TutsForWeb')->accessToken;
        event(new Registered($user));
        return response()->json($user, 200);
    }

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken('authToken')->accessToken;
            return response()->json(['user' => Auth::user(), 'token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }

        // $login = $request->validate([
        //     'email' => 'required|string',
        //     'password' => 'required|string',
        // ]);

        // if(!Auth::attempt($login)){
        //     return response(['message' => 'Invalid login credentials']);
        // }

        // $token = Auth::user()->createToken('authToken')->token;

        // return response(['user' => Auth::user(), 'token' => $token]);
    }
    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}
