<?php

namespace App\Http\Controllers\Resource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Fuelstation;

class FuelStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $fsta=Fuelstation::paginate(7);
        
        return view('Home.fuelstationhome',['Fuelstation'=>$fsta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Maintainance.newfuelstation');
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

        $stationcode = DB::table('fuelstations')->where('stationcode', '=',$request->stationcode)->get();

        $count=$stationcode->count();

         //dd($count);
         //$supcode = Supplier::where('suppliercode',=$request->suppliercode)->get();
         if ($count=='1') {
            \Session::flash('flash_message_delete','FuelStation with this code already exist pls change station code.');
            return redirect('/newfuelstation');
        }
        $fsta=new Fuelstation;
        $fsta->stationcode=$request->stationcode;
        $fsta->stationname=$request->stationname;

        $fsta->stationtype=$request->stationtype;

        

        $fsta->Maker=Auth::User()->username;
        $fsta->city=$request->city;
        $fsta->woreda=$request->woreda;

       $fsta->save();
          //

      // Display::create($request->all());
        \Session::flash('flash_message','New Station successfully added.');
         return redirect('/feulstationhome');
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
         $fsta = Fuelstation::find($id);

        return view('Edit.stationedit')->withFuelstation($fsta);
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
        $fsta = Fuelstation::find($id);
        $fsta ->update($request->all());
        \Session::flash('flash_message',' Station successfully updated.');
         return redirect('/feulstationhome');
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
         $fsta = Fuelstation::find($id);
          $fsta->delete();
         \Session::flash('flash_message',' Fuel Stationsuccessfully deleted.');
         return redirect('/feulstationhome');
    }
}
