<?php
namespace App\Repositories;
use App\Items;
use Illuminate\Support\Facades\Auth;

class ItemsRepository implements ManageDataRepository
{
    public function create($request)
    {   
        $user = Auth::user();

         return Items::create([
            'name' => request('name'),
            'vendors_id' => request('vendors_id'),
            'types_id' => request('types_id'),
            'sku' => request('sku'),
            'release_date' => request('release_date'),
            'price' => request('price'),
            'weight' => request('weight'),
            'color' => request('color'),
            'users_id' => $user->id,
        ]);
    }

    public function update($id, $request)
    {
        return Items::find($id)->update($request->all());
    }

    public function getById($id)
    {
        return Items::find($id);
    }
    public function delete($id){

    }
}