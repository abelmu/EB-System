<?php

namespace App\Http\Controllers\Report;
use App\Http\Controllers\Controller;
use App\Vehiclemovement;
use App\Vehicleservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cityvehiclemovement;

use App\Vehicleinfo;

use App\Fuelorder;

use App\Cityfuelorder;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vehiclemovement(Request $request)
    {
        //
         $vmov=new Vehiclemovement;

         $cityvmov=new Cityvehiclemovement;

         $vinfo=new Vehicleinfo;

         $forder=new Fuelorder;

         $cityforder=new Cityfuelorder;
        $platenumber=$request->platenumber;
        $startdate=$request->sdate;
        $enddate=$request->udate;
//dd($startdate);

      //  $val = DB::table('Vehiclemovements')->where('platenumber', '=', $platenumber,'')->lists('servicekm');
        //$result = DB::table('Vehiclemovements')->select('platenumber', 'drivername','')->get();

        if($request->platenumber=='all'){
            
$sd = date_parse_from_format("Y-m-d", $startdate);
$ed = date_parse_from_format("Y-m-d", $enddate);
           $result= DB::table('vehicleinfos')->select("vehicleinfos.platenumber",
           
            DB::raw("(select sum(fuellevelinlittre) from fuelorders
                where  orderdate between '".$startdate."' and  '".$enddate."'  and platenumber=vehicleinfos.platenumber
                ) as totallitterforfield"),   
             DB::raw("(select sum(fuelconsumptioninlitter) from cityfuelorders
                where  orderdate between '".$startdate."' and  '".$enddate."'  and  platenumber=vehicleinfos.platenumber 
                ) as totallitterforcity"),

 DB::raw("(select sum(abysiniacard) from abysiniacards
                where  orderdate between '".$startdate."' and  '".$enddate."'  and  platenumber=vehicleinfos.platenumber 
                ) as abysiniacard"),


             DB::raw("(select sum(cost) from fuelorders
                where  orderdate between '".$startdate."' and  '".$enddate."'  and  platenumber=vehicleinfos.platenumber 
                ) as totalbirrforfield"),
             DB::raw("(select sum(abysiniacard) from cityfuelorders
                where  orderdate between '".$startdate."' and  '".$enddate."'  and platenumber=vehicleinfos.platenumber 
                ) as totalbirrforcity"),
              DB::raw("(select sum(differencekm) from vehiclemovements
               where  movementdate between '".$startdate."' and  '".$enddate."'  and  platenumber=vehicleinfos.platenumber 
                ) as totalKmforfield"),

               DB::raw("(select sum(differencekm) from cityvehiclemovements
               where  movementdate between '".$startdate."' and  '".$enddate."'  and  platenumber=vehicleinfos.platenumber 
                ) as totalKmforcity")

              

      




               

            )
           ->get();
         //dd($result);
            $count=$result->count();
           if($count=='0'){
    \Session::flash('flash_message_delete','No Record Found with the specifaied search criateria.');
            return redirect('/vehiclemovreports');
}
$totallitterdrawn = array( );

 $totalbirrforfuel=array();
 $totalkm=array();
$averagekm=array();
$abysiniacardremain=array();
$avgkm=0;
 $counterkm=0;
 $counterbirr=0;
 $countbirr=0;
 $countkm=0;
$count=0;
$counter=0;
$counteraverage=0;

$countabysiniacard=0;
$counterabysiniacard=0;
$totalfieldfuellitter=0;
$totalcityfuellitter=0;
$totalfuellitter=0;

$totalfieldbirr=0;
$totalcitybirr=0;
$totalcost=0;
$fieldservicekm=0;
$cityservicekm=0;
$totalservicekm=0;
$totalavgkmfield=0;
$totalavgkmcity=0;
$totalavgkm=0;
$averagekmcity=array();
$averagekmfield=array();
$avgkmcity=0;
$avgkmfield=0;
$counteravgkmfield=0;
$counteravgkmcity=0;
$totalabysiniacardremain=0;
           foreach($result as $res){
            $totallitterdrawn[$count]=$res->totallitterforfield + $res->totallitterforcity;

            $totalbirrforfuel[$countbirr]=$res->totalbirrforfield + $res->totalbirrforcity;

            $totalkm[$countkm]=$res->totalKmforfield + $res->totalKmforcity;
           
            $abysiniacardremain[$countabysiniacard]=$res->abysiniacard - $res->totalbirrforcity;

            $totalfieldfuellitter=$totalfieldfuellitter+$res->totallitterforfield;
            $totalcityfuellitter=$totalcityfuellitter+$res->totallitterforcity;
            $totalfuellitter=$totalfuellitter+$totallitterdrawn[$count];

            $totalfieldbirr=$totalfieldbirr+$res->totalbirrforfield;
            $totalcitybirr=$totalcitybirr+$res->totalbirrforcity;
            $totalcost=$totalcost + $totalbirrforfuel[$countbirr];

            $fieldservicekm=$fieldservicekm+$res->totalKmforfield;
            $cityservicekm=$cityservicekm+$res->totalKmforcity;
            $totalservicekm=$totalservicekm+ $totalkm[$countkm];
            if($totallitterdrawn[$count]=='0'){
                 $averagekm[$avgkm]=0;
            }
            else{
                $averagekm[$avgkm]=$totalkm[$countkm]/$totallitterdrawn[$count];
            }
              // dd($res->totallitterforfield);
             if($res->totallitterforfield==null){
                  $averagekmfield[$avgkmfield]=0;
            }

            else{
                $averagekmfield[$avgkmfield]=$res->totalKmforfield/$res->totallitterforfield;
            }
            
              if($res->totallitterforcity==null){
                   $averagekmcity[$avgkmcity]=0;
            }
            else{
                $averagekmcity[$avgkmcity]=$res->totalKmforcity/$res->totallitterforcity;
            }
            

             $totalavgkmfield=$totalavgkmfield+$averagekmfield[$avgkmfield];
             $totalavgkmcity=$totalavgkmcity+$averagekmcity[$avgkmcity];
             $totalavgkm=$totalavgkm+ $averagekm[$avgkm];
             $totalabysiniacardremain=$totalabysiniacardremain+$abysiniacardremain[$countabysiniacard];
             $avgkmcity++;
             $avgkmfield++;
            $count++;
            $countbirr++;
            $countkm++;
            $avgkm++;
            $countabysiniacard++;


           }
           //dd($totallitterdrawn);

             return view('Report.cityvehiclemovementreport',['Vehiclemovement'=>$result,
                  'totallitter'=> $totallitterdrawn,'totalbirrforfuel'=>$totalbirrforfuel,'servicekm'=>$totalkm,"counter"=>$counter,'counterbirr'=>$counterbirr,'counterkm'=>$counterkm,'averagekmperlitter'=>$averagekm,'counteraverage'=>$counteraverage,'abysiniacardremaining'=> $abysiniacardremain,'counterabysiniacard'=>$counterabysiniacard,'totalfieldbirr'=>$totalfieldbirr,'totalcitybirr'=>$totalcitybirr,'totalbirr'=>$totalcost,'totalfieldfuel'=>$totalfieldfuellitter,'totalcityfuel'=>$totalcityfuellitter,'totalfuellitter'=>$totalfuellitter,'fieldservicekm'
                  =>$fieldservicekm,'cityservicekm'=>$cityservicekm,'totalservicekm'=>$totalservicekm,'averagekmfield'=>$averagekmfield,'counteravgkmfield'=>$counteravgkmfield,'averagekmcity'=>$averagekmcity,'counteravgkmcity'=>$counteravgkmcity,'totalavgkmfield'=>$totalavgkmfield,'totalavgkmcity'
                  =>$totalavgkmcity,'totalavgkm'=>$totalavgkm,'totalabysiniacardremain'=>$totalabysiniacardremain,'startdate'=>$startdate,'enddate'=>$enddate]
              ); 
        }
        else{



$result= DB::table('vehicleinfos')->select("vehicleinfos.platenumber",
            'abysiniacard',
            DB::raw("(select sum(fuellevelinlittre) from fuelorders
                where  orderdate between '".$startdate."' and  '".$enddate."'  and platenumber=vehicleinfos.platenumber
                ) as totallitterforfield"),   
             DB::raw("(select sum(fuelconsumptioninlitter) from cityfuelorders
                where  orderdate between '".$startdate."' and  '".$enddate."'  and  platenumber=vehicleinfos.platenumber 
                ) as totallitterforcity"),




             DB::raw("(select sum(totalbirr) from fuelorders
                where  orderdate between '".$startdate."' and  '".$enddate."'  and  platenumber=vehicleinfos.platenumber 
                ) as totalbirrforfield"),
             DB::raw("(select sum(abysiniacard) from cityfuelorders
                where  orderdate between '".$startdate."' and  '".$enddate."'  and platenumber=vehicleinfos.platenumber 
                ) as totalbirrforcity"),
              DB::raw("(select sum(differencekm) from vehiclemovements
               where  movementdate between '".$startdate."' and  '".$enddate."'  and  platenumber=vehicleinfos.platenumber 
                ) as totalKmforfield"),

               DB::raw("(select sum(differencekm) from cityvehiclemovements
               where  movementdate between '".$startdate."' and  '".$enddate."'  and  platenumber=vehicleinfos.platenumber 
                ) as totalKmforcity")

              

      




               
  
            )->where('platenumber', '=', $platenumber)
           ->get();

           $totallitterdrawn = array( );

 $totalbirrforfuel=array();
 $totalkm=array();
$averagekm=array();
$abysiniacardremain=array();
$avgkm=0;
 $counterkm=0;
 $counterbirr=0;
 $countbirr=0;
 $countkm=0;
$count=0;
$counter=0;
$counteraverage=0;

$countabysiniacard=0;
$counterabysiniacard=0;
$totalfieldfuellitter=0;
$totalcityfuellitter=0;
$totalfuellitter=0;

$totalfieldbirr=0;
$totalcitybirr=0;
$totalcost=0;
$fieldservicekm=0;
$cityservicekm=0;
$totalservicekm=0;
$totalavgkmfield=0;
$totalavgkmcity=0;
$totalavgkm=0;
$averagekmcity=array();
$averagekmfield=array();
$avgkmcity=0;
$avgkmfield=0;
$counteravgkmfield=0;
$counteravgkmcity=0;
$totalabysiniacardremain=0;
           foreach($result as $res){
            $totallitterdrawn[$count]=$res->totallitterforfield + $res->totallitterforcity;

            $totalbirrforfuel[$countbirr]=$res->totalbirrforfield + $res->totalbirrforcity;

            $totalkm[$countkm]=$res->totalKmforfield + $res->totalKmforcity;
           
            $abysiniacardremain[$countabysiniacard]=$res->abysiniacard - $res->totalbirrforcity;

            $totalfieldfuellitter=$totalfieldfuellitter+$res->totallitterforfield;
            $totalcityfuellitter=$totalcityfuellitter+$res->totallitterforcity;
            $totalfuellitter=$totalfuellitter+$totallitterdrawn[$count];

            $totalfieldbirr=$totalfieldbirr+$res->totalbirrforfield;
            $totalcitybirr=$totalcitybirr+$res->totalbirrforcity;
            $totalcost=$totalcost + $totalbirrforfuel[$countbirr];

            $fieldservicekm=$fieldservicekm+$res->totalKmforfield;
            $cityservicekm=$cityservicekm+$res->totalKmforcity;
            $totalservicekm=$totalservicekm+ $totalkm[$countkm];
            if($totallitterdrawn[$count]=='0'){
                 $averagekm[$avgkm]=0;
            }
            else{
                $averagekm[$avgkm]=$totalkm[$countkm]/$totallitterdrawn[$count];
            }
              // dd($res->totallitterforfield);
             if($res->totallitterforfield==null){
                  $averagekmfield[$avgkmfield]=0;
            }

            else{
                $averagekmfield[$avgkmfield]=$res->totalKmforfield/$res->totallitterforfield;
            }
            
              if($res->totallitterforcity==null){
                   $averagekmcity[$avgkmcity]=0;
            }
            else{
                $averagekmcity[$avgkmcity]=$res->totalKmforcity/$res->totallitterforcity;
            }
            

             $totalavgkmfield=$totalavgkmfield+$averagekmfield[$avgkmfield];
             $totalavgkmcity=$totalavgkmcity+$averagekmcity[$avgkmcity];
             $totalavgkm=$totalavgkm+ $averagekm[$avgkm];
             $totalabysiniacardremain=$totalabysiniacardremain+$abysiniacardremain[$countabysiniacard];
             $avgkmcity++;
             $avgkmfield++;
            $count++;
            $countbirr++;
            $countkm++;
            $avgkm++;
            $countabysiniacard++;


           }

   // $result= DB::table('Vehiclemovements')
           // ->where('platenumber', '=', $platenumber)
            //->whereBetween('movementdate', [$startdate,$enddate])                   
            //->get();
             $count=$result->count();
             
if($count=='0'){
    \Session::flash('flash_message_delete','No Record Found with the specifaied search criateria.');
            return redirect('/vehiclemovreports');
}
//dd($result);

return view('Report.vehiclemovementreport',['Vehiclemovement'=>$result,
                  'totallitter'=> $totallitterdrawn,'totalbirrforfuel'=>$totalbirrforfuel,'servicekm'=>$totalkm,"counter"=>$counter,'counterbirr'=>$counterbirr,'counterkm'=>$counterkm,'averagekmperlitter'=>$averagekm,'counteraverage'=>$counteraverage,'abysiniacardremaining'=> $abysiniacardremain,'counterabysiniacard'=>$counterabysiniacard,'totalfieldbirr'=>$totalfieldbirr,'totalcitybirr'=>$totalcitybirr,'totalbirr'=>$totalcost,'totalfieldfuel'=>$totalfieldfuellitter,'totalcityfuel'=>$totalcityfuellitter,'totalfuellitter'=>$totalfuellitter,'fieldservicekm'
                  =>$fieldservicekm,'cityservicekm'=>$cityservicekm,'totalservicekm'=>$totalservicekm,'averagekmfield'=>$averagekmfield,'counteravgkmfield'=>$counteravgkmfield,'averagekmcity'=>$averagekmcity,'counteravgkmcity'=>$counteravgkmcity,'totalavgkmfield'=>$totalavgkmfield,'totalavgkmcity'
                  =>$totalavgkmcity,'totalavgkm'=>$totalavgkm,'totalabysiniacardremain'=>$totalabysiniacardremain,'startdate'=>$startdate,'enddate'=>$enddate]
              ); 
  //return view('Report.vehiclemovementreport',['Vehiclemovement'=>$result]); 
        }
 

      

    }



        public function vehicleservice(Request $request)
    {
        //
        $counter=1;
         $vserv=new Vehicleservice;
        $platenumber=$request->platenumber;
        $startdate=$request->sdate;
        $enddate=$request->udate;
if($request->platenumber=='all'){
    $result= DB::table('vehicleservices')
            ->whereBetween('fromdate', [$startdate,$enddate])                   
            ->get();
             $count=$result->count();
if($count=='0'){
    \Session::flash('flash_message_delete','No Record Found with the specifaied search criateria.');
            return redirect('/vehicleservicereports');
}
   return view('Report.vehicleservicereport',['Vehicleservice'=>$result,'counter'=>$counter]);

}

else{



     $result= DB::table('vehicleservices')
            ->where('platenumber', '=', $platenumber)
            ->whereBetween('fromdate', [$startdate,$enddate])                   
            ->get();
             $count=$result->count();
             
if($count=='0'){
    \Session::flash('flash_message_delete','No Record Found with the specifaied search criateria.');
            return redirect('/vehiclemovreports');
}
   return view('Report.vehicleservicereport',['Vehicleservice'=>$result,'counter'=>$counter]); 

     } 

    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
