@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="container">
<a href="/garagehome"  class="btn btn-success">Home</a><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">AddNewGarage</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/garages') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('garagecode') ? ' has-error' : '' }}">
                            <label for="garagecode" class="col-md-4 control-label">GarageCode</label>

                            <div class="col-md-6">
                                <input id="garagecode" type="text" class="form-control" name="garagecode" value="{{ old('garagecode') }}" required autofocus>

                                @if ($errors->has('garagecode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('garagecode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('garagename') ? ' has-error' : '' }}">
                            <label for="garagename" class="col-md-4 control-label">GarageName</label>

                            <div class="col-md-6">
                                <input id="garagename" type="text" class="form-control" name="garagename" value="{{ old('garagename') }}" required autofocus>

                                @if ($errors->has('suppliername'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('garagename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('garagetelno') ? ' has-error' : '' }}">
                            <label for="garagetelno" class="col-md-4 control-label">TelephoneNo</label>

                            <div class="col-md-6">
                                <input id="garagetelno" type="number" class="form-control" name="garagetelno" value="{{ old('garagetelno') }}" required autofocus>

                                @if ($errors->has('garagetelno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('garagetelno') }}</strong>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
