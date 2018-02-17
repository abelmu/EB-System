@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="container">
<a href="/feultypeandpricehome"  class="btn btn-success">Home</a><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">AddNewFuelTypes</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/fueltypes') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fuelcode') ? ' has-error' : '' }}">
                            <label for="fuelcode" class="col-md-4 control-label">FuelCode</label>

                            <div class="col-md-6">
                                <input id="fuelcode" type="text" class="form-control" name="fuelcode" value="{{ old('fuelcode') }}" required autofocus>

                                @if ($errors->has('fuelcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fuelcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('fueltype') ? ' has-error' : '' }}">
                            <label for="fueltype" class="col-md-4 control-label">FuelType</label>

                            <div class="col-md-6">
                                <input id="fueltype" type="text" class="form-control" name="fueltype" value="{{ old('fueltype') }}" required autofocus>

                                @if ($errors->has('fueltype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fueltype') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fuelprice') ? ' has-error' : '' }}">
                            <label for="fuelprice" class="col-md-4 control-label">Fuel Price</label>

                            <div class="col-md-6">
                                <input id="fuelprice" type="text" class="form-control" name="fuelprice" value="{{ old('fuelprice') }}" required autofocus>

                                @if ($errors->has('fuelprice'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fuelprice') }}</strong>
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
