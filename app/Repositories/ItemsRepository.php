<?php
namespace App\Repositories;
use App\Items;
use Illuminate\Support\Facades\Auth;

class ItemsRepository 
{

    public function create(array $request)
    {   

   
         return Items::create([
            'name' => $request['name'],
            'vendors_id' => $request['vendors_id'],
            'types_id' => $request['types_id'],
            'sku' => $request['sku'],
            'release_date' => $request['release_date'],
            'price' => $request['price'],
            'weight' => $request['weight'],
            'color' => $request['color'],
            'users_id' => $request['users_id'],
            'tags' => $request['tags'],
            'photo' => $request['photo'],
        ]);
    }

    /**
     * Check if the request has an image and proceeds to upload it
     * @param POST $request 
     * @return string
     */
    public function uploadImage($request)
    {
        if ($request->hasFile('photo')) {
           return  $path = str_replace('public/','', $request->file('photo')->store('public/items'));
        }
    }
    //TODO check this and convert it to an aray
    
    public function update($id, $request)
    {
        return Items::find($id)->update($request);
    }

    public function getById($id)
    {
        return Items::find($id);
    }
    public function delete($id){

    }
}