<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->validated();
            if (!auth()->guard()->attempt($credentials)) {
                return $this->res(401, "Credentials is not valid");
            }
            $expired_at = Carbon::now()->addDay()->isoFormat('YYYY-MM-DD HH:mm:ss');
            $token = auth()->guard()->user()->createToken('authToken')->plainTextToken;
            $role = auth()->guard()->user()->role;

            return $this->res(200, "Success", compact('token', 'role', 'expired_at'));
        } catch (HttpException $th) {
            return $this->res($th->getStatusCode(), $th->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return $this->res(200, "Success");
        } catch (HttpException $th) {
            return $this->res($th->getStatusCode(), $th->getMessage());
        }
    }

    public function me(Request $request)
    {
        try {
            return $this->res(200, "Success", $request->user());
        } catch (HttpException $th) {
            return $this->res($th->getStatusCode(), $th->getMessage());
        }
    }

}
