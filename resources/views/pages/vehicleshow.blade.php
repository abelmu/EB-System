
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
     @media print {
    body { font-size: 10pt }
  }
  @media screen {
    body { font-size: 13px }
  }
  @media screen, print {
    body { line-height: 1.2 }
  }
 
</style>
  <script>
 function printpage(el) {
  var restorepage=document.body.innerHTML;
  var printcontent=document.getElementById(el).innerHTML;
 document.body.innerHTML=printcontent;
         window.print();
           document.body.innerHTML=restorepage;
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
<div id="printableTable">

  

          
                    <div class="panel-body text-center">
                    <img class="profile_Image" src="http://localhost:8000/download.jpg">
                     
                        <h2>Vehicle Handover Form</h2>

                          </div> 

              
<div class="container">
 <div class="row">
<div class="col-md-6 text-center>
            <div class="panel panel-default">
                <div class="panel-heading">VehicleInformation</div>
 <table class="table table-sm" id="" border="1" cellpadding="3">

  

    <thead class="thead-inverse">
      <tr>
        <th>Platenumber</th>
        <td>
			{{$Vehicleinfo->platenumber}}

		</td>

       </tr>
       <tr>
       	 <th>VehicleType</th>
       	 <td><span>
			{{$Vehicleinfo->vehicletype}}

		</span></td></tr>
		<tr>
        <th>Motor Number</th>
        <td>
			{{$Vehicleinfo->motornumber}}

		</td>

       </tr>

           <tr>
       	<th>Servicekm</th>
       		<td>
			{{$Vehicleinfo->servicekm}}

		</td>

       </tr>

           <tr>
       	<th>VehicleModel</th>
       		<td>
			{{$Vehicleinfo->vehiclemodel}}

		</td>

       </tr>

           <tr>
       	<th>Chasisnumber</th>
       		<td>
			{{$Vehicleinfo->chasisnumber}}

		</td>

       </tr>

           <tr>
       	<th>Datebought</th>
       		<td>
			{{$Vehicleinfo->datebaought}}

		</td>

       </tr>

        <tr>
        	<th>Supplier</th>
        			<td>
			{{$Vehicleinfo->suppliername}}

		</td>

        </tr>

        <tr>
       	 <th class="span2">Driver</th>
       	 <td>
			{{$Vehicleinfo->drivername}}

		</td>
       </tr>

           <tr>
       	<th>VehiclePrice</th>
       		<td>
			{{$Vehicleinfo->vehicleprice}}

		</td>

       </tr>

       <tr>
       	<th>Available Fuel</th>
       		<td>
			{{$Vehicleinfo->fuelavailableinlittre}}

		</td>

       </tr>

       <tr>
       	<th>VehiclePrice</th>
       		<td>
			{{$Vehicleinfo->vehicleprice}}

		</td>

       </tr>

 

    

       <tr>
       	<th>NumberofDoors</th>
       		<td>
			{{$Vehicleinfo->numofdoors}}

		</td>

       </tr>

       <tr>
       	<th>Fueltype</th>
       		<td>
			{{$Vehicleinfo->fueltype}}

		</td>

       </tr>

       <tr>
       	<th>RadioCassete</th>
       		<td>
			{{$Vehicleinfo->radiocassete}}

		</td>

       </tr>

       <tr>
       	<th>AirConditionare</th>
       		<td>
			{{$Vehicleinfo->airconditionare}}

		</td>

       </tr>
       
       
   
       
        <tr>
        	<th>Createdat</th>
        			<td>
		
			{{$Vehicleinfo->created_at->diffForHumans()}}

	</td>

        </tr>
        <tr>
        	<th>Createdby</th>
        		<td><span>
			{{$Vehicleinfo->Maker}}

		</span></td>
        </tr>
 

     
    </thead>
    </table>

    </div>   
 
  
</div>
</div>



  

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>Comment</b>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>Supplier Name</b>

<span >
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>Receiver Name </b>
</span>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>
Signature</b>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <b>Signature</b>
  

     
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>
Date</b>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <b>Date</b>
     
  </div>

    
@endsection


</html>

