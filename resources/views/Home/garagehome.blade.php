
@extends('layouts.app')
@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<form action="searchgarage" method="get">
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
<center><h3><B>PREVIOUSLY AVAILABLE GARAGES</B></h3></center>
 <table class="table table-bordered">

  

    <thead class="thead-inverse">
      <tr>
      <th>GarageId</th>
        <th>GarageCode</th>
        <th>GarageName</th>
        <th>TelephoneNo</th>
        <th>Createdat</th>
        <th>Createdby</th>
        <th>#</th>  
        <th>#</th>      
      </tr>
    </thead>
   
	@foreach($Garage as $gar)
	
	<tbody>
	<tr>
		<td><span>
			{{$gar->id}}

		</span></td>
		<td><span>
			{{$gar->garagecode}}

		</span></td>
		
		<td><span>
			{{$gar->garagename}}

		</span></td>

		<td><span>
			{{$gar->garagetelno}}

		</span></td>
<td><span>
		
			{{$gar->created_at->diffForHumans()}}

		</span></td>
		<td><span>
			{{$gar->Maker}}

		</span></td>

		<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('garages.edit', $gar->id) }}" class="btn 
                                                    btn-primary">Edit</a>
		</span>
		</td>
		<td>
		<span class="pull-right clearfix">
		<form action="/garages/{{ $gar->id}}" method="POST">
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

{{$Garage->links()}}

<a href="newgarage"  class="btn btn-success">AddNewGarage</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

@endsection


</html>

