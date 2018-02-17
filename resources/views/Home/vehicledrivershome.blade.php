
@extends('layouts.app')
@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<form action="searchdriver" method="get">
 {{ csrf_field() }}
<div class="form-group">
  <input type="text" name="search" id="search" placeholder="Search by driver name..." class="form-control">  
  <span class="pull-right clearfix"> 
  <button type="submit" class="btn btn-primary">
                                    search
   </button></span>
</div>


</form>
<center><h3><B>PREVIOUSLY AVAILABLE VEHICLE DRIVERS</B></h3></center>
 <table class="table table-bordered">

  

    <thead class="thead-inverse">
      <tr>
        <th>DriverId</th>
        <th>DriverName</th>
        <th>Createdat</th>
        <th>Createdby</th>
        <th>#</th>  
        <th>#</th>      
      </tr>
    </thead>
   
	@foreach($Vehicledriver as $vdriver)
	
	<tbody>
	<tr>
		<td><span>
			{{$vdriver->drivercode}}

		</span></td>
		
		<td><span>
			{{$vdriver->drivername}}

		</span></td>
<td><span>
		
			{{$vdriver->created_at->diffForHumans()}}

		</span></td>
		<td><span>
			{{$vdriver->Maker}}

		</span></td>

		<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('vehicledrivers.edit', $vdriver->id) }}" class="btn 
                                                    btn-primary">Edit</a>
		</span>
		</td>
		<td>
		<span class="pull-right clearfix">
		<form action="/vehicledrivers/{{ $vdriver->id}}" method="POST">
                    {{ method_field ('DELETE')}}
                        {{ csrf_field() }}
		
		

		<button class="btn btn-danger" >Delete</button>		 
                                                   
		
		</td>
		</form>
		</span>
		</tr>
		</tbody>
			
	

@endforeach
 
	

  </table>

{{$Vehicledriver->links()}}

<a href="newvehicledrivers"  class="btn btn-success">AddNew</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

@endsection


</html>

