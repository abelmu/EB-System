
@extends('layouts.app')
@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<form action="searchvehicletypes" method="get">
 {{ csrf_field() }}
<div class="form-group">
  <input type="text" name="search" id="search" placeholder="Search by vehicletype..." class="form-control">  
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
        <th>VehicleCode</th>
        <th>VehicleType</th>
        <th>Supplier</th>
        <th>Createdat</th>
        <th>Createdby</th>
        <th>#</th>  
        <th>#</th>      
      </tr>
    </thead>
   
	@foreach($Vehicletype as $vtype)
	
	<tbody>
	<tr>
		<td><span>
			{{$vtype->vehiclecode}}

		</span></td>
		
		<td><span>
			{{$vtype->vehicletype}}

		</span></td>

		<td><span>
			{{$vtype->supplier}}

		</span></td>
<td><span>
		
			{{$vtype->created_at->diffForHumans()}}

		</span></td>
		<td><span>
			{{$vtype->Maker}}

		</span></td>

		<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('vehicletypes.edit', $vtype->id) }}" class="btn 
                                                    btn-primary">Edit</a>
		</span>
		</td>
		<td>
		<span class="pull-right clearfix">
		<form action="/vehicletypes/{{ $vtype->id}}" method="POST">
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

{{$Vehicletype->links()}}

<a href="/newvehicletypes"  class="btn btn-success">AddNew</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

@endsection


</html>

