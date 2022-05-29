<?php

namespace App\Http\Controllers\Api;

use App\Http\Traits\GeneralTrait;
use App\Mail\Verification;
use App\models\admin\Package;
use App\models\admin\PackageFeature;
use App\SendCode;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\SendSBTorecipient;
class AuthController extends Controller
{

    public $code;
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register1','register2','forgetpassword','resetpassword','getPackages']]);
        $this->code = $this->createRandomPassword();
        $this->middleware('validUser',['except' => ['login','register1','register2','forgetpassword','resetpassword','getPackages']]);

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
    public function verificationCodeForgetPassword($number)
    {
        $bytes = $this->code;
        $msg = '        من فضلك قم بإدخال الكود لتغيير كلمة  المرور : ' . $bytes . '';
        return file_get_contents('https://www.oursms.net/api/sendsms.php?return=json&username=chefkhalil&password=chefkhalil&numbers=' . $number . '&message=' . $msg . '&sender=Chefkhalil&datetime=YYYY-MMM-DD%20HH:MM');
    }
    use GeneralTrait;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */


    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    /*First Step*/
    public function register1(Request $request){

        $validator = Validator::make($request->all(), [
            'fname' => ['required', 'string', 'max:255' , 'not_regex:/([%\$#\*<>]+)/'],
            'lname' => ['required', 'string', 'max:255' , 'not_regex:/([%\$#\*<>]+)/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','email:dns'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'digits:12','unique:users'],
            /*Rule::unique('users', 'phone')*/
        ]);
        if ($validator->fails()) {
            return $this->returnValidationError(422, $validator);
        }else {
            if(strpos($request['email'], '@gmail') == false){
                $msg = 'Email must be gmail!';
                return $this->returnError(422, $msg);
            }

           if($this->verificationCode(strval($request->phone))){
                $user = User::create([
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                    'active' => 0,
                    'gender' => $request->gender,
                    'state' => 1,
                    'image' => 'sad',
                    'countryCode' => '966',
                    //'code' => SendCode::sendCode($request->countryCode, $request->phone),
                    'code'=>$this->code
                ]);
                //if($user){
                //  $user->code=SendCode::sendCode($user->phone);
                $user->save();
                //}
                $msg = 'User has been created ! ';
                return $this->returnData(['client'], [$user], $msg);
            }

        }

    }
    public function forgetpassword(Request $request){
        $phone = $request->phone;
        try {
            $client = User::where('phone', $phone)->firstOrFail();
        } catch (\Exception $e) {
            return $this->returnError(404, 'Phone Not Found');
        }

        $client->update(['code' => $this->code]);


        if($this->verificationCodeForgetPassword(strval($request->phone))){
            $msg = 'we sent an activation code to verify your email';
            return $this->returnData(['code'], [$this->code], $msg);
        }
    }
    /*
    public function forgetpassword(Request $request)
    {

        $email = $request->email;
        try {
            $client = User::where('email', $email)->firstOrFail();
        } catch (\Exception $e) {
            return $this->returnError(404, 'Email Not Found');
        }
        $code = substr(str_shuffle('0123456789'), 0, 5);

        $client->update(['code' => $code]);

        $activation_msg = 'your activation code is ' . $code;

        $this->send_sms($email, $activation_msg);

        $msg = 'we sent an activation code to verify your email';

        return $this->returnData(['code'], [$code], $msg);
    }
    */

    public function register2(Request $request){
        $validator = Validator::make($request->all(), [
            'code' => ['required'],
            'email'=>['required']
        ]);
        if ($validator->fails()) {
            return $this->returnValidationError(422, $validator);
        }else {
            $user = User::where('email',$request->email)->get();
            if(count($user)) {
                if ($user[0]->code == $request->code) {
                    $user[0]->update([
                        'active' => 1
                    ]);
                    $msg = 'User Data has been updated ! ';
                    return $this->returnData(['client'], [$user], $msg);
                }else{
                    $msg = 'Wrong Code ! ';
                    return $this->returnData(['client'], [[]], $msg);
                }
            }else{
                $msg = 'There Are no User with this email ! ';
                return $this->returnData(['client'], [[]], $msg);
            }


        }

    }
    public function register3(Request $request){
        $validator = Validator::make($request->all(), [
            'package_id' => ['required'],
            'user_id' => ['required']
        ]);
        if ($validator->fails()) {
            return $this->returnValidationError(422, $validator);
        }else {


            $package = Package::find($request->package_id);
            $duration = intval($package->duration);
            $date = date('Y-m-d');
            //increment 2 days
            $mod_date = strtotime($date . '+ '.$duration.' days');
            $endDateSubscripe= date('Y-m-d', $mod_date);

            $user = User::find($request->user_id);
            $user->update([
                'package_id'=>$request->package_id,
                'endDateSubscripe'=>$endDateSubscripe
            ]);

            $msg = 'User Data has been updated ! ';
            return $this->returnData(['client'], [$user], $msg);
        }

    }
    public function getPackages(){
        $packages= Package::get();
        foreach ($packages as $package) {
         $feature = PackageFeature::where('user_package_id', $package->id)->get();
            $package->features = $feature;
        }
        return $this->returnData(['packages'], [$packages]);
    }
    /*
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255' , 'not_regex:/([%\$#\*<>]+)/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','confirmed'],
            'birthDate' => ['required'],
            'phone' => ['required', 'digits:11', Rule::unique('users', 'phone')],
            'jobTitle' => ['required', 'string', 'max:255' , 'not_regex:/([%\$#\*<>]+)/'],
            'city' => ['required', 'string', 'max:255' , 'not_regex:/([%\$#\*<>]+)/'],
            'country' => ['required', 'string', 'max:255' , 'not_regex:/([%\$#\*<>]+)/'],
            'gender' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return $this->returnValidationError(422, $validator);
        }
        $code = '12345';
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthDate' => $request->birthDate,
            'type' => 0,
            'phone' => $request->phone,
            'jobTitle' =>$request->jobTitle,
            'city' => $request->city,
            'country' =>$requesHmact->country,
            'gender' => $request->gender,
            'stateId' => $request->stateId
        ]);
        $verification_msg  = 'your activation code is' . $code;
        //$this->send_mail($user->email,$verification_msg);
        $msg = 'Verification Link  has been sent to your email';
        return $this->returnData(['client'], [$user], $msg);

    }*/
    public function login(Request $request){
        $credentials = $request->only(['email', 'password']);
        $token = auth('api')->attempt($credentials);
        if ($token) {
            $user =auth('api')->user();
            $msg = 'you have been logged in successfully';
            $user->update(['remember_token' => $token]);
            return $this->returnData(['client'], [$user], $msg);
        }

        return $this->returnError(422, 'These credentials are not in our records');
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = $this->guard()->user();
        $user->image = 'https://chefkhalil.com/public/assets/images/users/'.$user->image;
        return response()->json($user);
    }
    public function me_update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            /*Rule::unique('users', 'phone')*/
        ]);
        if ($validator->fails()) {
            return $this->returnValidationError(422, $validator);
        }else {
            $user = $this->guard()->user();
            if($request->img){
                $imageName = $request->img->getClientOriginalName();
                $request->img->move(public_path('assets/images/users'), $imageName);

            }else{
                $imageName = $user->image;
            }
            if($request->fname){
                $fname = $request->fname;
            }else{
                $fname = $user->fname;
            }

            if($request->lname){
                $lname = $request->lname;
            }else{
                $lname = $user->lname;
            }


            if($request->email){
                $email = $request->email;
            }else{
                $email = $user->email;
            }

            if($request->phone){
                $phone = $request->phone;
            }else{
                $phone = $user->phone;
            }

            if($request->gender){
                $gender = $request->gender;
            }else{
                $gender = $user->gender;
            }

            $user->update([
               'fname' => $fname,
               'lname'=>$lname,
               'email'=>$email,
                'phone'=>$phone,
                'gender'=>$gender,
                'image'=>$imageName
            ]);
            $msg = 'User Data has been updated ! ';
            $user->image = 'https://chefkhalil.com/public/assets/images/users/'.$user->image;

            return $this->returnData(['client'], [$user], $msg);
        }
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */

    public function logout()
    {
        $user = auth('api')->user();
        $user->update(['remember_token' => '']);
        $this->guard()->logout();
        return response()->json(['message' => 'Successfully logged out']);


      /*    $this->guard()->logout();
          return response()->json(['message' => 'Successfully logged out']);*/
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {

        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */

    #region forgetpassword
    public function resetpassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'code'=>['required'],
            'phone' => ['required'],
            'new_password'  => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return $this->returnValidationError(422, $validator);
        }

        $user = User::where('phone',$request->phone)->first();
        if (isset($user)) {
            if($user->code  === strval($request->code)){
                $user->update(['password' => Hash::make($request->new_password)]);
                return $this->returnData(['client'], [$user], 'password updated successfully');
            }else{
                return $this->returnError(422,'Pls Check you email and enter a valid code');

            }

        }
        else{
            return $this->returnError(422,'Make Sure You have entered Correct Email ');
        }
    }

    public function send_sms($email, $msg)
    {
        $user = User::where('email', $email)->first();
        $name = $user->name;
        $email = $user->email;
        $subject = 'Buisness verification code';
        $message = $msg;

        Mail::to($user->email)->send(new Verification($name, $email, $subject, $message));
    }
    public function verifycode(Request $request)
    {

        $email = $request->email;
        $code = $request->code;

        try {
            $user = User::where('email', $email)->firstOrFail();
        } catch (\Exception $e) {
            return $this->returnError(404, 'Client Not Found');
        }

        if ($user->activationCode == $code) {
            return $this->returnData(['client'], [$user], 'the code is valid');
        } else {
            return $this->returnError(422, 'this code is invalid please check the code sent to your mobile');
        }
    }
    #endregion

    public function guard()
    {
        return Auth::guard('api');
    }

}
