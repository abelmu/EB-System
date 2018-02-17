<?php

namespace App\Http\Controllers\Resource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Abysiniacard;
use Auth;
use Illuminate\Support\Facades\DB;
class AddAbysiniaCard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $acard=Abysiniacard::paginate(7);
        
        return view('Home.abysiniacardhome',['Abysiniacard'=>$acard]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Maintainance.newabysiniacard');
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

        $currentdate = date('Y-m');
        $requestdate=date("Y-m",strtotime($request->orderdate));

        if(  $currentdate===$requestdate){
            //dd("Well go");
            $curr_aby_remain = DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('abysiniacardremaining');

                     $curr_aby_value = DB::table('vehicleinfos')->where('platenumber', '=',$request->platenumber)->value('abysiniacard');
        $acard=new Abysiniacard;
$d = date_parse_from_format("Y-m-d", $request->orderdate);
        $abysiniaprev = DB::table('abysiniacards')->where(
    'platenumber','=',$request->platenumber)
        ->where('month', '=',$d["month"])
       //    ->where('deleted_at', '=',NULL)

        ->where('year','=',$d["year"])->get();

        $count=$abysiniaprev->count();
 //dd(   $count);
         if ($count>='1') {
            //dd(    $abysiniaprev);
                         
//dd($d["day"],$d["month"],$d["year"]);
           
       
        $acard->platenumber=$request->platenumber;
        $acard->day=$d["day"];
        $acard->month=$d["month"];
        $acard->year=$d["year"];
        $acard->orderdate=$request->orderdate;
        $acard->abysiniacard=$request->abysiniacard;
        //$acard->abysiniacardremaining=$request->abysiniacard + $curr_aby_remain;

        // $acard->abysiniacardused=0;
        

        $acard->Maker=Auth::User()->username;

               $acard->save();

           DB::table('vehicleinfos')
            ->where('platenumber', $request->platenumber)
            ->update(['abysiniacard' =>$request->abysiniacard +  $curr_aby_value]);
          //
           DB::table('vehicleinfos')
            ->where('platenumber', $request->platenumber)
            ->update(['abysiniacardremaining' =>$request->abysiniacard +   $curr_aby_remain]);

      // Display::create($request->all());
        \Session::flash('flash_message','Abysinia Card successfully added.');
         return redirect('/abysiniahome');

        }
        else{
        $acard->platenumber=$request->platenumber;
        $acard->day=$d["day"];
        $acard->month=$d["month"];
        $acard->year=$d["year"];
        $acard->orderdate=$request->orderdate;
        $acard->abysiniacard=$request->abysiniacard + $curr_aby_remain;
        // $acard->abysiniacardremaining=$request->abysiniacard + $curr_aby_remain;

        // $acard->abysiniacardused=0;
        

        $acard->Maker=Auth::User()->username;
       
     
//dd($d["month"]);

       $acard->save();

           DB::table('vehicleinfos')
            ->where('platenumber', $request->platenumber)
            ->update(['abysiniacard' =>$request->abysiniacard +   $curr_aby_remain]);
          //
           DB::table('vehicleinfos')
            ->where('platenumber', $request->platenumber)
            ->update(['abysiniacardremaining' =>$request->abysiniacard +   $curr_aby_remain]);
            DB::table('vehicleinfos')
            ->where('platenumber', $request->platenumber)
            ->update(['abysiniacardused' =>'0']);

      // Display::create($request->all());
        \Session::flash('flash_message','Abysinia Card successfully added.');
         return redirect('/abysiniahome');


        }
      
        
        }
        else{
          //  dd("Invalid");
            \Session::flash('flash_message_delete','Abysinia Card for this mounth can not be added now ');
            return redirect('/abysiniahome');
        }

        

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
        $acard = Abysiniacard::find($id);
 
        return view('Edit.abysiniacardedit')->withAbysiniacard($acard);
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
         

        $currentdate = date('Y-m');
        $requestdate=date("Y-m",strtotime($request->orderdate));
$reqplatenumber=DB::table('abysiniacards')->where('id', '=',$id)->value('platenumber');

$recordedaby_value=DB::table('abysiniacards')->where('id', '=',$id)->value('abysiniacard');
//dd($request->orderdate,$reqplatenumber,$recordedaby_value,$request->abysiniacard);
        if(  $currentdate===$requestdate){
            //dd("Well go");
            $curr_aby_remain = DB::table('vehicleinfos')->where('platenumber', '=',$reqplatenumber)->value('abysiniacardremaining');

                     $curr_aby_value = DB::table('vehicleinfos')->where('platenumber', '=',$reqplatenumber)->value('abysiniacard');

                     $aby_used=DB::table('vehicleinfos')->where('platenumber', '=',$reqplatenumber)->value('abysiniacardused');

  $curr_abys=($curr_aby_value-$recordedaby_value)+$request->abysiniacard;

  $curr_abys_remain=($curr_aby_remain-$recordedaby_value)+$request->abysiniacard;
                     if($aby_used>$curr_aby_remain){

                        \Session::flash('flash_message_delete','Can not be updated You have already used from this abysinia card  ');
            return redirect('/abysiniahome');

                     }
                     else{
                         $acard=Abysiniacard::find($id);

                         $d = date_parse_from_format("Y-m-d", $request->orderdate);
                        $acard->platenumber=$request->platenumber;
        $acard->day=$d["day"];
        $acard->month=$d["month"];
        $acard->year=$d["year"];
        $acard->orderdate=$request->orderdate;
        $acard->abysiniacard=$request->abysiniacard;
        //$acard->abysiniacardremaining=$request->abysiniacard + $curr_aby_remain;

         //$acard->abysiniacardused=0;
         $acard->platenumber=$request->platenumber;
        
      

        $acard->Maker=Auth::User()->username;

               $acard->save();

//$aby_value=
           DB::table('vehicleinfos')
            ->where('platenumber', $reqplatenumber)
            ->update(['abysiniacard' =>$curr_abys]);
          //
           DB::table('vehicleinfos')
            ->where('platenumber', $reqplatenumber)
            ->update(['abysiniacardremaining' =>$curr_abys_remain]);

      // Display::create($request->all());
        \Session::flash('flash_message','Abysinia Card successfully updated.');
         return redirect('/abysiniahome');

                     }
       
          
          

        }
      
        
        
        else{
          //  dd("Invalid");
            \Session::flash('flash_message_delete','Abysinia Card for this mounth can not be updated now ');
            return redirect('/abysiniahome');
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
$reqdate=DB::table('abysiniacards')->where('id', '=',$id)->value('orderdate');
$currentdate = date('Y-m');
        $requestdate=date("Y-m",strtotime($reqdate));
$reqplatenumber=DB::table('abysiniacards')->where('id', '=',$id)->value('platenumber');

$recordedaby_value=DB::table('abysiniacards')->where('id', '=',$id)->value('abysiniacard');

 if(  $currentdate===$requestdate){
            //dd("Well go");
            $curr_aby_remain = DB::table('vehicleinfos')->where('platenumber', '=',$reqplatenumber)->value('abysiniacardremaining');

                     $curr_aby_value = DB::table('vehicleinfos')->where('platenumber', '=',$reqplatenumber)->value('abysiniacard');

                     $aby_used=DB::table('vehicleinfos')->where('platenumber', '=',$reqplatenumber)->value('abysiniacardused');

  $curr_abys=$curr_aby_value-$recordedaby_value;

  $curr_abys_remain=$curr_aby_remain-$recordedaby_value;
                     if($curr_abys_remain<0){

                        \Session::flash('flash_message_delete','Can not be closed You have already used from this abysinia card  ');
            return redirect('/abysiniahome');

                     }
                     else{
                         $acard=Abysiniacard::find($id);

                         $d = date_parse_from_format("Y-m-d", $reqdate);
                        $acard->delete();

               DB::table('vehicleinfos')
            ->where('platenumber', $reqplatenumber)
            ->update(['abysiniacard' =>$curr_abys]);
          //
           DB::table('vehicleinfos')
            ->where('platenumber', $reqplatenumber)
            ->update(['abysiniacardremaining' =>$curr_abys_remain]);
             \Session::flash('flash_message_delete','closed ');
            return redirect('/abysiniahome');
    }
}
 else{
          //  dd("Invalid");
            \Session::flash('flash_message_delete','Record can not be closed at this time ');
            return redirect('/abysiniahome');
        }
}
}
