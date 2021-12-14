<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.user.create')->with([
                        'UID'       =>      Str::uuid()
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active'     =>  $request->has('is_active')? 1:0,
            'is_admin'     =>  $request->has('is_admin')? 1:0,
            'image'         =>  $request->filename
        ]);

        //event(new Registered($user));

        //Auth::login($user);

        return redirect(route('user.index'));

    }

    public function index(){
        $users = User::all();
        return view('admin.user.index')->with([
            'users'     =>      $users
        ]);
    }

    public function edit(User $user){
        return view('admin.user.edit')->with([
            'user'      =>  $user,
            'UID'       =>      Str::uuid(),
        ]);

    }

    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['sometimes', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user->name = $request->name;
        $user->image = $request->filename;

        if($request->email){
            if($request->email != $user->email){
                $user->email = $request->email;
            }
        }
        if($request->password){
            $user->password = Hash::make($request->password);
        }

        $user->is_active = $request->has('is_active')? 1:0;
        $user->is_admin = $request->has('is_admin')? 1:0;
        $user->save();

        return redirect(route('user.index'));
    }

}
