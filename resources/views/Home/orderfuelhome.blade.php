
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
<form action="searchfuelorder" method="get">
 {{ csrf_field() }}
<div class="form-group">
  <input type="text" name="search" id="search" placeholder="Search by platenumber..." class="form-control">  
  <span class="pull-right clearfix"> 
  <button type="submit" class="btn btn-primary">
                                    search
   </button></span>
</div>

 </form>

<center><h3><B>PREVIOUSLY AVAILABLE ORDERS</B></h3></center>
 <table class="table table-bordered">

  

    <thead class="thead-inverse">
      <tr> 
        <th>Platenumber</th>
        <th>DriverName</th>
        <th>Stationname</th>
        <th>FuelType</th>  
        <th>fuellevel in litter</th>  
        <th>Price</th>  
        <th>Orderdate</th>  
        <th>Created at</th>   
        <th>Created by</th>  
        <th>#</th>  
        <th>#</th>      
      </tr>
    </thead>
   
	@foreach($Fuelorder as $forder)
	
	<tbody>
	<tr>
		
		
		<td><span>
			{{$forder->platenumber}}

		</span></td>

		<td><span>
			{{$forder->drivername}}

		</span></td>

		<td><span>
			{{$forder->fuelstation}}

		</span></td>
		<td><span>
			{{$forder->fueltype}}

		</span></td>
	

		<td><span>
			{{$forder->fuellevelinlittre}}

		</span></td>
			<td><span>
			{{$forder->cost}}

		</span></td>
			<td><span>
			{{$forder->orderdate}}

		</span></td>
		
		<td><span>
			{{$forder->created_at->diffForHumans()}}

		</span></td>
		<td><span>
			{{$forder->Maker}}

		</span></td>

		<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('fuelorders.edit', $forder->id) }}" class="btn 
                                                    btn-primary">Edit</a>
		</span>
		</td>
		<td>
		<span class="pull-right clearfix">
		<form action="/fuelorders/{{ $forder->id}}" method="POST">
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

{{$Fuelorder->links()}}

<a href="ordernewfuel"  class="btn btn-success">OrderNewFuel</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

@endsection


</html>

