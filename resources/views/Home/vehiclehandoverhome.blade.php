
@extends('layouts.app')
@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<form action="searchvehiclehandover" method="get">
 {{ csrf_field() }}
<div class="form-group">
  <input type="text" name="search" id="search" placeholder="Search by vehicle plate number..." class="form-control">  
  <span class="pull-right clearfix"> 
  <button type="submit" class="btn btn-primary">
                                    search
   </button></span>
</div>
 <div class="col-md-8 col-md-offset-4">
                                

                                
                            </div>

</form>
<center><h3><B></B></h3></center>
 <table class="table table-bordered">


                     
    <thead class="thead-inverse">
      <tr>
     
        <th>PlateNumber</th>
        <th>VehicleType</th>
        <th>Employee name</th>
        <th>Vehicle Model</th>
      
        <th>Createdat</th>
        <th>Createdby</th>
        <th>#</th>  
        <th>#</th>      
      </tr>
    </thead>
   
	@foreach($Vehiclehandover as $vhandover)
	
	<tbody>
	<tr>
		<td><span>
			{{$vhandover->platenumber}}

		</span></td>
		
		<td><span>
			{{$vhandover->vehicletype}}

		</span></td>

		<td><span>
			{{$vhandover->employeename}}

		</span></td>
		<td><span>
			{{$vhandover->vehiclemodel}}

		</span></td>

		
<td><span>
		
			{{$vhandover->created_at->diffForHumans()}}

		</span></td>
		<td><span>
			{{$vhandover->Maker}}

		</span></td>

		<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('vehiclehandovers.edit', $vhandover->id) }}" class="btn 
                                                    btn-primary">Edit</a>
		</span>
		</td>
		<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('vehiclehandovers.show', $vhandover->id) }}" class="btn 
                                                    btn-default">Detail</a>
		</span>
		</td>
		


		<td>
		<span class="pull-right clearfix">
		<form action="/vehiclehandovers/{{ $vhandover->id}}" method="POST">
                    {{ method_field ('DELETE')}}
                        {{ csrf_field() }}
		
		

		<button class="btn btn-danger" disabled="" >Delete</button>		 
                                                   
		
		</td>
		</form>
		</span>
		</tr>
		</tbody>
			
	

@endforeach
 
	

  </table>

{{$Vehiclehandover->links()}}

<a href="/newvehiclehandover"  class="btn btn-success">AddNew</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

@endsection


</html>

