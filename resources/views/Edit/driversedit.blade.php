@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="container">
<a href="/home"  class="btn btn-success">Home</a><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">UpdateVehicleDriver</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/vehicledrivers/{{ $vehicledriver->id }}">
                    {{ method_field ('PUT')}}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('drivercode') ? ' has-error' : '' }}">
                            <label for="drivercode" class="col-md-4 control-label">DriverCode</label>

                            <div class="col-md-6">
                                <input id="drivercode" type="text" class="form-control" name="drivercode" value="{{$vehicledriver->drivercode }}" required autofocus>

                                @if ($errors->has('drivercode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('drivercode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('drivername') ? ' has-error' : '' }}">
                            <label for="drivername" class="col-md-4 control-label">DriverName</label>

                            <div class="col-md-6">
                                <input id="drivername" type="text" class="form-control" name="drivername" value="{{ $vehicledriver->drivername }}" required autofocus>

                                @if ($errors->has('drivername'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('drivername') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('driverdesc') ? ' has-error' : '' }}">
                            <label for="driverdesc" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="driverdesc" type="text" class="form-control" name="driverdesc" value="{{ $vehicledriver->driverdesc }}" required autofocus>

                                @if ($errors->has('driverdesc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('driverdesc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      

                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <a href="/vehicledrivershome" class="btn btn-danger">Cancel</a>
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
