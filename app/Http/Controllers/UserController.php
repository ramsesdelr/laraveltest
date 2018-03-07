<?php

namespace App\Http\Controllers;

use App\Repositories\UsersRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Update the current role of a user
     *
     * @return \Illuminate\Http\Response
     */
    public function updateRole(Request $request, UsersRepository $usersRepo)
    {

        if ($request->isMethod('post')) {
            return $usersRepo->updateRole($request);
        } else {

            return response()->json(['response' => 'Invalid user']);
        }

        return response()->json(['response' => 'Invalid method']);
    }

    /**
     * Update the current active state of a user
     *
     * @return \Illuminate\Http\Response
     */
    public function updateIsActive(Request $request)
    {

        if ($request->isMethod('post')) {

            $user = User::find($request->user_id);
            $user->is_active = $user->is_active == 1 ? 0 : 1;
            $user->save();

            return response()->json(['response' => [
                'id' => $user->id,
                'is_active' => $user->is_active,
            ]]);
        } else {
            return response()->json(['response' => 'Invalid user']);
        }

        return response()->json(['response' => 'Invalid method']);
    }

    /**
     * Get the edit form for a vendor
     * @param $id
     * @return array $vendor
     */
    public function edit($id)
    {

        $user = User::find($id);

        return view('users.update', compact('user'));
    }

    /**
     * Update the current user
     * @param $id
     * @return array $vendor
     */
    public function update($id, Request $request, UsersRepository $usersRepo)
    {

        try {
            $records = $request->all();
            $usersRepo->update(request('id'), $records);
            Session::flash('message', 'The User was succesfully updated');
            return redirect('/users/');

        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            return redirect('/users/' . $id . '/edit');

        }

    }
}
