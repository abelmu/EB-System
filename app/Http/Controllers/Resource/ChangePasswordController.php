<?php
namespace App\Http\Controllers\Resource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Maintainance.changepassword');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      

         //dd($request->username);
         //$supcode = Supplier::where('suppliercode',=$request->suppliercode)->get();
  /*if ($request->username==null) {
    \Session::flash('flash_message_delete','username can not be empty');
         return redirect('/changepassword');
        }*/
        $passwordold =$request->oldpassword;
        $username = DB::table('users')->where('changepassword', 'PRO')->value('username');
        //dd($username);
         if (Auth::attempt(['username' => $username, 'password' => $passwordold])){
            //dd($passwordold);
            if($request->newpassword==$request->conpassword){
                  DB::table('users')
            ->where('username',$username)
            ->update(['password' =>bcrypt($request->newpassword)]);

            DB::table('users')
            ->where('username',$username)
            ->update(['changepassword'=>'yes']);
             \Session::flash('flash_message_success','Password changed');
             //Session::flush();
            return redirect('/home');
            }
            else{
                \Session::flash('flash_message_danger','Password Mismatch');
            return redirect('/changepassword');
            }
        } 

         else{
           
            //dd(bcrypt($request->oldpassword));
                \Session::flash('flash_message_danger','Old Password not correct');
            return redirect('/changepassword');
            }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
