<?php
namespace App\Repositories;

interface ManageDataRepository
{
  public function create($request);
  public function update($id,$request);
  public function getById($id);
  public function delete($request);
}
