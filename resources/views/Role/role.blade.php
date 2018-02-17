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
                <div class="panel-heading">Role Definition</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/roles') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('rolename') ? ' has-error' : '' }}">
                            <label for="rolename" class="col-md-4 control-label">Rolename</label>

                            <div class="col-md-6">
                                <input id="rolename" type="text" class="form-control" name="rolename" value="{{ old('rolename') }}" required autofocus>

                                @if ($errors->has('rolename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rolename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                          
                                <label class="checkbox-inline"><input type="checkbox" name="suppliers" value="yes">Maintain Suppliers</label>
                                <label class="checkbox-inline"><input type="checkbox" name="garages" value="yes">Maintain Garages</label>
                                <label class="checkbox-inline"><input type="checkbox" name="fuelstations" value="yes">Maintain fuelstations</label> 

                                <label class="checkbox-inline"><input type="checkbox" name="fuelprices" value="yes">Maintain fuelprices</label>
                                <label class="checkbox-inline"><input type="checkbox" name="vehicletypes" value="yes">Maintain vehicletypes</label>
                                <label class="checkbox-inline"><input type="checkbox" name="newvehicleinfos" value="yes">Maintain newvehicleinfos</label> 

                                 <label class="checkbox-inline"><input type="checkbox" name="userregisters" value="yes">Maintain userregisters</label>
                                <label class="checkbox-inline"><input type="checkbox" name="rolesdef" value="yes">Maintain rolesdef</label>
                                <label class="checkbox-inline"><input type="checkbox" name="fuelorders" value="yes">Maintain fuelorders</label> 

                                <label class="checkbox-inline"><input type="checkbox" name="vehiclesevices" value="yes">Maintain vehicle sevices</label>
                                <label class="checkbox-inline"><input type="checkbox" name="reports" value="yes">Maintain reports</label>
                                <label class="checkbox-inline"><input type="checkbox" name="vehiclemovements" value="yes">Maintain Vehicle Movements</label> 
                                <label class="checkbox-inline"><input type="checkbox" name="role[]" value="yes">Maintain Reports</label> 
                              

                                @if ($errors->has('rolename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rolename') }}</strong>
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
