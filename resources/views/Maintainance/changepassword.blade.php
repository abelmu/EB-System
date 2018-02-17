@extends('layouts.app')

@section('content')
@if(Session::has('flash_message_success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_success') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="container">


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Changepassword</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/changepword') }}">
                        {{ csrf_field()}}
                      

                  
                <div class="form-group{{ $errors->has('oldpassword') ? ' has-error' : '' }}">
                            <label for="oldpassword" class="col-md-4 control-label">Oldpassword</label>

                            <div class="col-md-6">
                                <input id="oldpassword" type="password" class="form-control" name="oldpassword" value="{{ old('oldpassword') }}" required autofocus>

                                @if ($errors->has('oldpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('oldpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('newpassword') ? ' has-error' : '' }}">
                            <label for="newpassword" class="col-md-4 control-label">NewPassword</label>

                            <div class="col-md-6">
                                <input id="newpassword" type="password" class="form-control" name="newpassword" value="{{ old('newpassword') }}" required autofocus>

                                @if ($errors->has('newpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('newpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                              <div class="form-group{{ $errors->has('conpassword') ? ' has-error' : '' }}">
                            <label for="conpassword" class="col-md-4 control-label">ConfirmPassword</label>

                            <div class="col-md-6">
                                <input id="conpassword" type="password" class="form-control" name="conpassword" value="{{ old('conpassword') }}" required autofocus>

                                @if ($errors->has('conpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('conpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Changepassword
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
