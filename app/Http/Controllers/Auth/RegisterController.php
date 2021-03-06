<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\SendCode;

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
    protected $redirectTo  = '/verify';
    public  $code;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->code = $this->createRandomPassword();
    }

    function createRandomPassword()
    {

        $res='';
        for($i=0;$i<5;$i++){
            $num1 = rand(0,9);
            $res .= strval($num1);
        }
        return $res;
    }

    public function verificationCode($number)
    {
        $bytes = $this->code;
        $msg = '        من فضلك قم بإدخال الكود لاتمام عملية التسجيل : ' . $bytes . '';
        return file_get_contents('https://www.oursms.net/api/sendsms.php?return=json&username=chefkhalil&password=chefkhalil&numbers=' . $number . '&message=' . $msg . '&sender=Chefkhalil&datetime=YYYY-MMM-DD%20HH:MM');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        // return $this->registered($request,$user) ?: redirect('/');

        if($this->verificationCode(strval($request->phone))){
            return $this->registered($request,$user) ?: redirect('/verify?phone=' . $request->phone);
        }

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
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','confirmed'],
            'image'=> ['required','image','mimes:jpg,png,gif,jpeg','max:2048'],
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
        $imageName = time().'.'.$data['image']->extension();
        $data['image']->move(public_path('assets/images/users'), $imageName);
        $allphone = $data['countryCode'] . $data['phone'];
        $user = User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone'=>$data['phone'],
            'active'=>0,
            'gender' => $data['gender'],
            'state' => 1,
            'image' => $imageName,
            'countryCode' => $data['countryCode'],
            'rememberToken'=>'',
            'code'=>$this->code

        ]);
        //if($user){
          //  $user->code=SendCode::sendCode($user->phone);
            $user->save();
        //}
        session()->put('userId', $data['email']);
    }
}
