
@extends('layouts.app')
@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif

<form action="searchfuelstation" method="get">
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
<center><h3><B>PREVIOUSLY AVAILABLE FUEL STATIONS</B></h3></center>
 <table class="table table-bordered">

  

    <thead class="thead-inverse">
      <tr>
        <th>StationCode</th>
        <th>StationName</th>
        <th>StationType</th>
        <th>Createdat</th>
        <th>Createdby</th>
        <th>#</th>  
        <th>#</th>      
      </tr>
    </thead>
   
	@foreach($Fuelstation as $fsta)
	
	<tbody>
	<tr>
		<td><span>
			{{$fsta->stationcode}}

		</span></td>
		
		<td><span>
			{{$fsta->stationname}}

		</span></td>

		<td><span>
			{{$fsta->stationtype}}

		</span></td>
<td><span>
		
			{{$fsta->created_at->diffForHumans()}}

		</span></td>
		<td><span>
			{{$fsta->Maker}}

		</span></td>
<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('fuelstations.edit', $fsta->id) }}" class="btn 
                                                    btn-primary">Edit</a>
		</span>
		</td>
		<td>
		<span class="pull-right clearfix">
		<form action="/fuelstations/{{ $fsta->id}}" method="POST">
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

{{$Fuelstation->links()}}

<a href="newfuelstation"  class="btn btn-success">AddNewStation</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

@endsection


</html>

