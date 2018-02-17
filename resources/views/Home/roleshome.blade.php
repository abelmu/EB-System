
@extends('layouts.app')
@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="form-group">
  <input type="text" class="form-control" id="query"
  placeholder="Search...">
</div>
<center><h3><B>PREVIOUSLY AVAILABLE ROLES</B></h3></center>
 <table class="table table-bordered">

  

    <thead class="thead-inverse">

      <tr>
        <th>Rolename</th>
         <th>Maintain Suppliers</th>
         <th>Maintain Garages</th>
         <th>Maintain fuelstations</th>
         <th>Maintain fuelprices</th>
         <th>Maintain vehicletypes</th>
         <th>Maintain newvehicleinfos</th>
         <th>Maintain userregisters</th>
         <th>Maintain rolesdef</th>
         <th>Maintain fuelorders</th>
         <th>Maintain vehicle sevices</th>
         <th>Maintain reports</th>
         <th>Maintain Vehicle Movements</th>
         
          <th>Craeted at</th>
           <th>Created by</th>
        <th>#</th>  
        <th>#</th>      
      </tr>
    </thead>
   
	@foreach($Role as $roles)
	
	<tbody>
	<tr>
		<td><span>
			
{{$roles->rolename}}

		</span></td>
			

		<td><span>

{{$roles->suppliers}}
   					

		</span></td>
		
			<td><span>

{{$roles->garages}}
   					

		</span></td>

			<td><span>

{{$roles->fuelstations}}
   					

		</span></td>
			<td><span>

{{$roles->fuelprices}}
   					

		</span></td>
			<td><span>

{{$roles->vehicletypes}}
   					

		</span></td>
			<td><span>

{{$roles->newvehicleinfos}}
   					

		</span></td>
			<td><span>

{{$roles->userregisters}}
   					

		</span></td>
			<td><span>

{{$roles->rolesdef}}
   					

		</span></td>
			<td><span>

{{$roles->fuelorders}}
   					

		</span></td>
			<td><span>

{{$roles->vehiclesevices}}
   					

		</span></td>
			<td><span>

{{$roles->reports}}
   					

		</span></td>

					<td><span>

{{$roles->vehiclemovements}}
   					

		</span></td>
		
<td><span>
		
			{{$roles->created_at->diffForHumans()}}

		</span></td>
		<td><span>
			{{$roles->Maker}}

		</span></td>

		<td>
		<span class="pull-right clearfix">

		 <a href="{{route('roles.edit', $roles->id) }}" class="btn 
                                                    btn-primary">Edit</a>
		</span>
		</td>
		<td>
		<span class="pull-right clearfix">
		<form action="/vehicledrivers/{{ $roles->id}}" method="POST">
                    {{ method_field ('DELETE')}}
                        {{ csrf_field() }}
		
		

		
                                                   
		
		</td>
		</form>
		</span>
		</tr>
		</tbody>
			
	

@endforeach
 
	

  </table>

{{$Role->links()}}

<a href="assignrole"  class="btn btn-success">AddNewRole</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

@endsection


</html>

