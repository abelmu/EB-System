
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
<form action="searchcityfuelorder" method="get">
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
        <th>Driver Name</th>
        <th>Statio nname</th>
        <th>FuelType</th>  
        <th>fuel Consumption in litter</th>  
        <th>Abysinia Card Used</th>  
        <th>Orderdate</th>  
        <th>Created at</th>   
        <th>Created by</th>  
        <th>#</th>  
        <th>#</th>      
      </tr>
    </thead>
   
	@foreach($Cityfuelorder as $forder)
	
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
			{{$forder->fuelconsumptioninlitter}}

		</span></td>
			<td><span>
			{{$forder->abysiniacard}}

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

		 <a href="{{ route('cityfuelorders.edit', $forder->id) }}" class="btn 
                                                    btn-primary">Edit</a>
		</span>
		</td>
		<td>
		<span class="pull-right clearfix">
		<form action="/cityfuelorders/{{ $forder->id}}" method="POST">
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

{{$Cityfuelorder->links()}}

<a href="orderfuelcity"  class="btn btn-success">OrderNewFuel</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

@endsection


</html>

