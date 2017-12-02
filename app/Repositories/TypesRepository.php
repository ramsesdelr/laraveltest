<?php
namespace App\Repositories;
use App\Vendors;
use App\Types;
use Illuminate\Support\Facades\Auth;


class TypesRepository extends ManageDataRepository {

    public function modelClass(){
        return Types::class;
    }


}