<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    public function redirectTo() {
        $role = Auth::user()->role; 
        switch ($role) {
          case 'admin':
            return '/home-admin';
            break;
          case 'customer':
            return '/home';
            break;
            case 'vendor';
            return '/home-vendor';
            break;
      
          default:
            return redirect()->route('login'); 
          break;
        }
      }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:admin,customer,vendor'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Avatar validation
            'phone' => ['nullable', 'string', 'max:15', 'regex:/^[0-9+\(\)#\.\s\/ext-]+$/'], // Phone validation
   
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(  array $data)
    {
        // Handle file upload if there is an avatar
        if (request()->hasFile('avatar')) {
          $avatarPath = request()->file('avatar')->store('avatars', 'public');
        } else {
            $avatarPath = null;
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'phone' => $data['phone'],               // Store phone number
            'avatar' => $avatarPath,                 // Store avatar path             
        ]);
    }
}
