
@extends('layouts.app')
<html>
<head>

<style type="text/css">
     .profile_Image{
        max-width: 1000px;
        border: 5px solid #fff;
        border-radius:10%;
        box-shadow: 0 0px 0px ;
    }
</style>
  <script>
 function print(el) {
  var restorepage=document.body.innerHTML;
  var printcontent=document.getElementById(el).innerHTML;
  document.body.innerHTML=printcontent;
         window.print();
           //document.body.innerHTML=restorepage;
       }
</script>

</head>
@section('content')

@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
@if(session('flash_message')==true)
{{session()->forget('flash_message')}}
@endif




<div id="printableTable" >
 
<div class="panel-body text-center">
   <div class="col-md-8 col-md-offset-2">
		<div>
                    <img class="profile_Image" src="http://localhost:8000/download.jpg">
                     
                        <h2>List Of Vehicle Suppliers</h2>

                          </div>  
 <table class="table table-sm" id="" border="1" cellpadding="3">

  

    <thead class="thead-inverse">
      <tr>

        <th>SupplierCode</th>
        <th>SupplierName</th>
        <th>Telephone(No1)</th>
        <th>Telephone(No2)</th>
        <th>Fax No</th>        
        <th>POBOX</th>  
        <th>Created at</th>   
        <th>Created by</th>  
          
      </tr>
    </thead>
	@foreach($Supplier as $sup)
	
	<tbody>
	<tr>
	
		<td><span>
			{{$sup->suppliercode}}

		</span></td>
		
		<td><span>
			{{$sup->suppliername}}

		</span></td>

		<td><span>
			{{$sup->telno1}}

		</span></td>

		<td><span>
			{{$sup->telno2}}

		</span></td>
		<td><span>
			{{$sup->fax}}

		</span></td>
		<td><span>
			{{$sup->pbox}}

		</span></td>
		
		<td><span>
			{{$sup->created_at->diffForHumans()}}

		</span></td>
		<td><span>
			{{$sup->Maker}}

		</span></td>

		
		</span>
		</tr>
		</tbody>
			
	

@endforeach
 
	

  </table>
</div>
</div>
</div>


@endsection


</html>

