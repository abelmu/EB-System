
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
                <div class="panel-heading"></div>
 <table class="table table-sm" id="" border="1" cellpadding="3">

  

    <thead class="thead-inverse">
      <tr>
        <th>Platenumber</th>
        <td>
			{{$Vehiclehandover->platenumber}}

		</td>

       </tr>
       <tr>
       	 <th>VehicleType</th>
       	 <td><span>
			{{$Vehiclehandover->vehicletype}}

		</span></td></tr>
		<tr>
        <th>Motor Number</th>
        <td>
			{{$Vehiclehandover->motornumber}}

		</td>

       </tr>

           <tr>
       	<th>Servicekm</th>
       		<td>
			{{$Vehiclehandover->serviceinkm}}

		</td>

       </tr>

           <tr>
       	<th>VehicleModel</th>
       		<td>
			{{$Vehiclehandover->vehiclemodel}}

		</td>

       </tr>

           <tr>
       	<th>Chasisnumber</th>
       		<td>
			{{$Vehiclehandover->chasisnumber}}

		</td>

       </tr>

  

        

        <tr>
       	 <th class="span2">Employee Name</th>
       	 <td>
			{{$Vehiclehandover->employeename}}

		</td>
       </tr>

           <tr>
       	<th>Front Bumber</th>
       		<td>
			{{$Vehiclehandover->frontbumber}}

		</td>

       </tr>

       <tr>
       	<th>Rare Bumber</th>
       		<td>
			{{$Vehiclehandover->rarebumber}}

		</td>

       </tr>

       <tr>
       	<th>VehiclePrice</th>
       		<td>
			{{$Vehiclehandover->vehicleprice}}

		</td>

       </tr>

 

    

       <tr>
       	<th>Doors</th>
       		<td>
			{{$Vehiclehandover->door}}

		</td>

       </tr>

       <tr>
       	<th>Left hand side head Lamp</th>
       		<td>
			{{$Vehiclehandover->lhsheadlamp}}

		</td>

       </tr>

             <tr>
        <th>Right hand side head Lamp</th>
          <td>
      {{$Vehiclehandover->rhsheadlamp}}

    </td>

       </tr>


             <tr>
        <th>Left hand side Signal Light</th>
          <td>
      {{$Vehiclehandover->lhssignallight}}

    </td>

       </tr>


               <tr>
        <th>Right hand side Signal Light</th>
          <td>
      {{$Vehiclehandover->rhssignallight}}

    </td>

       </tr>


               <tr>
        <th>Rare Lights</th>
          <td>
      {{$Vehiclehandover->rlights}}

    </td>

       </tr>


               <tr>
        <th>Out door Handler</th>
          <td>
      {{$Vehiclehandover->outdoorhandler}}

    </td>

       </tr>

               <tr>
        <th>Glass</th>
          <td>
      {{$Vehiclehandover->glass}}

    </td>

       </tr>


               <tr>
        <th>Left hand side Outer View Mirror</th>
          <td>
      {{$Vehiclehandover->lhsouterviewmirror}}

    </td>

       </tr>

                  <tr>
        <th>Right hand side Outer View Mirror</th>
          <td>
      {{$Vehiclehandover->rhsouterviewmirror}}

    </td>

       </tr>

                  <tr>
        <th>Rain Wipper</th>
          <td>
      {{$Vehiclehandover->rainwipper}}

    </td>

       </tr>


                  <tr>
        <th>Dip stick</th>
          <td>
      {{$Vehiclehandover->dipstick}}

    </td>

       </tr>

                    <tr>
        <th>Mud guard</th>
          <td>
      {{$Vehiclehandover->mudguard}}

    </td>

       </tr>

                    <tr>
        <th>Rim Type</th>
          <td>
      {{$Vehiclehandover->rimtype}}

    </td>

       </tr>

                    <tr>
        <th>Gage</th>
          <td>
      {{$Vehiclehandover->gage}}

    </td>

       </tr>

                    <tr>
        <th>Hazard Switche</th>
          <td>
      {{$Vehiclehandover->hazardswiche}}

    </td>

       </tr>

                    <tr>
        <th>Light Swiche</th>
          <td>
      {{$Vehiclehandover->lightswich}}

    </td>

       </tr>

                    <tr>
        <th>Tapes</th>
          <td>
      {{$Vehiclehandover->tapes}}

    </td>

       </tr>

                    <tr>
        <th>Belt</th>
          <td>
      {{$Vehiclehandover->belt}}

    </td>

       </tr>

                    <tr>
        <th>Head Rest</th>
          <td>
      {{$Vehiclehandover->headrest}}

    </td>

       </tr>

                    <tr>
        <th>Inside Door Lock</th>
          <td>
      {{$Vehiclehandover->insidedoorlock}}

    </td>

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

