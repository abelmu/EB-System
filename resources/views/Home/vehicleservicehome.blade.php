
@extends('layouts.app')
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
<div class="form-group">
  <input type="text" class="form-control" id="query"
  placeholder="Search...">
</div>
<center><h3><B>PREVIOUSLY Vehicle Services Made</B></h3></center>
 <table class="table table-bordered">
    <thead class="thead-inverse">
      <tr>
   
        <th>Platenumber</th>
        <th>Driver name</th>
        <th>GarageName</th>
        <th>Servicesmade</th> 
        <th>From date</th> 
        <th>Up to date</th> 
        <th>Cost</th>
        <th>Service in Km</th>
        <th>Service Type</th>
        <th>Covered By</th>
        <th>Created at</th>   
        <th>Created by</th>  
       
        <th>#</th>  
        <th>#</th>      
      </tr>
    </thead>  
@foreach($Vehicleservice as $vservice)
	<tbody>
		<tr>
		
		<td><span>
			{{$vservice->platenumber}}

		</span></td>


		<td><span>
			{{$vservice->drivername}}

		</span></td>





		<td><span>
			{{$vservice->garagename}}

		</span></td>

		<td><span>
			 @foreach(explode(',', $vservice->servicesmade) as $string)
        		->  {{ $string }}
        		<br>
   			 @endforeach

		</span></td>

		<td><span>
			{{$vservice->fromdate}}

		</span></td>


		<td><span>
			{{$vservice->uptodate}}

		</span></td>


		<td><span>
			{{$vservice->cost}}

		</span></td>
		<td><span>
			{{$vservice->serviceinkm}}

		</span></td>

		<td><span>
			{{$vservice->servicetype}}

		</span></td>
		<td><span>
			{{$vservice->coveredby}}

		</span></td>

		<td><span>
			{{$vservice->created_at->diffForHumans()}}

		</span></td>

		<td><span>
			{{$vservice->Maker}}

		</span></td>
	

		<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('vehicleservice.edit', $vservice->id) }}" class="btn 
                                                    btn-primary">Edit</a>
		                                            
		</span>
		</td>

			<td>
		<span class="pull-right clearfix">

		 
		 <a href="{{ route('vehicleservice.show', $vservice->id) }}" class="btn 
                                                    btn-info">Detail</a>                                               
		</span>
		</td>
		<td>
		<span class="pull-right clearfix">
		<form action="/vehicleservice/{{ $vservice->id}}" method="POST">
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

{{$Vehicleservice->links()}}

<a href="newvehicleservice"  class="btn btn-success">OrderNewVehicleService</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



@endsection
		


</html>

