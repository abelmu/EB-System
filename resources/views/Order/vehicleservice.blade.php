
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

<div id="printableTable" >
  
 <div class="panel-body text-center">
                    
                    <div>
                    <img class="profile_Image" src="http://localhost:8000/download.jpg">
                     
                        <h2>Vehicle Service Request Form</h2>

                          </div>             
              
<div class="container">
 <div class="row">

            <div class="panel panel-default">
                <div class="panel-heading"></div>
 <table class="table table-sm" id="" border="1" cellpadding="3">

  

    <thead class="thead-inverse">
      <tr>
        <th>Ordernumber</th>
        <td>
			{{$Vehicleservice->ordernumber}}

		</td>

       </tr>

          <tr>
        <th>Platenumber</th>
        <td>
			{{$Vehicleservice->platenumber}}

		</td>

       </tr>
       <tr>
       	 <th>Garagename</th>
       	 <td><span>
			{{$Vehicleservice->garagename}}

		</span></td></tr>
  


		<tr>
        <th>Services made</th>
        <td>
         @foreach(explode(',', $Vehicleservice->servicesmade) as $string)
            {{ $string }}
            <br>
         @endforeach

			

		</td>

      </tr>
           <tr>
         <th>Cost</th>
         <td><span>
      {{$Vehicleservice->cost}}

    </span></td></tr>

         <tr>
         <th>Service Type</th>
         <td><span>
      {{$Vehicleservice->servicetype}}

    </span></td></tr>

         <tr>
         <th>Service in Km</th>
         <td><span>
      {{$Vehicleservice->serviceinkm}}

    </span></td></tr>

         <tr>
         <th>Cost Covered by</th>
         <td><span>
      {{$Vehicleservice->coveredby}}

    </span></td></tr>
       
        <tr>
        	<th>Createdat</th>
        			<td>
		
			{{$Vehicleservice->created_at->diffForHumans()}}

	</td>

        </tr>
        <tr>
        	<th>Createdby</th>
        		<td><span>
			{{$Vehicleservice->Maker}}

		</span></td>
        </tr>
 

     
    </thead>
    </table>

    </div>   
 
  
</div>
</div>


</div>
  

<center><b>Comment</b><textarea disabled="" rows="5" cols="50" ></textarea><br><br></center>
<span class="pull-left clearfix">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>Requester Name</b><input type="text" disabled name="">
</span>
<span class="pull-right clearfix">
<b>Receiver Name</b><input type="text" disabled name="">
</span>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>
Signature</b>
<input type="text" disabled name="">

  <span class="pull-right clearfix">
     <b>Signature</b><input type="text" disabled name="">
     </span>

     
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>
Date</b>
<input type="text" disabled name="">

<span class="pull-right clearfix">
     <b>Date</b><input type="text" disabled name="">
     </span>
     </div>

    
@endsection


</html>

