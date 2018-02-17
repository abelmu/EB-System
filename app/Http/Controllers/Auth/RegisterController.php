<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest');
    }*/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }


   public function createuser()
    {
        //
        return view('auth.register');
    }

    public function store(Request $request){

        $userreg=new User;

          $username = DB::table('users')->where('username', '=',$request->username)->get();

        $count=$username->count();

         //dd($count);
         //$supcode = Supplier::where('suppliercode',=$request->suppliercode)->get();
         if ($count=='1') {
            \Session::flash('flash_message_delete','User name already exist pls change username.');
            return redirect('/registerusers');
        }
       // dd($request->rolename);
      $userreg->name=$request->name;
       $userreg->username=$request->username;
       $userreg->rolename=implode(",", $request->rolename);
       $userreg->changepassword=$request->changepassword;
        $userreg->password=bcrypt($request->password);

       // $comma_separated = implode(",", $array);

        $userreg->save();
       // DB::table('user_role')->insert(
    //['user_id' => $userreg->id, 'role_id' =>implode(",", $request->get('rolename'))]
//);
        \Session::flash('flash_message','New User Registered.');
         return redirect('/registerusers');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        //$disp=Role::all();
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username'=>$data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
