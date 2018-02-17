<?php

namespace App\Http\Controllers\Resource;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Vehicleinfo;
use App\Supplier;
use App\Vehicledriver;
use App\Vehicletype;
use App\Fueltypeandprice;
use Illuminate\Support\Facades\DB;
class VehicleInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vinfo=Vehicleinfo::paginate(7);
        
        return view('Home.vehicleinfohome',['Vehicleinfo'=>$vinfo]);
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
         $vtype=Vehicletype::all();
         $ftype=Fueltypeandprice::all();
         $sup=Supplier::all();
     //   return view('Maintainance.newvehicleinfo',['Supplier'=>$sup],['Vehicledriver'=>$vdriver],['Vehicletype'=>$vtype],['Fueltypeandprice'=>$ftype]);

        

        return view('Maintainance.newvehicleinfo', array('Supplier'=>$sup,
               'Vehicledriver'=>$vdriver ,'Vehicletype'=>$vtype,'Fueltypeandprice'=>$ftype));
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

        $platenumber = DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->get();

        $count=$platenumber->count();

         //dd($count);
         //$supcode = Supplier::where('suppliercode',=$request->suppliercode)->get();
         if ($count=='1') {
            \Session::flash('flash_message_delete','Vehicle with this platenumber already exist pls change platenumber.');
            return redirect('/newvehicleinfo');
        }
        $vehicleinfo=new Vehicleinfo;
        $vehicleinfo->platenumber=$request->platenumber;
        $vehicleinfo->vehicletype=$request->vehicletype;
        $vehicleinfo->motornumber=$request->motornumber;
        $vehicleinfo->servicekm=$request->servicekm;
        $vehicleinfo->vehiclemodel=$request->vehiclemodel;
        $vehicleinfo->chasisnumber=$request->chasisnumber;
        $vehicleinfo->datebaought=$request->datebaought;
        $vehicleinfo->suppliername=$request->suppliername;
        $vehicleinfo->drivername=$request->drivername;
        $vehicleinfo->vehicleprice=$request->vehicleprice;
        $vehicleinfo->fuelavailableinlittre=$request->fuel;
      $vehicleinfo->abysiniacard=$request->abysiniacard;
        $vehicleinfo->numofdoors=$request->numofdoors;
        $vehicleinfo->fueltype=$request->fueltype;
        $vehicleinfo->radiocassete=$request->radiocassete;
        $vehicleinfo->airconditionare=$request->airconditionare;
         $vehicleinfo->abysiniacardremaining=$request->abysiniacard;
       // $vehicleinfo->wheelbase=$request->wheelbase;

        //$vtype->supplier=$request->supplier;
       $vehicleinfo->Maker=Auth::User()->username;

       $vehicleinfo->save();
       \Session::flash('flash_message','New Vehicle successfully added.');
         return redirect('/vehicleinfohome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        //
        $vinfo = new Vehicleinfo;

        $vinfo = Vehicleinfo::find($id);
        $uri = $request->path();
        //return $uri;
       return view('pages.vehicleshow')->with('Vehicleinfo',$vinfo);
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
         $vdriver=Vehicledriver::all();
         $vtype=Vehicletype::all();
         $ftype=Fueltypeandprice::all();
         $sup=Supplier::all();
        $vinfo= Vehicleinfo::find($id);

        return view('Edit.vinfoedit')->withVehicleinfo($vinfo);
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

            $vehicleinfo=Vehicleinfo::find($id);

$curr_aby_remain = DB::table('vehicleinfos')->where('id', '=',$id)->value('abysiniacardremaining');

if($request->abysiniacard>=$request->abysiniacardrem){
    $vehicleinfo->platenumber=$request->platenumber;
        $vehicleinfo->vehicletype=$request->vehicletype;
        $vehicleinfo->motornumber=$request->motornumber;
        $vehicleinfo->servicekm=$request->servicekm;
        $vehicleinfo->vehiclemodel=$request->vehiclemodel;
        $vehicleinfo->chasisnumber=$request->chasisnumber;
        $vehicleinfo->datebaought=$request->datebaought;
        $vehicleinfo->suppliername=$request->suppliername;
        $vehicleinfo->drivername=$request->drivername;
        $vehicleinfo->vehicleprice=$request->vehicleprice;
        $vehicleinfo->fuelavailableinlittre=$request->fuel;
      $vehicleinfo->abysiniacard=$request->abysiniacard;
        $vehicleinfo->numofdoors=$request->numofdoors;
        $vehicleinfo->fueltype=$request->fueltype;
        $vehicleinfo->radiocassete=$request->radiocassete;
        $vehicleinfo->airconditionare=$request->airconditionare;
         $vehicleinfo->abysiniacardremaining=$request->abysiniacardrem;
          $vehicleinfo->abysiniacardused=$request->abysiniacard-$request->abysiniacardrem;

       // $vehicleinfo->wheelbase=$request->wheelbase;

        //$vtype->supplier=$request->supplier;
       $vehicleinfo->Maker=Auth::User()->username;

       $vehicleinfo->save();
        //dd($request->all());
       // $vinfo->update($request->all());
        \Session::flash('flash_message',' Vehicle Information successfully updated.');
         return redirect('/vehicleinfohome');

}
else{
    \Session::flash('flash_message_delete',' Abysiniacard can not be less than Abysiniacard Remaininig');
         return redirect('/vehicleinfohome');
}

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
         $vinfo=Vehicleinfo::find($id);
       $vinfo->delete();
         \Session::flash('flash_message_delete',' Record  closed.');
         return redirect('/vehicleinfohome');
    }
}
