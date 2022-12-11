<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'depan' => ['required',],
            'belakang' => ['required',],
            'username' => ['required', 'unique:user'],
            'telp' => ['required',],
            'email' => ['required', 'email', 'max:255', 'unique:user'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);
    }

    // 'name' => ['required', 'string', 'max:255'],
    // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    // 'password' => ['required', 'string', 'min:8', 'confirmed'],

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $customer = Customer::create([
            'nama_depan' => $data['depan'],
            'nama_belakang' => $data['belakang'],
            'no_telp' => $data['telp'],
        ]);


        return User::create([
            'customer_id' => $customer->id,
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
