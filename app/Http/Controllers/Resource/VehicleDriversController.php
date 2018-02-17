<?php

namespace App\Http\Controllers\Resource;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Vehicledriver;

class VehicleDriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vdriver=Vehicledriver::paginate(7);
        
        return view('Home.vehicledrivershome',['Vehicledriver'=>$vdriver]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Maintainance.newvehicledrivers');
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
         $drivercode = DB::table('vehicledrivers')->where('drivercode', '=',$request->drivercode)->get();

        $count=$drivercode->count();

         //dd($count);
         //$supcode = Supplier::where('suppliercode',=$request->suppliercode)->get();
         if ($count=='1') {
            \Session::flash('flash_message_delete','Driver with this code already exist pls change Driver code.');
            return redirect('/newvehicledrivers');
        }
        $driver=new Vehicledriver;
        $driver->drivercode=$request->drivercode;
        $driver->drivername=$request->drivername;

        $driver->driverdesc=$request->driverdesc;
        $driver->Maker=Auth::User()->username;
       $driver->save();
          //

      // Display::create($request->all());
        \Session::flash('flash_message','New Driver successfully added.');
         return redirect('/vehicledrivershome');
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
     $vdriver= Vehicledriver::find($id);

        return view('Edit.driversedit')->withVehicledriver( $vdriver);
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
         $vdriver= Vehicledriver::find($id);
        $vdriver->update($request->all());
        \Session::flash('flash_message',' Driver successfully updated.');
         return redirect('/vehicledrivershome');
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
         $vdriver= Vehicledriver::find($id);
       $vdriver->delete();
       
         \Session::flash('flash_message_delete','Driver successfully deleted.');
         return redirect('/vehicledrivershome');
    }
}
