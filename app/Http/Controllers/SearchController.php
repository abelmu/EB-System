<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Garage;
use App\Fuelstation;
use App\Fueltypeandprice;
use App\Vehicletype;
use App\Vehicledriver;
use App\Vehicleinfo;
use App\Vehiclemovement;
use App\Cityfuelorder;
use App\Cityvehiclemovement;
use App\Vehiclehandover;
use App\Fuelorder;
class SearchController extends Controller
{
    //

public function search(Request $request){
 $sup=new Supplier;
        $supname=$request->search;

        //dd($supname);
       $sup=Supplier::where('suppliername', 'LIKE', "%$supname%")->paginate(2);
      //dd($res);
     // return json_encode($res);
      return view('Home.suphome',['Supplier'=>$sup]);
    }


  public function searchgarage(Request $request){
 $gar=new Garage;
        $garagename=$request->search;

        //dd($supname);
       $gar=Garage::where('garagename', 'LIKE', "%$garagename%")->paginate(2);
      //dd($res);
     // return json_encode($res);
      return view('Home.garagehome',['Garage'=>$gar]);
    }




      public function fuelstation(Request $request){
 $fsta=new Fuelstation;
        $stationname=$request->search;

        //dd($supname);
       $fsta=Fuelstation::where('stationname', 'LIKE', "%$stationname%")->paginate(2);
      //dd($res);
     // return json_encode($res);
      return view('Home.fuelstationhome',['Fuelstation'=>$fsta]);
    }


public function fuelprice(Request $request){
 $fsta=new Fueltypeandprice;
        $fueltype=$request->search;

        //dd($supname);
       $fsta=Fueltypeandprice::where('fueltype', 'LIKE', "%$fueltype%")->paginate(2);
      //dd($res);
     // return json_encode($res);
      return view('Home.fueltypeandpricehome',['Fueltypeandprice'=>$fsta]);
    }


    public function vehicletypes(Request $request){
 $vtype=new Vehicletype;
        $vehicletype=$request->search;

        //dd($supname);
       $vtype=Vehicletype::where('vehicletype', 'LIKE', "%$vehicletype%")->paginate(2);
      //dd($res);
     // return json_encode($res);
      return view('Home.vehicletypeshome',['Vehicletype'=>$vtype]);
    }

    public function vehicledrivers(Request $request){
 $vdriver=new Vehicledriver;
        $drivername=$request->search;

        //dd($supname);
       $vdriver=Vehicledriver::where('drivername', 'LIKE', "%$drivername%")->paginate(2);
      //dd($res);
     // return json_encode($res);
      return view('Home.vehicledrivershome',['Vehicledriver'=>$vdriver]);
    }

        public function vehicleinfo(Request $request){
 $vehicleinfo=new Vehicleinfo;
        $vehicletype=$request->search;

        //dd($supname);
       $vehicleinfo=Vehicleinfo::where('vehicletype', 'LIKE', "%$vehicletype%")->paginate(2);
      //dd($res);
     // return json_encode($res);
      return view('Home.vehicleinfohome',['Vehicleinfo'=>$vehicleinfo]);
    }
        public function  vehiclemov(Request $request){
 $vmov=new Vehiclemovement;
        $platenumber=$request->search;

        //dd($supname);
       $vmov=Vehiclemovement::where('platenumber', 'LIKE', "%$platenumber%")->paginate(2);
      //dd($res);
     // return json_encode($res);
      return view('Home./vehiclemovhome',['Vehiclemovement'=>$vmov]);
    }

           public function  cityvehiclemov(Request $request){
 $vmov=new Cityvehiclemovement;
        $platenumber=$request->search;

        //dd($supname);
       $vmov=Cityvehiclemovement::where('platenumber', 'LIKE', "%$platenumber%")->paginate(2);
      //dd($res);
     // return json_encode($res);
      return view('Home./cityvehiclemovhome',['Cityvehiclemovement'=>$vmov]);
    }

    public function  searchfuelorder(Request $request){
 $forder=new Fuelorder;
        $platenumber=$request->search;

        //dd($supname);
       $forder=Fuelorder::where('platenumber', 'LIKE', "%$platenumber%")->paginate(2);
      //dd($res);
     // return json_encode($res);
      return view('Home./orderfuelhome',['Fuelorder'=>$forder]);
    }
    public function  searchcityfuelorder(Request $request){
 $forder=new Cityfuelorder;
        $platenumber=$request->search;

        //dd($supname);
       $forder=Cityfuelorder::where('platenumber', 'LIKE', "%$platenumber%")->paginate(2);
      //dd($res);
     // return json_encode($res);
      return view('Home./ordercityfuelhome',['Cityfuelorder'=>$forder]);
    }

       public function  searchvehiclehandover(Request $request){
 $vhandover=Vehiclehandover::paginate(7);
        $platenumber=$request->search;

        //dd($supname);
      $vhandover=Vehiclehandover::where('platenumber', 'LIKE', "%$platenumber%")->paginate(2);
      //dd($res);
     // return json_encode($res);
      return view('Home.vehiclehandoverhome',['Vehiclehandover'=>$vhandover]);
    }


     
}
