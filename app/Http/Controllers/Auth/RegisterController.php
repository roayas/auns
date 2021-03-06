<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            'name' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'=>['numeric','digits_between:9,11'],
            'age'=>['required', 'before:18 years ago'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],
           
            'password_confirmation' => ['required_with:password','same:password','min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'lname' => $data['lname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            'front_id_pic' => $data['front_id_pic'],
            'back_id_pic' => $data['back_id_pic'],
            'needed_services' => $data['needed_services'],
            'time' => $data['time'],
            'timeTo' => $data['timeTo'],
            'car' => $data['car'],
            'img' => $data['img'],
            

            
            'password' => Hash::make($data['password']),
        ]);
    }
    

    protected function authenticated(Request $request, $user)
          {
                 if(Auth::user()->is_accepted == '1')
                  {
                         return redirect('home');
                  }
                 else
                 {
                  return redirect()->route('/');
                }
         }
}
