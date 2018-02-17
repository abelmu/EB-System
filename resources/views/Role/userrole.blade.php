@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="container">
<a href="/rolehome"  class="btn btn-success">Home</a><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Role</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/userroles') }}">
                        {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('rolename') ? ' has-error' : '' }}">
                            <label for="rolename" class="col-md-4 control-label">Rolename</label>

                            <div class="col-md-6">
                            <select class="selectpicker" name="rolename" id="rolename"> 
                              <option></option>
                             {{$Role=App\Role::all()}}  
                                 @foreach($Role as $role)
                            <option value={{$role->rolename}}>{{$role->rolename}}
                                   </option>
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('rolename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rolename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">username</label>

                            <div class="col-md-6">
                            <select class="selectpicker" name="username" id="username">   
                            {{$User=App\User::all()}}  
                            <option></option>
                                 @foreach($User as $user)
                            <option value={{$user->username}}>{{$user->username}}
                                   </option>
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Assign
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
