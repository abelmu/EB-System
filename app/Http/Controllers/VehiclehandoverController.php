<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Vehiclehandover;

class VehiclehandoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $vhandover=Vehiclehandover::paginate(7);
        
        return view('Home.vehiclehandoverhome',['Vehiclehandover'=>$vhandover]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Vehicle.newvehicle');
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
        $vhandover=new Vehiclehandover;
         $serviceinkm = DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('servicekm');

         $motornumber=DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('motornumber');

         $chasisnumber=DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('chasisnumber');
         $vehicletype=DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('vehicletype');

          $vehicleprice=DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('vehicleprice');

           $vehiclemodel=DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('vehiclemodel');




        $vhandover->platenumber=$request->platenumber;
        $vhandover->employeename=$request->employeename;

        $vhandover->serviceinkm=$serviceinkm;

        $vhandover->vehicletype=$vehicletype;

        $vhandover->vehiclemodel=$vehiclemodel;

        $vhandover->vehicleprice=$vehicleprice;


         if($request->fbumber=='yes'){
                   $vhandover->frontbumber=$request->fbumber; 
                }
                else{
                    
                 $vhandover->frontbumber='no'; 
                }
         

          if($request->rarebumber=='yes'){
                   $vhandover->rarebumber=$request->rbumber; 
                }
                else{
                    
                 $vhandover->rarebumber='no'; 
                }

            if($request->door=='yes'){
                   $vhandover->door=$request->door;
                }
                else{
                    
                 $vhandover->door='no'; 
                }
            if($request->lhshlamp=='yes'){
                   $vhandover->lhsheadlamp=$request->lhshlamp;
                }
                else{
                    
                 $vhandover->lhsheadlamp='no'; 
                }

            if($request->rhshlamp=='yes'){
                  $vhandover->rhsheadlamp=$request->rhshlamp;
                }
                else{
                    
                 $vhandover->rhsheadlamp='no'; 
                }

                if($request->lhsslight=='yes'){
                 $vhandover->lhssignallight=$request->lhsslight;
                }
                else{
                    
                 $vhandover->lhssignallight='no'; 
                }
         
                 if($request->rhsslight=='yes'){
                $vhandover->rhssignallight=$request->rhsslight;
                }
                else{
                    
                 $vhandover->rhssignallight='no'; 
                }
         if($request->rlights=='yes'){
                $vhandover->rlights=$request->rlights;
                }
                else{
                    
                 $vhandover->rlights='no'; 
                }
         

          if($request->odhandler=='yes'){
               $vhandover->outdoorhandler=$request->odhandler;
                }
                else{
                    
                 $vhandover->outdoorhandler='no'; 
                }

        
                if($request->glass=='yes'){
             $vhandover->glass=$request->glass;
                }
                else{
                    
                 $vhandover->glass='no'; 
                }
         

           if($request->lhsovmirror=='yes'){
            $vhandover->lhsouterviewmirror=$request->lhsovmirror;
                }
                else{
                    
                 $vhandover->lhsouterviewmirror='no'; 
                }
          

            if($request->rhsovmirror=='yes'){
            $vhandover->rhsouterviewmirror=$request->rhsovmirror;
                }
                else{
                    
                 $vhandover->rhsouterviewmirror='no'; 
                }

                if($request->rainwipper=='yes'){
            $vhandover->rainwipper=$request->rainwipper;
                }
                else{
                    
                 $vhandover->rainwipper='no'; 
                }
            if($request->dipstick=='yes'){
           $vhandover->dipstick=$request->dipstick;
                }
                else{
                    
                 $vhandover->dipstick='no'; 
                }
            
           
                if($request->mudguard=='yes'){
           $vhandover->mudguard=$request->mudguard;
                }
                else{
                    
                 $vhandover->mudguard='no'; 
                }

            $vhandover->rimtype=$request->rimtype;



 if($request->gage=='yes'){
          $vhandover->gage=$request->gage;
                }
                else{
                    
                 $vhandover->gage='no'; 
                }
           

            //$vhandover->swiches=$request->switch;


                if($request->hazardswitch=='yes'){
          $vhandover->hazardswiche=$request->hazardswitch;
                }
                else{
                    
                 $vhandover->hazardswiche='no'; 
                }
           

                if($request->lightswitch=='yes'){
        $vhandover->lightswich=$request->lightswitch;
                }
                else{
                    
                 $vhandover->lightswich='no'; 
                }
            
                 if($request->tape=='yes'){
        $vhandover->tapes=$request->tape;
                }
                else{
                    
                 $vhandover->tapes='no'; 
                }
           
                if($request->belt=='yes'){
         $vhandover->belt=$request->belt;
                }
                else{
                    
                 $vhandover->belt='no'; 
                }
           if($request->headrest=='yes'){
        $vhandover->headrest=$request->headrest;
                }
                else{
                    
                 $vhandover->headrest='no'; 
                }

            if($request->insidedoorlock=='yes'){
         $vhandover->insidedoorlock=$request->insidedoorlock;
                }
                else{
                    
                 $vhandover->insidedoorlock='no'; 
                }


           

            $vhandover->ashetree=$request->ashetree;

            $vhandover->seatcondition=$request->seatcondition;

            $vhandover->numofwrench=$request->numofwrench;

            $vhandover->flsidetyretype=$request->flsidetyretype;
             $vhandover->frsidetyretype=$request->frsidetyretype;

              $vhandover->rlsidetyretype=$request->rlsidetyretype;
              $vhandover->rrsidetyretype=$request->rrsidetyretype;

               if($request->standjack=='yes'){
         $vhandover->standjack=$request->standjack;
                }
                else{
                    
                 $vhandover->standjack='no'; 
                }
              

              if($request->tyrewrench=='yes'){
        $vhandover->tyrewrench=$request->tyrewrench;
                }
                else{
                    
                 $vhandover->tyrewrench='no'; 
                }
              
               if($request->sparetyre=='yes'){
       $vhandover->sparetyre=$request->sparetyre;
                }
                else{
                    
                 $vhandover->sparetyre='no'; 
                }

               

               
                  $vhandover->platenumber=$request->platenumber;
                   $vhandover->condition=$request->condition;
                    $vhandover->chasisnumber=$chasisnumber;
                     $vhandover->motornumber=$motornumber;

                     $vhandover->save();
       \Session::flash('flash_message','successfully added.');
         return redirect('/vehiclehandover');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //
         $vhandover = new Vehiclehandover;

        $vhandover = Vehiclehandover::find($id);
        $uri = $request->path();
        //return $uri;
       return view('pages.vehiclehandovershow')->with('Vehiclehandover',$vhandover);



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
          $vhandover = new Vehiclehandover;
        
        $vhandover = Vehiclehandover::find($id);

        return view('Edit.vhandoveredit')->withVehiclehandover($vhandover);
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
       
      // dd($request->all());
     // $vhandover = Vehiclehandover::find($id);
      // $vhandover->update($request->all());
       // \Session::flash('flash_message','  Information successfully updated.');
        // return redirect('/vehiclehandover');


         $vhandover=Vehiclehandover::find($id);
         $serviceinkm = DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('servicekm');

         $motornumber=DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('motornumber');

         $chasisnumber=DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('chasisnumber');
         $vehicletype=DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('vehicletype');




        $vhandover->platenumber=$request->platenumber;
        $vhandover->employeename=$request->employeename;

        $vhandover->serviceinkm=$serviceinkm;


         if($request->fbumber=='yes'){
                   $vhandover->frontbumber=$request->fbumber; 
                }
                else{
                    
                 $vhandover->frontbumber='no'; 
                }
         

          if($request->rarebumber=='yes'){
                   $vhandover->rarebumber=$request->rbumber; 
                }
                else{
                    
                 $vhandover->rarebumber='no'; 
                }

            if($request->door=='yes'){
                   $vhandover->door=$request->door;
                }
                else{
                    
                 $vhandover->door='no'; 
                }
            if($request->lhshlamp=='yes'){
                   $vhandover->lhsheadlamp=$request->lhshlamp;
                }
                else{
                    
                 $vhandover->lhsheadlamp='no'; 
                }

            if($request->rhshlamp=='yes'){
                  $vhandover->rhsheadlamp=$request->rhshlamp;
                }
                else{
                    
                 $vhandover->rhsheadlamp='no'; 
                }

                if($request->lhsslight=='yes'){
                 $vhandover->lhssignallight=$request->lhsslight;
                }
                else{
                    
                 $vhandover->lhssignallight='no'; 
                }
         
                 if($request->rhsslight=='yes'){
                $vhandover->rhssignallight=$request->rhsslight;
                }
                else{
                    
                 $vhandover->rhssignallight='no'; 
                }
         if($request->rlights=='yes'){
                $vhandover->rlights=$request->rlights;
                }
                else{
                    
                 $vhandover->rlights='no'; 
                }
         

          if($request->odhandler=='yes'){
               $vhandover->outdoorhandler=$request->odhandler;
                }
                else{
                    
                 $vhandover->outdoorhandler='no'; 
                }

        
                if($request->glass=='yes'){
             $vhandover->glass=$request->glass;
                }
                else{
                    
                 $vhandover->glass='no'; 
                }
         

           if($request->lhsovmirror=='yes'){
            $vhandover->lhsouterviewmirror=$request->lhsovmirror;
                }
                else{
                    
                 $vhandover->lhsouterviewmirror='no'; 
                }
          

            if($request->rhsovmirror=='yes'){
            $vhandover->rhsouterviewmirror=$request->rhsovmirror;
                }
                else{
                    
                 $vhandover->rhsouterviewmirror='no'; 
                }

                if($request->rainwipper=='yes'){
            $vhandover->rainwipper=$request->rainwipper;
                }
                else{
                    
                 $vhandover->rainwipper='no'; 
                }
            if($request->dipstick=='yes'){
           $vhandover->dipstick=$request->dipstick;
                }
                else{
                    
                 $vhandover->dipstick='no'; 
                }
            
           
                if($request->mudguard=='yes'){
           $vhandover->mudguard=$request->mudguard;
                }
                else{
                    
                 $vhandover->mudguard='no'; 
                }

            $vhandover->rimtype=$request->rimtype;



 if($request->gage=='yes'){
          $vhandover->gage=$request->gage;
                }
                else{
                    
                 $vhandover->gage='no'; 
                }
           

            //$vhandover->swiches=$request->switch;


                if($request->hazardswitch=='yes'){
          $vhandover->hazardswiche=$request->hazardswitch;
                }
                else{
                    
                 $vhandover->hazardswiche='no'; 
                }
           

                if($request->lightswitch=='yes'){
        $vhandover->lightswich=$request->lightswitch;
                }
                else{
                    
                 $vhandover->lightswich='no'; 
                }
            
                 if($request->tape=='yes'){
        $vhandover->tapes=$request->tape;
                }
                else{
                    
                 $vhandover->tapes='no'; 
                }
           
                if($request->belt=='yes'){
         $vhandover->belt=$request->belt;
                }
                else{
                    
                 $vhandover->belt='no'; 
                }
           if($request->headrest=='yes'){
        $vhandover->headrest=$request->headrest;
                }
                else{
                    
                 $vhandover->headrest='no'; 
                }

            if($request->insidedoorlock=='yes'){
         $vhandover->insidedoorlock=$request->insidedoorlock;
                }
                else{
                    
                 $vhandover->insidedoorlock='no'; 
                }


           

            $vhandover->ashetree=$request->ashetree;

            $vhandover->seatcondition=$request->seatcondition;

            $vhandover->numofwrench=$request->numofwrench;

            $vhandover->flsidetyretype=$request->flsidetyretype;
             $vhandover->frsidetyretype=$request->frsidetyretype;

              $vhandover->rlsidetyretype=$request->rlsidetyretype;
              $vhandover->rrsidetyretype=$request->rrsidetyretype;

               if($request->standjack=='yes'){
         $vhandover->standjack=$request->standjack;
                }
                else{
                    
                 $vhandover->standjack='no'; 
                }
              

              if($request->tyrewrench=='yes'){
        $vhandover->tyrewrench=$request->tyrewrench;
                }
                else{
                    
                 $vhandover->tyrewrench='no'; 
                }
              
               if($request->sparetyre=='yes'){
       $vhandover->sparetyre=$request->sparetyre;
                }
                else{
                    
                 $vhandover->sparetyre='no'; 
                }

               

               
                  $vhandover->platenumber=$request->platenumber;
                   $vhandover->condition=$request->condition;
                    $vhandover->chasisnumber=$chasisnumber;
                     $vhandover->motornumber=$motornumber;
//$vhandover->update($request->all());
                    $vhandover->save();
       \Session::flash('flash_message','successfully updated.');
         return redirect('/vehiclehandover');

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
