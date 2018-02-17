
@extends('layouts.app')
<html>
<head>






</head>
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
<form action="search" method="get">
 {{ csrf_field() }}
<div class="form-group">
  <input type="text" name="search" id="search" placeholder="Search by supplier name..." class="form-control">  
  <span class="pull-right clearfix"> 
  <button type="submit" class="btn btn-primary">
                                    search
   </button></span>
</div>
 <div class="col-md-8 col-md-offset-4">
                                

                                
                            </div>

</form>
 

<center><h3><B>PREVIOUSLY AVAILABLE SUPPLIERS</B></h3></center>
 <table class="table table-bordered">

  

    <thead class="thead-inverse">
      <tr>

        <th>SupplierCode</th>
        <th>SupplierName</th>
        <th>Telephone(No1)</th>
        <th>Telephone(No2)</th>
        <th>Fax No</th>        
        <th>POBOX</th>  
        <th>Created at</th>   
        <th>Created by</th>  
        <th>#</th>  
        <th>#</th>      
      </tr>
    </thead>
	@foreach($Supplier as $sup)
	
	<tbody>
	<tr>
	
		<td><span>
			{{$sup->suppliercode}}

		</span></td>
		
		<td><span>
			{{$sup->suppliername}}

		</span></td>

		<td><span>
			{{$sup->telno1}}

		</span></td>

		<td><span>
			{{$sup->telno2}}

		</span></td>
		<td><span>
			{{$sup->fax}}

		</span></td>
		<td><span>
			{{$sup->pbox}}

		</span></td>
		
		<td><span>
			{{$sup->created_at->diffForHumans()}}

		</span></td>
		<td><span>
			{{$sup->Maker}}

		</span></td>

		<td>
		<span class="pull-right clearfix">

		 <a href="{{ route('suppliers.edit', $sup->id) }}" class="btn 
                                                    btn-primary">Edit</a>
		</span>
		</td>
		<td>
		<span class="pull-right clearfix">
		<form action="/suppliers/{{ $sup->id}}" method="POST">
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

{{$Supplier->links()}}

<a href="newsuppliers"  class="btn btn-success">AddNewSupplier</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

@endsection


</html>

