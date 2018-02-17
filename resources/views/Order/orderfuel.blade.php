@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="container">
<a href="/orderfuelhome"  class="btn btn-success">Home</a><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Fuel Consumption Form For Field Work</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="fuelorders">
                        {{ csrf_field() }}



                       <div class="form-group{{ $errors->has('platenumber') ? ' has-error' : '' }}">
                            <label for="platenumber" class="col-md-4 control-label">Platenumber</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="platenumber" id="platenumber">
                                 <option>
                                   </option>
                                 @foreach($Vehicleinfo as $vinfo)
                                  <option value={{$vinfo->platenumber}}>{{$vinfo->platenumber}}
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

                               <div class="form-group{{ $errors->has('fuellevel') ? ' has-error' : '' }}">
                            <label for="fuellevel" class="col-md-4 control-label">Fuel Consumption in Litter</label>

                            <div class="col-md-6">
                            
                                <input id="fuellevel" type="text" class="form-control" name="fuellevel" value="{{ old('fuellevel') }}" required autofocus
                                >

                                @if ($errors->has('fuellevel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fuellevel') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                         <div class="form-group{{ $errors->has('drivername') ? ' has-error' : '' }}">
                            <label for="drivername" class="col-md-4 control-label">Drivername</label>

                            <div class="col-md-6">
                            <select class="selectpicker" name="drivername" id="drivername">   
                                 @foreach($Vehicledriver as $vdriver)
                            <option value={{$vdriver->drivername}}>{{$vdriver->drivername}}
                                   </option>
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('drivername'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('drivername') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                                  <div class="form-group{{ $errors->has('stationname') ? ' has-error' : '' }}">
                            <label for="stationname" class="col-md-4 control-label">Stationname</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="stationname" id="stationname">
                                 
                                 @foreach($Fuelstation as $fsta)
                                  <option value={{$fsta->stationname}}>{{$fsta->stationname}}
                                   </option>
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('stationname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stationname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('fueltype') ? ' has-error' : '' }}">
                            <label for="fueltype" class="col-md-4 control-label">Fueltype</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="fueltype" id="fueltype">
                                 
                                 @foreach($Fueltypeandprice as $ftype)
                                  <option value={{$ftype->fueltype}}>{{$ftype->fueltype}}
                                   </option>
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('fueltype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fueltype') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                                   <div class="form-group{{ $errors->has('orderdate') ? ' has-error' : '' }}">
                            <label for="orderdate" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                            
                                <input id="orderdate" type="date" class="form-control" name="orderdate" value="{{ old('orderdate') }}" required autofocus
                                >

                                @if ($errors->has('orderdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('orderdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    save
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
