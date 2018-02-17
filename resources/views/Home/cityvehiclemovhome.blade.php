
@extends('layouts.app')
@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<form action="searchcityvehiclemovements" method="get">
 {{ csrf_field() }}
<div class="form-group">
  <input type="text" name="search" id="search" placeholder="Search by plate number..." class="form-control">  
  <span class="pull-right clearfix"> 
  <button type="submit" class="btn btn-primary">
                                    search
   </button></span>
</div>
 <div class="col-md-8 col-md-offset-4">
                                

                                
                            </div>

</form>

 <table class="table table-bordered">

  

    <thead class="thead-inverse">
      <tr>
        <th>Platenumber</th>
        <th>Drivername</th>
        <th>Service in Km Before Movement</th>
        <th>Service in Km After Movement</th>
        <th>Difference Km</th>
     
        <th>Starting Time</th>
        <th>Ending Time</th>
        <th>Date of Movement</th>
        <th>InitialPosition</th>
        <th>Destination</th>
        <th>Requester Department</th>
        <th>Number of People</th>
   
        <th>#</th>  
        <th>#</th>      
      </tr>
    </thead>
   
	@foreach($Cityvehiclemovement as $vmov)
	
	<tbody>
	<tr>
		<td><span>
			{{$vmov->platenumber}}

		</span></td>
		
		<td><span>
			{{$vmov->drivername}}

		</span></td>

		<td><span>
			{{$vmov->initialkm}}

		</span></td>

		<td><span>
			{{$vmov->finalkm}}

		</span></td>

		<td><span>
			{{$vmov->differencekm}}

		</span></td>
	
			<td><span>
			{{$vmov->startingtime}}

		</span></td>
			<td><span>
			{{$vmov->endtime}}

		</span></td>

		<td><span>
			{{$vmov->movementdate}}

		</span></td>
			<td><span>
			{{$vmov->initialposition}}

		</span></td>
			<td><span>
			{{$vmov->finalposition}}

		</span></td>

			<td><span>
			{{$vmov->reqdepartment}}

		</span></td>

			<td><span>
			{{$vmov->numberofpeople}}

		</span></td>
			

		<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('cityvehiclemovement.edit', $vmov->id) }}" class="btn 
                                                    btn-primary" >Edit</a>
		</span>
		<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('cityvehiclemovement.show', $vmov->id) }}" class="btn 
                                                    btn-info">Detail</a>
		</span>
		</td>
		<td>
		<span class="pull-right clearfix">
		<form action="/cityvehiclemovement/{{ $vmov->id}}" method="POST">
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

{{$Cityvehiclemovement->links()}}

<a href="/newcityvehiclemov"  class="btn btn-success">AddNew</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



@endsection


</html>

