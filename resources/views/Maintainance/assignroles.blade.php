@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="container">
<a href="/vehicletypeshome"  class="btn btn-success">Home</a><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">VehicleGeneralInformation</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/vehicleinfos') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('platenumber') ? ' has-error' : '' }}">
                            <label for="platenumber" class="col-md-4 control-label">Platenumber</label>

                            <div class="col-md-6">
                                <input id="platenumber" type="text" class="form-control" name="platenumber" value="{{ old('platenumber') }}" required autofocus>

                                @if ($errors->has('platenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('platenumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                       <div class="form-group{{ $errors->has('vehicletype') ? ' has-error' : '' }}">
                            <label for="vehicletype" class="col-md-4 control-label">vehicletype</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="vehicletype" id="vehicletype">
                                 @foreach($Vehicletype as $vtype)
                                  <option value={{$vtype->vehicletype}}>{{$vtype->vehicletype}}
                                   </option>
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('vehicletype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vehicletype') }}</strong>
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

                     



                        <div class="form-group{{ $errors->has('enginesize') ? ' has-error' : '' }}">
                            <label for="enginesize" class="col-md-4 control-label">Enginesize</label>

                            <div class="col-md-6">
                                <input id="enginesize" type="text" class="form-control" name="enginesize" value="{{ old('enginesize') }}" required autofocus>

                                @if ($errors->has('enginesize'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('enginesize') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('servicekm') ? ' has-error' : '' }}">
                            <label for="servicekm" class="col-md-4 control-label">Servicekm</label>

                            <div class="col-md-6">
                                <input id="servicekm" type="text" class="form-control" name="servicekm" value="{{ old('servicekm') }}" required autofocus>

                                @if ($errors->has('servicekm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('servicekm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                     

                          <div class="form-group{{ $errors->has('vehiclemodel') ? ' has-error' : '' }}">
                            <label for="vehiclemodel" class="col-md-4 control-label">Vehiclemodel</label>

                            <div class="col-md-6">
                                <input id="vehiclemodel" type="text" class="form-control" name="vehiclemodel" value="{{ old('vehiclemodel') }}" required autofocus>

                                @if ($errors->has('vehiclemodel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vehiclemodel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('datebought') ? ' has-error' : '' }}">
                            <label for="datebought" class="col-md-4 control-label">Datebought</label>

                            <div class="col-md-6">
                                <input id="datebought" type="date" class="form-control" name="datebought" value="{{ old('datebought') }}" required autofocus>

                                @if ($errors->has('datebought'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datebought') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                                <div class="form-group{{ $errors->has('supplier') ? ' has-error' : '' }}">
                            <label for="supplier" class="col-md-4 control-label">Supplier</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="supplier" id="supplier">
                                 
                                 @foreach($Supplier as $sup)
                                  <option value={{$sup->suppliername}}>{{$sup->suppliername}}
                                   </option>
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('supplier'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('supplier') }}</strong>
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
