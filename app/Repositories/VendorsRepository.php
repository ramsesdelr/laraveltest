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

    public function uploadImage($request)
    {
        if ($request->hasFile('logo')) {
           return  $path = str_replace('public/','', $request->file('logo')->store('public/vendors'));
        }
    }

}