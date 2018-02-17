@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="container">
<a href="/FuelStation"  class="btn btn-success">Home</a><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">AddNewFuelstation</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/fuelstations') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('stationcode') ? ' has-error' : '' }}">
                            <label for="stationcode" class="col-md-4 control-label">stationcode</label>

                            <div class="col-md-6">
                                <input id="stationcode" type="text" class="form-control" name="stationcode" value="{{ old('stationcode') }}" required autofocus>

                                @if ($errors->has('garagecode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stationcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('stationname') ? ' has-error' : '' }}">
                            <label for="stationname" class="col-md-4 control-label">StationName</label>

                            <div class="col-md-6">
                                <input id="stationname" type="text" class="form-control" name="stationname" value="{{ old('stationname') }}" required autofocus>

                                @if ($errors->has('stationname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stationname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('stationtype') ? ' has-error' : '' }}">
                            <label for="stationtype" class="col-md-4 control-label">StationType</label>

                            <div class="col-md-6">
                                <input id="stationtype" type="text" class="form-control" name="stationtype" value="{{ old('stationtype') }}" required autofocus>

                                @if ($errors->has('stationtype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stationtype') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                              <div class="form-group{{ $errors->has('woreda') ? ' has-error' : '' }}">
                            <label for="woreda" class="col-md-4 control-label">woreda</label>

                            <div class="col-md-6">
                                <input id="woreda" type="text" class="form-control" name="woreda" value="{{ old('woreda') }}" required autofocus>

                                @if ($errors->has('woreda'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('woreda') }}</strong>
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
                        </div>

                        

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
