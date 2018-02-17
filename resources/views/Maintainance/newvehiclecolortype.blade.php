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
                <div class="panel-heading">AddNewColorTypes</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/addrole') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('colorcode') ? ' has-error' : '' }}">
                            <label for="colorcode" class="col-md-4 control-label">ColorCode</label>

                            <div class="col-md-6">
                                <input id="colorcode" type="text" class="form-control" name="colorcode" value="{{ old('colorcode') }}" required autofocus>

                                @if ($errors->has('colorcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('colorcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('colortype') ? ' has-error' : '' }}">
                            <label for="vehicletype" class="col-md-4 control-label">ColorType</label>

                            <div class="col-md-6">
                                <input id="colortype" type="text" class="form-control" name="colortype" value="{{ old('colortype') }}" required autofocus>

                                @if ($errors->has('colortype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('colortype') }}</strong>
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
