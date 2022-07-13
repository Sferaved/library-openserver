<?php


namespace App\Http\Controllers\Vue;


use App\Models\User;

class UserVueController
{
    public function index()
    {
        return response()->json(User::get());
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $userDelete = $user->name;
        $user->delete();
        $userInfo = "User $userDelete was deleted!";
        return response()->json($userInfo);
    }
}
