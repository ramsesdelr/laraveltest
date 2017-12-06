<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Update the current role of a user
     *
     * @return \Illuminate\Http\Response
     */
    public function updateRole(Request $request)
    {
        
        if ($request->isMethod('post')) {

            $user = User::find($request->user_id);
            $user->is_admin = $user->is_admin == 1 ? 0 : 1;
            $user->save();

            return response()->json(['response' => [
                'id' => $user->id,
                'is_admin' => $user->is_admin,
            ]]);
        } else {

            return response()->json(['response' => 'Invalid user']);
        }

        return response()->json(['response' => 'Invalid method']);
    }
}
