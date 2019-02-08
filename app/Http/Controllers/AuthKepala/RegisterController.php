<?php

namespace App\Http\Controllers\AuthKepala;

use App\Kepala;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registeredkepala;
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
    // protected $redirectTo = '/skpd/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

     public function showRegistrationForm()
    {
        return view('authKepala.register');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'status' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Kepala::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => $data['status'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registeredkepala($kepala = $this->create($request->all())));

        // $this->guard('skpd')->login($skpd);

        // return $this->registered($request, $skpd)
        //                 ?: redirect(route('skpd.home'));
        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        //Attempt to log the user in
        if (Auth::guard('kepala')->attempt($credential, $request->member)) {
            // if login succesful, then redirect to their intended location
            return redirect()->intended(route('kepala.home'));
        }
    }


}
