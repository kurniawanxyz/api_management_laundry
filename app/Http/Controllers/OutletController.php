<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOutletRequest;
use App\Http\Requests\UpdateOutletRequest;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OutletController extends Controller
{

    public function index(){
        try {
            $outlets = Outlet::paginate(10);
            return $this->res(200, "Outlets", $outlets);
        } catch (HttpException $th) {
            return $this->res($th->getStatusCode(),$th->getMessage());
        }
    }

    public function show(int $outlet){
        try {
            $outlet = Outlet::find($outlet);

            if(!$outlet){
                return $this->res(404, "Outlet not found");
            }

            return $this->res(200, "Outlet", $outlet);
        } catch (HttpException $th) {
            return $this->res($th->getStatusCode(),$th->getMessage());
        }
    }

    public function store(StoreOutletRequest $request){
        try {
            $data = request()->validated();
            $outlet = Outlet::create($data);
            return $this->res(200, "Outlet created", $outlet);
        } catch (HttpException $th) {
            return $this->res($th->getStatusCode(),$th->getMessage());
        }
    }

    public function update(UpdateOutletRequest $request, int $outlet){
        try {
            $data = request()->validated();
            $outlet = Outlet::find($outlet);

            if(!$outlet){
                return $this->res(404, "Outlet not found");
            }

            $outlet->update($data);
            return $this->res(200, "Outlet updated", $outlet);
        } catch (HttpException $th) {
            return $this->res($th->getStatusCode(),$th->getMessage());
        }
    }

    public function destroy(int $outlet){
        try {
            $outlet = Outlet::find($outlet);

            if(!$outlet){
                return $this->res(404, "Outlet not found");
            }

            $outlet->delete();
            return $this->res(200, "Outlet deleted");
        } catch (HttpException $th) {
            return $this->res($th->getStatusCode(),$th->getMessage());
        }
    }
}
