<?php
namespace App\Repositories;

abstract class ManageDataRepository
{
    public function create(array $request)
    {
              return app()->make($this->modelClass())::create([
                  'name' => $request['name'],
                  'users_id' => $request['users_id'],
              ]);
    }
    public function update($id, $request)
    {
      
      return app()->make($this->modelClass())::find($id)->update($request);        
      
    }
    public function getById($id)
    {

    }
    public function delete($request)
    {

    }
}
