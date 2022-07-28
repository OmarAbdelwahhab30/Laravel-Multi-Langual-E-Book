<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role_User;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Traits\FileUploaderTrait;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Queue\SerializesAndRestoresModelIdentifiers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use FileUploaderTrait;

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
     * @var mixed
     */
    private $username;

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
            'username' => ['required', 'string', 'max:255','unique:users'],
            'phone' =>['required','string','max:11'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], //'regex:/(^([a-zA-Z]+)(\d+)?$)/u'
            'img'   =>['sometimes','image','mimes:jpeg,png,jpg','max:5048'],     //max size is in kilobytes
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

        //dd($data['img']->extension());
        $Image = !empty($data['img'])? $this->ValidateFile($data['img'],'UsersImages'):"user.png";

        $this->username = $data['username'];
         return User::create([
            'username' => $data['username'],
            'phone'     =>$data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'img'       => $Image,
        ]);
    }

    public function __destruct()
    {
        $user = User::where('username',$this->username)->first();
        Role_User::create([
            'user_id'  => $user->id,
           'role_id'   => 2
        ]);
    }
}
