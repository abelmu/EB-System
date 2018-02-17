@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="container">
<a href="/vehicleinfohome"  class="btn btn-success">Home</a><br>

    <div class="row">
     <form class="form-horizontal" role="form" method="POST" action="/vehicleinfos/{{$vehicleinfo->id }}">

         <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">UpdateVehicleInformation</div>
                <div class="panel-body">
                   
                        {{ method_field ('PUT')}}
                        {{ csrf_field() }}

                        
                       <div class="form-group{{ $errors->has('platenumber') ? ' has-error' : '' }}">
                            

                         <div class="form-group{{ $errors->has('platenumber') ? ' has-error' : '' }}">
                            <label for="platenumber" class="col-md-4 control-label">Plate number</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="platenumber" id="platenumber"   >
                                 {{$Vehicleinfo=App\Vehicleinfo::all()}}
                               <option value={{$vehicleinfo->platenumber}}>
                               {{$vehicleinfo->platenumber}}
                                   </option>
                                 @foreach($Vehicleinfo as $vinfo)
                                  <option  value={{$vinfo->platenumber}}>{{$vinfo->platenumber}}
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
                        </div>

                        <div class="form-group{{ $errors->has('chasisnumber') ? ' has-error' : '' }}">
                            <label for="chasisnumber" class="col-md-4 control-label">Chasisnumber</label>

                            <div class="col-md-6">
                                <input id="chasisnumber" type="text" class="form-control" name="chasisnumber" value="{{ $vehicleinfo->chasisnumber}}" required autofocus>

                                @if ($errors->has('chasisnumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('chasisnumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                       <div class="form-group{{ $errors->has('vehicletype') ? ' has-error' : '' }}">
                            <label for="vehicletype" class="col-md-4 control-label">vehicletype</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="vehicletype" id="vehicletype">

                                      <option value={{$vehicleinfo->vehicletype}}>
                               {{$vehicleinfo->vehicletype}}

                               </option>
                                 {{$Vehicletype=App\Vehicletype::all()}}
                                 @foreach($Vehicletype as $vtype)
                                  <option value={{$vtype->vehicletype}}>{{$vtype->vehicletype}}
                                   </option>
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('vehicletype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vehicletype') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                       

                     



                        <div class="form-group{{ $errors->has('motornumber') ? ' has-error' : '' }}">
                            <label for="motornumber" class="col-md-4 control-label">Motor number</label>

                            <div class="col-md-6">
                                <input id="motornumber" type="text" class="form-control" name="motornumber" value="{{ $vehicleinfo->motornumber}}" required autofocus>

                                @if ($errors->has('motornumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('motornumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('servicekm') ? ' has-error' : '' }}">
                            <label for="servicekm" class="col-md-4 control-label">Servicekm</label>

                            <div class="col-md-6">
                                <input id="servicekm" type="text" class="form-control" name="servicekm" value="{{ $vehicleinfo->servicekm }}" required autofocus>

                                @if ($errors->has('servicekm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('servicekm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                     

                          <div class="form-group{{ $errors->has('vehiclemodel') ? ' has-error' : '' }}">
                            <label for="vehiclemodel" class="col-md-4 control-label">Vehiclemodel</label>

                            <div class="col-md-6">
                                <input id="vehiclemodel" type="text" class="form-control" name="vehiclemodel" value="{{ $vehicleinfo->vehiclemodel }}" required autofocus>

                                @if ($errors->has('vehiclemodel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vehiclemodel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('datebaought') ? ' has-error' : '' }}">
                            <label for="datebaought" class="col-md-4 control-label">Datebought</label>

                            <div class="col-md-6">
                                <input id="datebaought" type="date" class="form-control" name="datebaought" value="{{ $vehicleinfo->datebaought}}" required autofocus>

                                @if ($errors->has('datebaought'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datebaought') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                                <div class="form-group{{ $errors->has('suppliername') ? ' has-error' : '' }}">
                            <label for="suppliername" class="col-md-4 control-label">Supplier</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="suppliername" id="suppliername">
                                 {{$Supplier=App\Supplier::all()}}
                                 <option value={{$vehicleinfo->suppliername}}>{{$vehicleinfo->suppliername}}
                                   </option>
                                 @foreach($Supplier as $sup)

                                  <option value={{$sup->suppliername}}>{{$sup->suppliername}}
                                   </option>
                                  
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('suppliername'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('suppliername') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        

                      <div class="form-group{{ $errors->has('drivername') ? ' has-error' : '' }}">
                            <label for="drivername" class="col-md-4 control-label">Drivername</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="drivername" id="drivername">
                                  {{$Vehicledriver=App\Vehicledriver::all()}}
                                  <option value={{$vehicleinfo->drivername}}>{{$vehicleinfo->drivername}}
                                   </option>
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

                         
                        
                        

                   
                        </div>
                        
                          
                    
                </div>
            </div>
     <div class="col-md-4 col-md-offset-2">
                           
                    <div class="panel panel-default">
                <div class="panel-heading">VehicleSpecificInformation</div>
              
                   
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('vehicleprice') ? ' has-error' : '' }}">
                            <label for="vehicleprice" class="col-md-4 control-label">vehicleprice</label>

                            <div class="col-md-6">
                                <input id="vehicleprice" type="text" class="form-control" name="vehicleprice" value="{{ $vehicleinfo->vehicleprice}}" required autofocus>

                                @if ($errors->has('vehicleprice'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vehicleprice') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                                                    <div class="form-group{{ $errors->has('abysiniacard') ? ' has-error' : '' }}">
                            <label for="abysiniacard" class="col-md-4 control-label">Abysinia Card</label>

                            <div class="col-md-6">
                            
                                <input id="abysiniacard" type="text" class="form-control" name="abysiniacard" value="{{ $vehicleinfo->abysiniacard}}" required autofocus
                                >

                                @if ($errors->has('abysiniacard'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('abysiniacard') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                            <div class="form-group{{ $errors->has('abysiniacardrem') ? ' has-error' : '' }}">
                            <label for="abysiniacard" class="col-md-4 control-label">Abysinia Card Remaining</label>

                            <div class="col-md-6">
                            
                                <input id="abysiniacardrem" type="text" class="form-control" name="abysiniacardrem" value="{{ $vehicleinfo->abysiniacardremaining}}" required autofocus
                                >

                                @if ($errors->has('abysiniacardrem'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('abysiniacardrem') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                         <div class="form-group{{ $errors->has('fuel') ? ' has-error' : '' }}">
                            <label for="fuel" class="col-md-4 control-label">Fuel available in littre</label>

                            <div class="col-md-6">
                                <input id="fuel" type="text" class="form-control" name="fuel" value="{{ $vehicleinfo->fuelavailableinlittre}}" required autofocus>

                                @if ($errors->has('fuel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fuel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                  

                 


                         <div class="form-group{{ $errors->has('numofdoors') ? ' has-error' : '' }}">
                            <label for="numofdoors" class="col-md-4 control-label">Numberof Doors</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="numofdoors" id="numofdoors">
                                 
                                 
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  
                             
                                  
                                </select>


                                @if ($errors->has('numofdoors'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numofdoors') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('fueltype') ? ' has-error' : '' }}">
                            <label for="fueltype" class="col-md-4 control-label">Fueltype</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="fueltype" id="fueltype">
                                 {{$Fueltypeandprice=App\Fueltypeandprice::all()}}
                                 <option value={{$vehicleinfo->fueltype}}>{{$vehicleinfo->fueltype}}
                                   </option>
                                 @foreach($Fueltypeandprice as $ftype)
                                  <option value={{$ftype->fueltype}}>{{$ftype->fueltype}}
                                   </option>
                                  
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('fueltype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fueltype') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('radiocassete') ? ' has-error' : '' }}">
                            <label for="radiocassete" class="col-md-4 control-label">RadioCasette</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="radiocassete" id="radiocassete">
                                 
                                  <option value="Available">Available</option>

                                   <option value="NotAvailable">NotAvailable</option>
                                  
                                </select>


                                @if ($errors->has('radiocassete'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('radiocassete') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                             <div class="form-group{{ $errors->has('airconditionare') ? ' has-error' : '' }}">
                            <label for="airconditionare" class="col-md-4 control-label">AirConditionare</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="airconditionare" id="airconditionare">
                                 
                                <option value="Available">Available</option>

                                   <option value="NotAvailable">NotAvailable</option>
                                  
                                </select>


                                @if ($errors->has('airconditionare'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('airconditionare') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        </div>       
                <div class="col-md-5 col-md-offset-2 text-right">                        
                                <a href="/vehicleinfohome" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    save changes
                                </button>
                </div>                
                      </form>

        </div>
    </div>
           

@endsection
