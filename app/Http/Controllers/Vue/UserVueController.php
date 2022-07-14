<?php


namespace App\Http\Controllers\Vue;


use App\Http\Requests\UpdateUserRequest;
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

    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function update($id)
    {
        return view('usr.updatev', ['data' => User::find($id)]);
    }

    public function updateSubmit($id, UpdateUserRequest $request)
    {
        $user = User::find($id);

        $user->name = $request->input('name');

        if ($request->hasFile('photo')) {
            $destinationPath = 'images/avatars/';
            $fileName = $user->id . '.jpg';

            $request->file('photo')->move($destinationPath, $fileName);

            $user->avatar  = $destinationPath . $fileName;
            $user->save();
        }
        //   $subject = 'New laravel message';


        $user->save();
        //   Mail::to('andrey18051@gmail.com')->send(new OrderShipped($user, $subject, $path));

        return redirect()->route('uv')->with('success', 'The user are updated successfully');
    }
}
