<?php

namespace App\Http\Controllers\Order;
use App\Http\Controllers\Controller;
use App\Vehicleservice;
use Illuminate\Http\Request;
use App\Garage;
use App\Vehicleinfo;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Fuelorder;
class VehicleserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $vservice=Vehicleservice::paginate(7);
 $vinfo=Vehicleinfo::paginate(7);

        
    return view('Home.vehicleservicehome',['Vehicleservice'=>$vservice],['Vehicleinfo'=>$vinfo]); 
         // $forder=Fuelorder::paginate(7);
        
        //return view('Home.orderfuelhome',['Fuelorder'=>$forder]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $garage=Garage::all();
          $vinfo=Vehicleinfo::all();
          return view('Order.newvehicleservice',array('Garage'=>$garage,'Vehicleinfo'=>$vinfo));
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
        $vsorder=new Vehicleservice;
        //$ordernumber=DB::table('vehicleservices')->get();
   //$count= $ordernumber->count();
   $serviceinkm = DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('servicekm');



         //dd($count);
         //$supcode = Supplier::where('suppliercode',=$request->suppliercode)->get();
        
       $vsorder->platenumber=$request->platenumber;
        $vsorder->drivername=$request->drivername;

       $vsorder->garagename=$request->garagename;

        $vsorder->servicesmade=implode(",", $request->get('servicesmade'));
         $vsorder->fromdate=$request->sdate;
          $vsorder->uptodate=$request->udate;
           $vsorder->cost=$request->price;
           $vsorder->servicetype=$request->servicetype;
           $vsorder->coveredby=$request->coveredby;
            $vsorder->serviceinkm=$serviceinkm;


        $vsorder->Maker=Auth::User()->username;
       

       $vsorder->save();
          //

      // Display::create($request->all());
        \Session::flash('flash_message','New Vehicle Service Recorded.');
         return redirect('/vehicleservicehome');
        
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
        $vservice = new Vehicleservice;

        $vservice = Vehicleservice::find($id);
      
        //return $uri;
       return view('Order.vehicleservice')->with('Vehicleservice',$vservice);
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
        $vservice=Vehicleservice::find($id);

        return view('Edit.vehicleserviceedit')->withVehicleservice($vservice);

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
         $vservice=Vehicleservice::find($id);
        $vservice ->update($request->all());
        \Session::flash('flash_message','  successfully updated.');
         return redirect('/vehicleservicehome');
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

      public function display()
    {
        //
         return view('Vehicle.vehicleservicereport'); 
    }
}
