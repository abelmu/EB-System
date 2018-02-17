<?php

namespace App\Http\Controllers\Resource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Fueltypeandprice;
use Illuminate\Support\Facades\DB;

class FuelTypeandPrices extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $fuel=Fueltypeandprice::paginate(7);
        
        return view('Home.fueltypeandpricehome',['Fueltypeandprice'=>$fuel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Maintainance.newfueltypesandprice');
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
        $fuelcode = DB::table('fueltypeandprices')->where('fuelcode', '=',$request->fuelcode)->get();

        $count=$fuelcode->count();

         //dd($count);
         //$supcode = Supplier::where('suppliercode',=$request->suppliercode)->get();
         if ($count=='1') {
            \Session::flash('flash_message_delete','FuelType with this code already exist pls change fuel code.');
            return redirect('/newfuelprice');
        }
        $fuel=new Fueltypeandprice;
        $fuel->fuelcode=$request->fuelcode;
        $fuel->fueltype=$request->fueltype;
        $fuel->fuelprice=$request->fuelprice;
        $fuel->Maker=Auth::User()->username;

       $fuel->save();
          //

      // Display::create($request->all());
        \Session::flash('flash_message','New Feul successfully added.');
         return redirect('/feultypeandpricehome');
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
         $fuel = Fueltypeandprice::find($id);

        return view('Edit.fueltypeedit')->withFueltypeandprice($fuel);
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
         $fuel = Fueltypeandprice::find($id);
          $fuel->fuelcode=$request->fuelcode;
        $fuel->fueltype=$request->fueltype;
        $fuel->fuelprice=$request->fuelprice;
        $fuel->Maker=Auth::User()->username;

       $fuel->save();
          //

      // Display::create($request->all());
        \Session::flash('flash_message','New Feul successfully Updated.');
         return redirect('/FuelTypesandPrice');
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
         $fuel = Fueltypeandprice::find($id);
       $fuel->delete();
         \Session::flash('flash_message_delete',' Record Closed.');
         return redirect('/FuelTypesandPrice');
    }
}
