<?php
namespace App\Repositories;
use App\Vendors;

class VendorsRepository extends ManageDataRepository {

    public function modelClass(){
        return Vendors::class;
    }

    public function create(array $request)
    {
             Vendors::create([
                  'name' => $request['name'],
                  'users_id' => $request['users_id'],
                  'logo' => $request['logo'],
              ]);
    }

}