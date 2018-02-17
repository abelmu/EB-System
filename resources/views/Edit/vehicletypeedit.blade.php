@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="container">


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">UpdateVehicleTypes</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" 
                    action="/vehicletypes/{{ $vehicletype->id }}">
                     {{ method_field ('PUT')}}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('vehiclecode') ? ' has-error' : '' }}">
                            <label for="vehiclecode" class="col-md-4 control-label">VehicleCode</label>

                            <div class="col-md-6">
                                <input id="vehiclecode" type="text" class="form-control" name="vehiclecode" value="{{ $vehicletype->vehiclecode }}" required autofocus>

                                @if ($errors->has('vehiclecode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vehiclecode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('vehicletype') ? ' has-error' : '' }}">
                            <label for="vehicletype" class="col-md-4 control-label">VehicleType</label>

                            <div class="col-md-6">
                                <input id="vehicletype" type="text" class="form-control" name="vehicletype" value="{{ $vehicletype->vehicletype }}" required autofocus>

                                @if ($errors->has('vehicletype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vehicletype') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                     

                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <a href="/vehicletypeshome" class="btn btn-danger">Cancel</a>
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
