<?php

namespace App\Http\Controllers\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cityfuelorder;
use Auth;
use App\Fueltypeandprice;
use Illuminate\Support\Facades\DB;

class OrderCityFuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $forder=Cityfuelorder::paginate(7);
        
        return view('Home.ordercityfuelhome',['Cityfuelorder'=>$forder]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('order.ordercityfuel'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

         $forder=new Cityfuelorder;

         $d = date_parse_from_format("Y-m-d", $request->orderdate);

         $currfuellevelordered = DB::table('cityfuelorders')->where('platenumber', '=',$request->platenumber)->value('totallitter');
        $currfuellevel = DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('fuelavailableinlittre');

        $curr_aby_remain = DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('abysiniacardremaining');

                     $curr_aby_used= DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('abysiniacardused');
         $ftyp=new Fueltypeandprice;
         $price = DB::table('fueltypeandprices')->where('fueltype', '=',$request->fueltype)->value('fuelprice');
        $price =$price  * $request->fuellevel;
         if(  $curr_aby_remain<$request->abysiniacard){
            \Session::flash('flash_message_delete','There is no enough birr in your Abysinia card please Enter less amount of Abysinia Card.');
         return redirect('/orderfuelcity');
         }
         $epsilon = 0.1;

$abcard = (float)$request->abysiniacard;
         if(abs($price-$abcard)>$epsilon){

        // dd($abcard ,$price);
\Session::flash('flash_message_delete','Abysinia Card issued is not 
                equal to the current fuel price.');
         return redirect('/orderfuelcity');
       
            
         }


          $forder->platenumber=$request->platenumber;
        $forder->drivername=$request->drivername;
       //$forder->totallitter=$request->fuellevel + $currfuellevelordered;

        $forder->fuelstation=$request->stationname;
        $forder->fuelconsumptioninlitter=$request->fuellevel;
        $forder->fueltype=$request->fueltype;
        $forder->orderdate=$request->orderdate;
           $forder->abysiniacard=$request->abysiniacard;
        $forder->Maker=Auth::User()->username;
       
$abysinacardremaining=$curr_aby_remain-$request->abysiniacard;
       $forder->save();
          //
DB::table('vehicleinfos')
            ->where('platenumber', $request->platenumber)
            ->update(['fuelavailableinlittre' =>$request->fuellevel]);

            DB::table('vehicleinfos')
            ->where('platenumber', $request->platenumber)
            ->update(['abysiniacardremaining' =>$abysinacardremaining ]);

            DB::table('vehicleinfos')
            ->where('platenumber', $request->platenumber)
            ->update(['abysiniacardused' =>$request->abysiniacard + $curr_aby_used ]);



      // Display::create($request->all());
        \Session::flash('flash_message','New Fuel Ordered For City Work.');
         return redirect('/orderfuelcityhome');
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
        $forder=Cityfuelorder::find($id);
        return view('Edit.cityfuelorderedit')->withCityfuelorder($forder);
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
//$vmov=Vehiclemovement::find($id);
$forder=Cityfuelorder::find($id);

$currentdate = date('Y-m');
 $recordedplatenumber=DB::table('cityfuelorders')->where('id', '=',$id)->value('platenumber');

         $d = date_parse_from_format("Y-m-d", $request->orderdate);

         $currfuellevelordered = DB::table('cityfuelorders')->where('platenumber', '=',$request->platenumber)->value('totallitter');
        $currfuellevel = DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('fuelavailableinlittre');

        $curr_aby_remain = DB::table('vehicleinfos')->where('platenumber', '=',$recordedplatenumber)->value('abysiniacardremaining');

         $curr_aby_used= DB::table('vehicleinfos')->where('platenumber', '=',$recordedplatenumber)->value('abysiniacardused');
         $ftyp=new Fueltypeandprice;
         $price = DB::table('fueltypeandprices')->where('fueltype', '=',$request->fueltype)->value('fuelprice');
        $price =$price  * $request->fuellevel;
         if(  $curr_aby_remain<$request->abysiniacard){
            \Session::flash('flash_message_delete','There is no enough birr in your Abysinia card please Enter less amount of Abysinia Card.');
         return redirect('/orderfuelcity');
         }
         $epsilon = 0.1;

$abcard = (float)$request->abysiniacard;
         if(abs($price-$abcard)>$epsilon){

        // dd($abcard ,$price);
\Session::flash('flash_message_delete','Abysinia Card issued is not 
                equal to the currnt fuel price.');
         return redirect('/orderfuelcity');
       
            
         }

$recordedabycard=DB::table('cityfuelorders')->where('id', '=',$id)->value('abysiniacard');

 $recordedord_date=DB::table('cityfuelorders')->where('id', '=',$id)->value('orderdate');
 //dd($platenumber);
 $requestdate=date("Y-m",strtotime($recordedord_date));
  if(  $currentdate===$requestdate){
          $forder->platenumber=$recordedplatenumber;
        $forder->drivername=$request->drivername;
       //$forder->totallitter=$request->fuellevel + $currfuellevelordered;

        $forder->fuelstation=$request->stationname;
        $forder->fuelconsumptioninlitter=$request->fuellevel;
        $forder->fueltype=$request->fueltype;
        $forder->orderdate=$request->orderdate;
           $forder->abysiniacard=$request->abysiniacard;
        $forder->Maker=Auth::User()->username;
       
$abysinacardremaining=($curr_aby_remain+$recordedabycard)-$request->abysiniacard;
       $forder->save();
          //
DB::table('vehicleinfos')
            ->where('platenumber', $recordedplatenumber)
            ->update(['fuelavailableinlittre' =>$request->fuellevel ]);

            DB::table('vehicleinfos')
            ->where('platenumber', $recordedplatenumber)
            ->update(['abysiniacardremaining' =>$abysinacardremaining ]);

            DB::table('vehicleinfos')
            ->where('platenumber', $recordedplatenumber)
            ->update(['abysiniacardused' =>$request->abysiniacard + $curr_aby_used ]);



      // Display::create($request->all());
        \Session::flash('flash_message','Record has been successfully updated.');
         return redirect('/orderfuelcityhome');
}
else{
    \Session::flash('flash_message_delete','Record can not be updated at this time ');
            return redirect('/orderfuelcityhome');
}
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
        $currentdate = date('Y-m');
       
$forder=Cityfuelorder::find($id);

 $platenumber=DB::table('cityfuelorders')->where('id', '=',$id)->value('platenumber');

  $recordedord_date=DB::table('cityfuelorders')->where('id', '=',$id)->value('orderdate');
 //dd($platenumber);
 $requestdate=date("Y-m",strtotime($recordedord_date));
 $curr_aby_used= DB::table('vehicleinfos')->where('platenumber', '=',$platenumber)->value('abysiniacardused');

 $curr_aby_remain = DB::table('vehicleinfos')->where('platenumber', '=',$platenumber)->value('abysiniacardremaining');

        $recordedabycard=DB::table('cityfuelorders')->where('id', '=',$id)->value('abysiniacard');

 $recordedfuel=DB::table('cityfuelorders')->where('id', '=',$request->id)->value('fuelconsumptioninlitter');
$abysinacardremaining=$curr_aby_remain+$recordedabycard;
         if(  $currentdate===$requestdate){
            DB::table('vehicleinfos')
            ->where('platenumber', $platenumber)
            ->update(['abysiniacardremaining' =>$abysinacardremaining ]);

            DB::table('vehicleinfos')
            ->where('platenumber', $platenumber)
            ->update(['abysiniacardused' =>$curr_aby_used-$recordedabycard]);
            $forder->delete();

             \Session::flash('flash_message_delete','Record has been closed.');
         return redirect('/orderfuelcityhome');
        }

        else{
          //  dd("Invalid");
            \Session::flash('flash_message_delete','Record can not be closed at this time ');
            return redirect('/orderfuelcityhome');
        }
            
    }
}
