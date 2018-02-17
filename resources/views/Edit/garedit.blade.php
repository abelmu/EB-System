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
                <div class="panel-heading">UpdateGarage</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/garages/{{ $garage->id }}">
                    {{ method_field ('PUT')}}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('garagecode') ? ' has-error' : '' }}">
                            <label for="garagecode" class="col-md-4 control-label">GargeCode</label>

                            <div class="col-md-6">
                                <input id="garagecode" type="text" class="form-control" name="garagecode" value="{{ $garage->garagecode }}" required autofocus>

                                @if ($errors->has('garagecode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('garagecode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('garagename') ? ' has-error' : '' }}">
                            <label for="garagename" class="col-md-4 control-label">GargeName</label>

                            <div class="col-md-6">
                                <input id="garagename" type="text" class="form-control" name="garagename" value="{{ $garage->garagename }}" required autofocus>

                                @if ($errors->has('garagename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('garagename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('garagetelno') ? ' has-error' : '' }}">
                            <label for="garagetelno" class="col-md-4 control-label">TelephoneNo</label>

                            <div class="col-md-6">
                                <input id="garagetelno" type="text" class="form-control" name="garagetelno" value="{{ $garage->garagetelno }}" required autofocus>

                                @if ($errors->has('garagetelno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telno1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      
                       
                      

                       

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ $garage->city }}" required autofocus>

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
                                <input id="woreda" type="text" class="form-control" name="woreda" value="{{ $garage->woreda }}" required autofocus>

                                @if ($errors->has('woreda'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('woreda') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <a href="/garagehome" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    save changes
                                </button>

                                
                            </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
