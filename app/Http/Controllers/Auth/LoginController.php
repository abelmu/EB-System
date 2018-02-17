<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Hash;
use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Authoritie;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $redirectAfterLogout = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

      public function loginusers()
    {
        //
        return view('auth.login');
    }



     public function authenticate(Request $request)
    {
        $userreg=new User;
      $uname=$request->username;
       $pword=$request->password;
        if (Auth::attempt(['username' => $uname, 'password' => $pword]))
        {
            //dd($uname);
                # code...
            $RoleId=Auth::user()->rolename;
          
            //echo $RoleId;
        $explodedrole=  explode(",", $RoleId);
       // dd($explodedrole);
         $count=0;
          foreach( $explodedrole as $Rol){
           $count=$count+1; 
            $roless=Role::where('id',$Rol)->get();
            foreach ($roless as $val) 
            {
              
                if($val->suppliers=='yes'){
                     DB::table('users')
            ->where('username', $request->username)
            ->update(['suppliers' => 'yes']);
                }
                /*else{
                    
                # code...
                    DB::table('users')
            ->where('username', $request->username)
            ->update(['suppliers' => 'NO']);
                }*/

            if($val->garages=='yes'){
                 DB::table('users')
            ->where('username', $request->username)
            ->update(['garages' => 'yes']);
            }
                     
            /*else{
                    
                # code...
                    DB::table('users')
            ->where('username', $request->username)
            ->update(['garages' => 'No']);
                }*/
            if($val->fuelstations=='yes'){
                 DB::table('users')
            ->where('username', $request->username)
            ->update(['fuelstations' => 'yes']);
            }
                    
            /*else{
                    
                # code...
                    DB::table('users')
            ->where('username', $request->username)
            ->update(['fuelstations' => 'No']);
                }*/
            if($val->fuelprices=='yes'){
                 DB::table('users')
            ->where('username', $request->username)
            ->update(['fuelprices' => 'yes']);
            }
                    
            /*else{
                    
                # code...
                    DB::table('users')
            ->where('username', $request->username)
            ->update(['fuelprices' => 'No']);
                }*/

            if($val->vehicletypes=='yes'){
                 DB::table('users')
            ->where('username', $request->username)
            ->update(['vehicletypes' => 'yes']);
            }
                    

            /*else{
                    
                # code...
                    DB::table('users')
            ->where('username', $request->username)
            ->update(['vehicletypes' => 'NO']);
                }*/
            if($val->newvehicleinfos=='yes'){
                 DB::table('users')
            ->where('username', $request->username)
            ->update(['newvehicleinfos' => 'yes']);
            }
                    
            /*else{
                    
                # code...
                    DB::table('users')
            ->where('username', $request->username)
            ->update(['newvehicleinfos' => 'No']);
                }*/
            if($val->userregisters=='yes'){
                  DB::table('users')
            ->where('username', $request->username)
            ->update(['userregisters' => 'yes']);
            }
              /*else{
                    
                # code...
                    DB::table('users')
            ->where('username', $request->username)
            ->update(['userregisters' => 'No']);
                }     */

            if($val->rolesdef=='yes'){
                 DB::table('users')
            ->where('username', $request->username)
            ->update(['rolesdef' => 'yes']);
            }
                 /* else{
                    
                # code...
                    DB::table('users')
            ->where('username', $request->username)
            ->update(['rolesdef' => 'No']);
                }  */

            if($val->fuelorders=='yes'){

                     DB::table('users')
            ->where('username', $request->username)
            ->update(['fuelorders' => 'yes']);
            }
                /*else{
                    
                # code...
                    DB::table('users')
            ->where('username', $request->username)
            ->update(['fuelorders' => 'No']);
                }*/
            if($val->vehiclesevices=='yes'){
                 DB::table('users')
            ->where('username', $request->username)
            ->update(['vehiclesevices' => 'yes']);
            }
                    
                /*else{
                    
                # code...
                    DB::table('users')
            ->where('username', $request->username)
            ->update(['vehiclesevices' => 'No']);
                }*/

            if($val->reports=='yes'){
                 DB::table('users')
            ->where('username', $request->username)
            ->update(['reports' => 'yes']);

            }
                    /*else{
                    
                # code...
                    DB::table('users')
            ->where('username', $request->username)
            ->update(['reports' => 'No']);
                }*/
            if($val->vehiclemovements=='yes'){
                 DB::table('users')
            ->where('username', $request->username)
            ->update(['vehiclemovements' => 'yes']);
            }
            /*else{
                    
                # code...
                    DB::table('users')
            ->where('username', $request->username)
            ->update(['vehiclemovements' => 'No']);
                }
*/
                    
            }


          }
        
            


              $passwordstatus = DB::table('users')->where('username', $uname)->value('changepassword');
            if( $passwordstatus=='yes'){

              //return redirect('/home')->with('Authoritie',$roless);
              //  View::share('Authoritie', $roless);

               // Session::put('Authoritie', $roless );
                return redirect('/home');
              // return view('home',['Authoritie'=>$roless]);
            }
           
           else{

                DB::table('users')
            ->where('username', $uname)
            ->update(['changepassword' =>'PRO']);
                return redirect('/changepassword'); 
        }

        }
        else{

                \Session::flash('flash_message_delete','Invalid credential');
                return redirect('/loginusers'); 
        }
    
}
}



