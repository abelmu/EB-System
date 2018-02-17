<?php
namespace App\Http\Controllers\Resource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;
use Auth;
use Illuminate\Support\Facades\DB;
class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $sup=Supplier::paginate(7);
        
        return view('Home.suphome',['Supplier'=>$sup]);   
        //return view('Home.suphome')->withSupplier($sup);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Maintainance.newaddsuppliers');
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
       // $users = DB::table('users')->select('name', 'email as user_email')->get();

          $supliercode = DB::table('suppliers')->where('suppliercode', '=',$request->suppliercode)->get();

        $count=$supliercode->count();

         //dd($count);
         //$supcode = Supplier::where('suppliercode',=$request->suppliercode)->get();
         if ($count=='1') {
            \Session::flash('flash_message_delete','Suppliers with this code already exist pls change Supplier code.');
            return redirect('/newsuppliers');
        }
        $sup=new Supplier;
        $sup->suppliercode=$request->suppliercode;
        $sup->suppliername=$request->suppliername;

        $sup->telno1=$request->telno1;

        $sup->telno2=$request->telno2;

        $sup->fax=$request->fax;
        $sup->pbox=$request->pbox;

        $sup->Maker=Auth::User()->username;
        $sup->city=$request->city;
        $sup->woreda=$request->woreda;

       $sup->save();
          //

      // Display::create($request->all());
        \Session::flash('flash_message','New Supplier successfully added.');
         return redirect('/suphome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        
//$sup = DB::table('suppliers')->get();

        $sup = new Supplier;

       $sup=Supplier::all();
      //return view('pages.listofsuppliers', ['suppliers' => $sup]);
        //return $uri;
       return view('pages.listofsuppliers')->with('Supplier',$sup);
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
         $sup = Supplier::find($id);

        return view('Edit.supedit')->withSupplier($sup);
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
        $supplier=Supplier::find($id);
        $supplier->update($request->all());
        \Session::flash('flash_message',' Supplier successfully updated.');
         return redirect('/suphome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  
        $supplier=Supplier::find($id);
        $supplier->delete();
         \Session::flash('flash_message_delete',' Supplier successfully deleted.');
         return redirect('/suphome');
    }
}
