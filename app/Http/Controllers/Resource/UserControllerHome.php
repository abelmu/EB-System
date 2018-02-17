<?php

namespace App\Http\Controllers\Resource;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class UserControllerHome extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $roles=Role::paginate(7);
        return view('Home.roleshome',['Role'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('Role.role');
       
    }

    public function userrole()
    {
        //
         return view('Role.userrole');
       
    }
    public function resetpassword(){
         return view('Role.passwordreset');
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
          $roledef=new Role;
          $roledef->rolename=$request->rolename;
        $roledef->suppliers=$request->suppliers;
        $roledef->garages=$request->garages;
        $roledef->fuelstations=$request->fuelstations;
        $roledef->fuelprices=$request->fuelprices;
        $roledef->vehicletypes=$request->vehicletypes;
        $roledef->newvehicleinfos=$request->newvehicleinfos;
        $roledef->userregisters=$request->userregisters;
        $roledef->rolesdef=$request->rolesdef;
        $roledef->fuelorders=$request->fuelorders;
        $roledef->vehiclesevices=$request->vehiclesevices;
        $roledef->reports=$request->reports;
        $roledef->vehiclemovements=$request->vehiclemovements;

        $roledef->Maker=Auth::User()->username;

       $roledef->save();
          //
      //foreach(explode(',',  $roledef->role) as $string){
       //  DB::table('authorities')->insert(
   // ['authorities_name' => $string, 'authorities_url' =>$string,'role_id'=> $roledef->id]
//);
        

//}
      // Display::create($request->all());
        \Session::flash('flash_message','success.');
         return redirect('/assignrole');
    }
      public function editrole($id)
    {
        //
         
        
       
    }
      public function resetpword(Request $request)
    {
        //
        $user=new User;
        $username=$request->username;
   //$newpassword=bcrypt($request->password);
            DB::table('users')
            ->where('username',$username)
            ->update(['password' =>bcrypt($request->newpassword)]);

            DB::table('users')
            ->where('username',$username)
            ->update(['changepassword'=>'No']);
             \Session::flash('flash_message_success','Password changed');
         return redirect('/passwordreset');
    }
      public function  roledefinition(Request $request)
    {
        //
         $roledef=new Role;
          $roledef->rolename=$request->rolename;
        $roledef->role=implode(",", $request->get('role'));
        $roledef->Maker=Auth::User()->username;

       $roledef->save();
          //
       foreach(explode(',', $roles->role) as $string){
         DB::table('authorities')->insert(
    ['authorities_name' => $string, 'authorities_url' =>$string]
);
        

}
      // Display::create($request->all());
        \Session::flash('flash_message','success.');
         return redirect('/assignrole');
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
         $role=Role::find($id);

        return view('Edit.roleedit')->withRole($role);
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
        $roledef=Role::find($id);
       // $role->role=implode(",", $request->get('role'));
        $roledef->suppliers=$request->suppliers;
        $roledef->garages=$request->garages;
        $roledef->fuelstations=$request->fuelstations;
        $roledef->fuelprices=$request->fuelprices;
        $roledef->vehicletypes=$request->vehicletypes;
        $roledef->newvehicleinfos=$request->newvehicleinfos;
        $roledef->userregisters=$request->userregisters;
        $roledef->rolesdef=$request->rolesdef;
        $roledef->fuelorders=$request->fuelorders;
        $roledef->vehiclesevices=$request->vehiclesevices;
        $roledef->reports=$request->reports;
        $roledef->vehiclemovements=$request->vehiclemovements;

        $roledef->Maker=Auth::User()->username;

       $roledef->save();
      // $roledef ->update($request->all());
        \Session::flash('flash_message','  successfully updated.');
         return redirect('/rolehome');
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
