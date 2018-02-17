
@extends('layouts.app')
@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<form action="searchfuelprice" method="get">
 {{ csrf_field() }}
<div class="form-group">
  <input type="text" name="search" id="search" placeholder="Search by garage name..." class="form-control">  
  <span class="pull-right clearfix"> 
  <button type="submit" class="btn btn-primary">
                                    search
   </button></span>
</div>
 <div class="col-md-8 col-md-offset-4">
                                

                                
                            </div>

</form>
<center><h3><B>PREVIOUSLY AVAILABLE FUEL TYPES</B></h3></center>
 <table class="table table-bordered">

  

    <thead class="thead-inverse">
      <tr>
        <th>FuelCode</th>
        <th>FuelType</th>
        <th>Price</th>
        <th>Createdat</th>
        <th>Createdby</th>
        <th>#</th>  
        <th>#</th>      
      </tr>
    </thead>
   
	@foreach($Fueltypeandprice as $fuel)
	
	<tbody>
	<tr>
		<td><span>
			{{$fuel->fuelcode}}

		</span></td>
		
		<td><span>
			{{$fuel->fueltype}}

		</span></td>

		<td><span>
			{{$fuel->fuelprice}}

		</span></td>
<td><span>
		
			{{$fuel->created_at->diffForHumans()}}

		</span></td>
		<td><span>
			{{$fuel->Maker}}

		</span></td>

		<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('fueltypes.edit', $fuel->id) }}" class="btn 
                                                    btn-primary">Edit</a>
		</span>
		</td>
		<td>
		<span class="pull-right clearfix">
		<form action="/fueltypes/{{ $fuel->id}}" method="POST">
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

{{$Fueltypeandprice->links()}}

<a href="newfuelprice"  class="btn btn-success">AddNew</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

@endsection


</html>

