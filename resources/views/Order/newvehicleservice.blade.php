@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="container">
<a href="/vehicleservicehome"  class="btn btn-success">Home</a><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Vehicle Service Request Form</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="vehicleservice">
                        {{ csrf_field() }}



                       <div class="form-group{{ $errors->has('platenumber') ? ' has-error' : '' }}">
                            <label for="platenumber" class="col-md-4 control-label">Platenumber</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="platenumber" id="platenumber">
                                 <option>
                                   </option>
                                 @foreach($Vehicleinfo as $vinfo)
                                  <option value={{$vinfo->platenumber}}>{{$vinfo->platenumber}}
                                   </option>
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('platenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('platenumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                                   <div class="form-group{{ $errors->has('drivername') ? ' has-error' : '' }}">
                            <label for="drivername" class="col-md-4 control-label">Driver name</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="drivername" id="drivername">
                                <option></option>
                                  {{$Vehicledriver=App\Vehicledriver::all()}}
                                 @foreach($Vehicledriver as $vdriver)
                                  <option value={{$vdriver->drivername}}>{{$vdriver->drivername}}
                                   </option>
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('drivername'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('drivername') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('garagename') ? ' has-error' : '' }}">
                            <label for="garagename" class="col-md-4 control-label">Gargename</label>

                            <div class="col-md-6">
                            <select class="selectpicker" name="garagename" id="drivername"> 
                            <option>
                                
                            </option>  
                                 @foreach($Garage as $garage)
                            <option value={{$garage->garagename}}>{{ $garage->garagename}}
                                   </option>
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('garagename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('garagename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          

                         <div class="form-group{{ $errors->has('servicesmade[]') ? ' has-error' : '' }}">
                            <label for="servicesmade[]" class="col-md-4 control-label">Servicesmade</label>

                            <div class="col-md-6">
                          
                                <label class="checkbox-inline"><input type="checkbox" name="servicesmade[]" value="Change Brake pad">Change Brake pad</label>
                            
                                <label class="checkbox-inline"><input type="checkbox" name="servicesmade[]" value="Fuel and Oil Filter Change">Fuel and Oil Filter Change</label> 

                                <label class="checkbox-inline"><input type="checkbox" name="servicesmade[]" value="Engine Oil Change">Engine Oil Change</label>
                                <label class="checkbox-inline"><input type="checkbox" name="servicesmade[]" value="Others">Others</label>
                              
                            <input type="text" class="textbox" name="subject" size="40" maxlength="85" value="{$subject}" tabindex="1"/>
                                @if ($errors->has('rolename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rolename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                
                         <div class="form-group{{ $errors->has('sdate') ? ' has-error' : '' }}">
                            <label for="sdate" class="col-md-4 control-label">From date</label>

                            <div class="col-md-6">
                                <input id="sdate" type="date" class="form-control" name="sdate" value="{{ old('sdate') }}" required autofocus>

                                @if ($errors->has('sdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sdate') }}</strong>
                                    </span>
                                @endif
                            </div>


                        </div>



                        <div class="form-group{{ $errors->has('udate') ? ' has-error' : '' }}">
                            <label for="udate" class="col-md-4 control-label">Up to date</label>

                            <div class="col-md-6">
                                <input id="udate" type="date" class="form-control" name="udate" value="{{ old('udate') }}" required autofocus>

                                @if ($errors->has('udate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('udate') }}</strong>
                                    </span>
                                @endif
                            </div>

                            
                        </div>

                        
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>

                            
                        </div>

                           <div class="form-group{{ $errors->has('servicetype') ? ' has-error' : '' }}">
                            <label for="servicetype" class="col-md-4 control-label">Servicetype</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="servicetype" id="servicetype">
                                 <option></option>
                                  <option value="Periodic">Periodic</option>

                                   <option value="Claim">Claim</option>
                                   <option value="Corrective">Corrective</option>
                                  
                                </select>


                                @if ($errors->has('servicetype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('servicetype') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('coveredby') ? ' has-error' : '' }}">
                            <label for="coveredby" class="col-md-4 control-label">Coveredby</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="coveredby" id="coveredby">
                                 <option></option>
                                  <option value="Company">Company</option>

                                   <option value="Insurance">Insurance</option>
                                   
                                  
                                </select>


                                @if ($errors->has('coveredby'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('coveredby') }}</strong>
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
