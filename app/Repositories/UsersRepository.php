<?php
namespace App\Repositories;

use App\User;

class UsersRepository
{

    public function updateRole($request)
    {

        $user = User::find($request->user_id);
        $user->is_admin = $user->is_admin == 1 ? 0 : 1;
        $user->save();

        return response()->json(['response' => [
            'id' => $user->id,
            'is_admin' => $user->is_admin,
        ]]);
    }

    /**
     * Check if the request has an image and proceeds to upload it
     * @param POST $request
     * @return string
     */
    public function uploadImage($request)
    {
        if ($request->hasFile('photo')) {
            return $path = str_replace('public/', '', $request->file('photo')->store('public/items'));
        }
    }
    //TODO check this and convert it to an aray

    public function update($id, array $request)
    {
        if ($request['password'] || $request['password_v']) {

            $newPassword = \Hash::make($request['password']);
            if (\Hash::check($request['password_v'], $newPassword)) {
                return User::find($id)->update($request);
            }
        } else {
            return User::find($id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
            ]);
        }

    }

    public function getById($id)
    {
        return Items::find($id);
    }
    public function delete($id)
    {

    }
}
