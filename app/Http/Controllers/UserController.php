<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Http\Requests\CashierStoreRequest;
use App\Http\Requests\OwnerStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserController extends Controller
{
    public function storeOwner(OwnerStoreRequest $req)
    {
        dd($req->validated());
        try {
            $data = $req->validated();
            $data['role'] = Role::owner->value;
            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);
            return $this->res(201, "Owner created", $user);
        } catch (HttpException $th) {
            return $this->res($th->getStatusCode(), $th->getMessage());
        }
    }

    public function storeCashier(CashierStoreRequest $req)
    {
        try {
            $data = $req->validated();
            $data['role'] = Role::cashier->value;
            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);
            return $this->res(201, "Owner created", $user);
        } catch (HttpException $th) {
            return $this->res($th->getStatusCode(), $th->getMessage());
        }
    }
}