<?php

namespace App\Http\Controllers\Resource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Garage;
use Auth;
use Illuminate\Support\Facades\DB;
class GaragesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gar=Garage::paginate(7);
        
        return view('Home.garagehome',['Garage'=>$gar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Maintainance.newaddgarage');
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
            $garagecode = DB::table('garages')->where('garagecode', '=',$request->garagecode)->get();

        $count=$garagecode->count();

         //dd($count);
         //$supcode = Supplier::where('suppliercode',=$request->suppliercode)->get();
         if ($count=='1') {
            \Session::flash('flash_message_delete','FuelStation with this code already exist pls change station code.');
            return redirect('/newgarage');
        }
        $gar=new Garage;
        $gar->garagecode=$request->garagecode;
        $gar->garagename=$request->garagename;
        $gar->garagetelno=$request->garagetelno;
        $gar->Maker=Auth::User()->username;
        $gar->city=$request->city;
        $gar->woreda=$request->woreda;

       $gar->save();
          //

      // Display::create($request->all());
        \Session::flash('flash_message','New Garage successfully added.');
         return redirect('/garagehome');
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
        $gar = Garage::find($id);

        return view('Edit.garedit')->withGarage($gar);

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
        $gar=Garage::find($id);
        $gar->update($request->all());
        \Session::flash('flash_message',' Garage successfully updated.');
         return redirect('/garagehome');
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
        $gar=Garage::find($id);
          $gar->delete();
         \Session::flash('flash_message_delete',' Garage successfully deleted.');
         return redirect('/garagehome');
    }
}
