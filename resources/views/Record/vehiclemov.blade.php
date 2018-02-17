
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

<div id="printableTable" class="text-center">
  
 <div class="panel-body text-center">
                    
                    <div>
                    <img class="profile_Image" src="http://localhost:8000/download.jpg">
                     
                        <h2>Daily Vehicle Movement</h2>

                          </div>             
              
<div class="container">
 <div class="row">

            <div class="panel panel-default">
                
 <table class="table table-sm" id="" border="1" cellpadding="3">

  

    <thead class="thead-inverse">
      <tr>
        <th>Vehicle Platenumber</th>
        <td>
			{{$Vehiclemovement->platenumber}}

		</td>

       </tr>
       <tr>
       	 <th>Driver</th>
       	 <td><span>
			{{$Vehiclemovement->drivername}}

		</span></td></tr>
		<tr>
        <th>InitialKm</th>
        <td>
			{{$Vehiclemovement->initialkm}}

		</td>

       </tr>

           <tr>
       	<th>Finalkm</th>
       		<td>
			{{$Vehiclemovement->finalkm}}

		</td>

       </tr>

           <tr>
       	<th>Difference km</th>
       		<td>
			{{$Vehiclemovement->differencekm}}

		</td>

       </tr>

     

              <tr>
        <th>Starting Time</th>
          <td>
      {{$Vehiclemovement->startingtime}}

    </td>

       </tr>
              <tr>
        <th>Ending Time</th>
          <td>
      {{$Vehiclemovement->endtime}}

    </td>

       </tr>

              <tr>
        <th>Initial Position</th>
          <td>
      {{$Vehiclemovement->initialposition}}

    </td>

       </tr>
              <tr>
        <th>Final Position</th>
          <td>
      {{$Vehiclemovement->finalposition}}

    </td>

       </tr>

              <tr>
        <th>Requester Department</th>
          <td>
      {{$Vehiclemovement->reqdepartment}}

    </td>

       </tr>
              <tr>
        <th>Number Of People</th>
          <td>
      {{$Vehiclemovement->numberofpeople}}

    </td>

       </tr>
              <tr>
        <th>Package</th>
          <td>
      {{$Vehiclemovement->package}}

    </td>

       </tr>

     

    

        

          
   
       
        <tr>
        	<th>Createdat</th>
        			<td>
		
			{{$Vehiclemovement->created_at->diffForHumans()}}

	</td>

        </tr>
        <tr>
        	<th>Recorded by</th>
        		<td><span>
			{{$Vehiclemovement->Maker}}

		</span></td>
        </tr>
 

     
    </thead>
    </table>

    </div>   
 
  
</div>
</div>


</div>
  
<br><br>
<center><b>Comment</b><textarea disabled="" rows="5" cols="50" ></textarea><br><br></center>
<span class="pull-right clearfix">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>Driver Name</b><input type="text" disabled name="">
</span>
<br><br>

<span class="pull-right clearfix">
<b>
Signature</b>
<input type="text" disabled name="">
</span>

  
     

<br><br>

<span class="pull-right clearfix">
     <b>Date</b><input type="text" disabled name="">
     </span>
    </div>

     <button onclick="printpage('printableTable')" class="btn btn-primary">
                                    print
                                </button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                          
                                  <a href="/vehiclemovhome" class="btn btn-primary">
                                  Back</a>

 

    
@endsection


</html>

