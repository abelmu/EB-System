
@extends('layouts.app')
@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<form action="searchvehicle" method="get">
 {{ csrf_field() }}
<div class="form-group">
  <input type="text" name="search" id="search" placeholder="Search by vehicle type..." class="form-control">  
  <span class="pull-right clearfix"> 
  <button type="submit" class="btn btn-primary">
                                    search
   </button></span>
</div>
 <div class="col-md-8 col-md-offset-4">
                                

                                
                            </div>

</form>
<center><h3><B>PREVIOUSLY AVAILABLE VEHICLES</B></h3></center>
 <table class="table table-bordered">


                     
    <thead class="thead-inverse">
      <tr>
     
        <th>PlateNumber</th>
        <th>VehicleType</th>
        <th>Driver</th>
        <th>VehicleModel</th>
        <th>Supplier</th>
        <th>Createdat</th>
        <th>Createdby</th>
        <th>#</th>  
        <th>#</th>      
      </tr>
    </thead>
   
	@foreach($Vehicleinfo as $vinfo)
	
	<tbody>
	<tr>
		<td><span>
			{{$vinfo->platenumber}}

		</span></td>
		
		<td><span>
			{{$vinfo->vehicletype}}

		</span></td>

		<td><span>
			{{$vinfo->drivername}}

		</span></td>
		<td><span>
			{{$vinfo->vehiclemodel}}

		</span></td>

		<td><span>
			{{$vinfo->suppliername}}

		</span></td>
<td><span>
		
			{{$vinfo->created_at->diffForHumans()}}

		</span></td>
		<td><span>
			{{$vinfo->Maker}}

		</span></td>

		<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('vehicleinfos.edit', $vinfo->id) }}" class="btn 
                                                    btn-primary">Edit</a>
		</span>
		</td>
		<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('vehicleinfos.show', $vinfo->id) }}" class="btn 
                                                    btn-default">Detail</a>
		</span>
		</td>
		


		<td>
		<span class="pull-right clearfix">
		<form action="/vehicleinfos/{{ $vinfo->id}}" method="POST">
                    {{ method_field ('DELETE')}}
                        {{ csrf_field() }}
		
		

		<button class="btn btn-danger" >Close</button>		 
                                                   
		
		</td>
		</form>
		</span>
		</tr>
		</tbody>
			
	

@endforeach
 
	

  </table>

{{$Vehicleinfo->links()}}

<a href="/newvehicleinfo"  class="btn btn-success">AddNew</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

@endsection


</html>

