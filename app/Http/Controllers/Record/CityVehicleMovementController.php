<?php

namespace App\Http\Controllers\Record;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Cityvehiclemovement;
use Auth;
use Illuminate\Support\Facades\DB;

class CityVehicleMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vmov=Cityvehiclemovement::paginate(7);
        
        return view('Home.cityvehiclemovhome',['Cityvehiclemovement'=>$vmov]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          return view('Record.dailycitymovement');
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

        $vmov=new Cityvehiclemovement;
         $initialkm = DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('servicekm');

         $totkm = DB::table('cityvehiclemovements')->where('platenumber', '=',$request->platenumber)->max('totalkm');

//dd($request->reqdept);
        $vmov->platenumber=$request->platenumber;
        $vmov->drivername=$request->drivername;

        $vmov->initialkm=$initialkm;
         $vmov->finalkm=$request->finalkm;
         if($request->finalkm < $initialkm){
            \Session::flash('flash_message_delete','Final Km reading must be greater than Service Km before Movement.',$initialkm);
            return redirect('/newvehiclemov');
         }
         $diff=$request->finalkm - $initialkm;
          $vmov->startingtime=$request->starttime;
            $vmov->endtime=$request->endtime;
        $vmov->differencekm=$request->finalkm - $initialkm;
          $totalkms=$totkm+$diff;

           $vmov->initialposition=$request->initialpos;
             $vmov->finalposition=$request->finalpos;
               $vmov->reqdepartment=$request->reqdept;
                 $vmov->numberofpeople=$request->numofpeople;
                   $vmov->package=$request->package;
                   $vmov->totalkm=$totalkms;
                    $phpdate = strtotime( $request->endtime );
                   $vmov->movementdate=date('Y-m-d',$phpdate);
                   //$movedate=
        $vmov->Maker=Auth::User()->username;
       
       if ($vmov->differencekm <'0') {
           $vmov->differencekm = -1 * $vmov->differencekm ;
        }
//dd($request->starttime);
       $vmov->save();
       DB::table('vehicleinfos')
            ->where('platenumber', $request->platenumber)
            ->update(['servicekm' => $initialkm +   $vmov->differencekm]);
          //

      // Display::create($request->all());
        \Session::flash('flash_message',' successfully added.');
         return redirect('/cityvehiclemovhome');
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
         $vmov = new Cityvehiclemovement;

        $vmov = Cityvehiclemovement::find($id);
          return view('Record.cityvehiclemov')->with('Vehiclemovement',$vmov);
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
        $vmov=Cityvehiclemovement::find($id);

        return view('Edit.cityvehiclemovementedit')->withCityvehiclemovement($vmov);
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
       
       
     // $vmov=Vehiclemovement::find($id);
         $vmov= Cityvehiclemovement::find($id);
         $initialkm = DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('servicekm');
        $vmov->platenumber=$request->platenumber;
        $vmov->drivername=$request->drivername;

        $vmov->initialkm=$request->initialkm;
         $vmov->finalkm=$request->finalkm;
         if($request->finalkm < $request->initialkm){
            \Session::flash('flash_message_delete','Final Km reading must be greater than Service Km before Movement.',$initialkm);
            return redirect('/newvehiclemov');
         }
         
       
        $vmov->startingtime=$request->startingtime;
        $vmov->endtime=$request->endtime;
        $vmov->differencekm=$request->finalkm - $request->initialkm;

         $servicekmveh=($initialkm-$request->diffkm)+($request->finalkm - $request->initialkm);
         // $totalkms=$totkm+$diff;

           $vmov->initialposition=$request->initialposition;
             $vmov->finalposition=$request->finalposition;
               $vmov->reqdepartment=$request->reqdepartment;
                 $vmov->numberofpeople=$request->numberofpeople;
                   $vmov->package=$request->package;
                   //$vmov->totalkm=$totalkms;
                    $phpdate = strtotime( $request->endtime );
                   $vmov->movementdate=date('Y-m-d',$phpdate);
                   //$movedate=
        $vmov->Maker=Auth::User()->username;
       
       if ($vmov->differencekm <'0') {
           $vmov->differencekm = -1 * $vmov->differencekm ;
        }
//dd($request->starttime);
       $vmov->save();
       DB::table('vehicleinfos')
            ->where('platenumber', $request->platenumber)
            ->update(['servicekm' => $servicekmveh]);
          //

      // Display::create($request->all());
        \Session::flash('flash_message',' successfully updated.');
         return redirect('/cityvehiclemovhome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $vmov= Cityvehiclemovement::find($id);
              
              $diffkm=DB::table('cityvehiclemovements')->where('id', '=',$id)->value('differencekm');

              $platenumber=DB::table('cityvehiclemovements')->where('id', '=',$id)->value('platenumber');
              $initialkm = DB::table('vehicleinfos')->where('platenumber', '=',$platenumber)->value('servicekm');
              //dd($diffkm,$initialkm);

                  $servicekmveh=$initialkm-$diffkm;
DB::table('vehicleinfos')
            ->where('platenumber', $platenumber)
            ->update(['servicekm' => $servicekmveh]);

               $vmov->delete();
               \Session::flash('flash_message_delete','   Closed.');
         return redirect('/cityvehiclemovhome');
    

    }
}
