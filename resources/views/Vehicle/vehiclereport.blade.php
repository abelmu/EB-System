@extends('layouts.app')

@section('content')
@if(Session::has('flash_message_success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_success') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="container">
<a href="/home"  class="btn btn-success">Home</a><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generate Vehicle Movement Report</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/vehiclemovementsreport') }}">
                        {{ csrf_field() }}

                  
                         <div class="form-group{{ $errors->has('platenumber') ? ' has-error' : '' }}">
                            <label for="platenumber" class="col-md-4 control-label">Plate number</label>

                            <div class="col-md-6">
                            <select class="selectpicker" name="platenumber" id="platenumber"> 
                             {{$Vehicleinfo=App\Vehicleinfo::all()}} 
                             <option></option> 

                             <option value="all">All</option> 
                                 @foreach($Vehicleinfo as $vmov)
                            <option value={{$vmov->platenumber}}>{{ $vmov->platenumber}}
                                   </option>
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('platenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('platenumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('sdate') ? ' has-error' : '' }}">
                            <label for="sdate" class="col-md-4 control-label">From</label>

                            <div class="col-md-6">
                                <input id="sdate" type="date" class="form-control" name="sdate" value="{{ old('sdate') }}" required autofocus>

                                @if ($errors->has('sdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sdate') }}</strong>
                                    </span>
                                @endif
                            </div>


                        </div>



                        <div class="form-group{{ $errors->has('udate') ? ' has-error' : '' }}">
                            <label for="udate" class="col-md-4 control-label">Up to</label>

                            <div class="col-md-6">
                                <input id="udate" type="date" class="form-control" name="udate" value="{{ old('udate') }}" required autofocus>

                                @if ($errors->has('udate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('udate') }}</strong>
                                    </span>
                                @endif
                            </div>

                            
                        </div>

                        

                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Generate
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
