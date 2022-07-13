<?php


namespace App\Http\Controllers\Vue;


use App\Models\User;

class UserVueController
{
    public function index()
    {
        return response()->json(User::get());
    }
}
