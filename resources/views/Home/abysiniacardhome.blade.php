
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
<center><h3><B>PREVIOUSLY AVAILABLE RECORDS</B></h3></center>
 <table class="table table-bordered">

  

    <thead class="thead-inverse">
      <tr>
        <th>Platenumber</th>
        <th>Date</th>
        <th>AbysiniaBirr</th>
       <th>Created at</th>
          <th>Updated at</th>
        <th>Createdby</th>

        <th>#</th>  
        <th>#</th>      
      </tr>
    </thead>
   
	@foreach($Abysiniacard as $acard)
	
	<tbody>
	<tr>
		<td><span>
			{{$acard->platenumber}}

		</span></td>
		
		<td><span>
			{{$acard->orderdate}}

		</span></td>

		<td><span>
			{{$acard->abysiniacard}}

		</span></td>
<td><span>
		
			{{$acard->created_at->diffForHumans()}}

		</span></td>

		<td><span>
		
			{{$acard->updated_at->diffForHumans()}}

		</span></td>
		<td><span>
			{{$acard->Maker}}

		</span></td>
<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('abysiniacards.edit', $acard->id) }}" class="btn 
                                                    btn-primary">Edit</a>
		</span>
		</td>
		<td>
		<span class="pull-right clearfix">
		<form action="/abysiniacards/{{ $acard->id}}" method="POST">
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

{{$Abysiniacard->links()}}

<a href="newabysiniacard"  class="btn btn-success">AddNew</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

@endsection


</html>

