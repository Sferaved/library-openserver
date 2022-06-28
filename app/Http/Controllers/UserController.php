<?php

namespace App\Http\Controllers;


use App\Events\UserDestroy;
use App\Filters\UserFilter;
use App\Mail\OrderShipped;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserFilter $request)
    {
        $user = User::filter($request)->Paginate(5);

        return view('usr.users', ['data' => $user]);

    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validateFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (User::where('email', $validateFields['email'])->exists()) {
            return redirect(route('user.create'))->withErrors([
                'email' => 'This email is use'
            ]);
        }

        $user = User::create($validateFields);
        if ($user) {
            event(new Registered($user));
            Auth::login($user);
            return redirect(route('verification.notice'));
        }

        return redirect(route('user.login'))->withErrors([
            'formError' => 'Error save user'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        return view('usr.update', ['data' => User::find($id)]);
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

        return redirect()->route('user.users')->with('success', 'The user are updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('users')->where('id', $id)->delete();

     //   UserDestroy::dispatch($id, $user_name, $contactsCount);

        return redirect()->route('user.users')->with('success', 'The user is deleted successfully');
    }
}
