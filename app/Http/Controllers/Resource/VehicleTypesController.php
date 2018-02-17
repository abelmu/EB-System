<?php
namespace App\Http\Controllers\Resource;
use App\Http\Controllers\Controller;
use Auth;
use App\Vehicletype;
use App\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VehicleTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vtype=Vehicletype::paginate(7);
        
        return view('Home.vehicletypeshome',['Vehicletype'=>$vtype]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $sup=Supplier::all();
        return view('Maintainance.newvehicletypes',['Supplier'=>$sup]);
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
         $vehiclecode = DB::table('vehicletypes')->where('vehiclecode', '=',$request->vehiclecode)->get();

        $count=$vehiclecode->count();

         //dd($count);
         //$supcode = Supplier::where('suppliercode',=$request->suppliercode)->get();
         if ($count=='1') {
            \Session::flash('flash_message_delete','VehicleType with this code already exist pls change Vehicle code.');
            return redirect('/newfuelprice');
        }
        $vtype=new Vehicletype;
        $vtype->vehiclecode=$request->vehiclecode;
        $vtype->vehicletype=$request->vehicletype;
        //$vtype->supplier=$request->supplier;
        $vtype->Maker=Auth::User()->username;

       $vtype->save();
       \Session::flash('flash_message','New Vehicle successfully added.');
         return redirect('/vehicletypeshome');
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
         $vtype = Vehicletype::find($id);

        return view('Edit.vehicletypeedit')->withVehicletype($vtype);
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
         $vtype=Vehicletype::find($id);
         $vtype->update($request->all());
        \Session::flash('flash_message',' Vehicle successfully updated.');
         return redirect('/vehicletypeshome');
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
         $vtype = Vehicletype::find($id);
         $vtype->delete();
         \Session::flash('flash_message_delete',' Vehicle successfully deleted.');
         return redirect('/vehicletypeshome');
    }
}
