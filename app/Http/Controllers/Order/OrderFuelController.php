<?php
namespace App\Http\Controllers\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Vehicledriver;
use App\Vehicletype;
use App\Fueltypeandprice;
use App\Fuelstation;
use App\Vehicleinfo;
use Auth;
use App\Fuelorder;

class OrderFuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $forder=Fuelorder::paginate(7);
        
        return view('Home.orderfuelhome',['Fuelorder'=>$forder]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $vdriver=Vehicledriver::all();
          $ftype=Fueltypeandprice::all();
          $fsta=Fuelstation::all();
          $vinfo=Vehicleinfo::all();
         return view('Order.orderfuel',array('Vehicledriver'=>$vdriver,'Fueltypeandprice'=>$ftype,'Fuelstation'=>$fsta,'Vehicleinfo'=>$vinfo));
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
    $forder=new Fuelorder;
    $ordernumber= DB::table('fuelorders')->get();
   $count= $ordernumber->count();

         //dd($count);
         //$supcode = Supplier::where('suppliercode',=$request->suppliercode)->get();
         if ($count=='null') {
            $forder->ordernumber='EB-FUEL-ORD-1';
        }
        else{
            $count=$count+1;
            $forder->ordernumber='EB-FUEL-ORD-'.$count;
        }
 $currfuellevel = DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('fuelavailableinlittre');

 $currfuellevelordered = DB::table('fuelorders')->where('platenumber', '=',$request->platenumber)->value('totallitter');

    $totalcostprev= DB::table('fuelorders')->where('platenumber', '=',$request->platenumber)->value('totalbirr');

         $ftyp=new Fueltypeandprice;
         $price = DB::table('fueltypeandprices')->where('fueltype', '=',$request->fueltype)->value('fuelprice');


        $price =$price  * $request->fuellevel;

        $totallitter=$currfuellevelordered + $request->fuellevel;
        $totalcost=  $totalcostprev+$price;
        $forder->platenumber=$request->platenumber;
        $forder->drivername=$request->drivername;

        $forder->fuelstation=$request->stationname;
        $forder->fuellevelinlittre=$request->fuellevel;
        $forder->fueltype=$request->fueltype;
        $forder->orderdate=$request->orderdate;
        $forder->totallitter= $totallitter;
        $forder->totalbirr=$totalcost;
           $forder->cost=$price;
        $forder->Maker=Auth::User()->username;
       

       $forder->save();
          //
DB::table('vehicleinfos')
            ->where('platenumber', $request->platenumber)
            ->update(['fuelavailableinlittre' =>$request->fuellevel ]);
      // Display::create($request->all());
        \Session::flash('flash_message','New Fuel Ordered.');
         return redirect('/orderfuelhome');
        
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
       $forder=Fuelorder::find($id);

        return view('Edit.fuelorderedit')->withFuelorder($forder);
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
        $forder= Fuelorder::find($id);
       /// $forder ->update($request->all());
       // \Session::flash('flash_message','  successfully updated.');
        // return redirect('/orderfuelhome');


         // $forder=new Fuelorder;
    //dd($request->fuellevel);
        $platenumber=DB::table('fuelorders')->where('id', '=',$id)->value('platenumber');

 $currfuellevel = DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('fuelavailableinlittre');
         $ftyp=new Fueltypeandprice;
         $price = DB::table('fueltypeandprices')->where('fueltype', '=',$request->fueltype)->value('fuelprice');
        $price =$price  * $request->fuellevel;
        $forder->platenumber=$request->platenumber;
        $forder->drivername=$request->drivername;

        $forder->fuelstation=$request->stationname;
        $forder->fuellevelinlittre=$request->fuellevel;
        $forder->fueltype=$request->fueltype;
        $forder->orderdate=$request->orderdate;
           $forder->cost=$price;
        $forder->Maker=Auth::User()->username;
       

       $forder->save();
          //
DB::table('vehicleinfos')
            ->where('platenumber', $request->platenumber)
            ->update(['fuelavailableinlittre' =>$request->fuellevel ]);
      // Display::create($request->all());
        \Session::flash('flash_message','successfully updated.');
         return redirect('/orderfuelhome');
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
         $forder= Fuelorder::find($id);
         $forder->delete();
         \Session::flash('flash_message','   Closed.');
         return redirect('/orderfuelhome');
    }
}
