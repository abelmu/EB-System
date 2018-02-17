@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="container">
<a href="/vehiclehandover"  class="btn btn-success">Home</a><br>

    <div class="row">
     <form class="form-horizontal" role="form" method="POST" action="/vehiclehandovers/{{$vehiclehandover->id }}">

         <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Vehicle Handover Information</div>
                <div class="panel-body">
                   
                        {{ method_field ('PUT')}}
                        {{ csrf_field() }}



                       
                </div>


                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                          
                                <label class="checkbox-inline"><input type="checkbox" name="fbumber" value="yes">Front Bumber</label>
                                <label class="checkbox-inline"><input type="checkbox" name="rbumber" value="yes">Rare Bumber</label>
                                <label class="checkbox-inline"><input type="checkbox" name="door" value="yes">Doors</label> 

                                <label class="checkbox-inline"><input type="checkbox" name="lhshlamp" value="yes">Left Hand side Head Lamp</label>
                                <label class="checkbox-inline"><input type="checkbox" name="rhshlamp" value="yes">Right Hand side Lamp</label>
                                <label class="checkbox-inline"><input type="checkbox" name="lhsslight" value="yes">Left Hand side Signal Light</label> 

                                 <label class="checkbox-inline"><input type="checkbox" name="rhsslight" value="yes">Right Hand side Signal Light</label>
                                <label class="checkbox-inline"><input type="checkbox" name="rlights" value="yes">Rare Lights</label>
                                <label class="checkbox-inline"><input type="checkbox" name="odhandler" value="yes">Outer Door Handler</label> 

                                <label class="checkbox-inline"><input type="checkbox" name="glass" value="yes">Glass</label>
                                <label class="checkbox-inline"><input type="checkbox" name="lhsovmirror" value="yes">Left Hand Side Outer View Mirror</label>
                                <label class="checkbox-inline"><input type="checkbox" name="rhsovmirror" value="yes">Right Hand Side Outer View Mirror</label> 
                                <label class="checkbox-inline"><input type="checkbox" name="rainwipper" value="yes">Rain Wipper</label> 
                                <label class="checkbox-inline"><input type="checkbox" name="dipstick" value="yes">Dip Stick</label> 

                                <label class="checkbox-inline"><input type="checkbox" name="mudguard" value="yes">Mud Guard</label> 
                                <label >Rim Type
                                <select  name="rimtype" id="rimtype">
                                <option value="{{$vehiclehandover->rimtype}}">
                                    {{$vehiclehandover->rimtype}}
                                </option>
                              <option value="Metallic">Metallic</option>
                             
                            <option value="Almunium">Almunium
                                   </option>
                                  
                               
                                  
                                </select>
                                </label>

                                @if ($errors->has('rolename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rolename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

            </div>
            </div>

<div class="col-md-4 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Vehicle Hand Over Information</div>
                <div class="panel-body">
                   
                        {{ csrf_field() }}
          <div class="form-group{{ $errors->has('platenumber') ? ' has-error' : '' }}">
                            <label for="platenumber" class="col-md-4 control-label">Plate number</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="platenumber" id="platenumber">
                                 {{$Vehicleinfo=App\Vehicleinfo::all()}}
                                 <option value="{{$vehiclehandover->platenumber}}">
                                  {{$vehiclehandover->platenumber}} </option>
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
                        <br>
                        <div >
                            <label> Condition</label>
   <select  name="condition" id="condition">
                                <option value="{{$vehiclehandover->condition}}">{{$vehiclehandover->condition}}</option>
                              <option value="When Receiving">Recieving</option>
                             
                            <option value="When Returnining">Returnining
                                   </option>
                                  
                               
                                  
                                </select>

                        </div>
                
 <div class="form-group{{ $errors->has('employeename') ? ' has-error' : '' }}">
                            <label for="employeename" class="col-md-4 control-label">Employee name</label>

                            <div class="col-md-6">
                            
                                <input id="employeename" type="text" class="form-control" name="employeename" value="{{ $vehiclehandover->employeename}}" required autofocus
                                >

                                @if ($errors->has('employeename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employeename') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                       
                </div>
                </div>
                </div>

 
     <div class="col-md-4 col-md-offset-2">
                           
                    <div class="panel panel-default">
                <div class="panel-heading">Vehicle Internal Part Information</div>
              
                   <div class="panel-body">
                   
                        {{ csrf_field() }}

                       
                </div>

                <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                          
                                <label class="checkbox-inline"><input type="checkbox" name="gage" value="yes">
                                <input type="hidden" name="gage" value="No">
                                Gage</label>
                                <label class="checkbox-inline"><input type="checkbox" name="hazardswitch" value="yes">Hazardwitches</label>
                                <label class="checkbox-inline"><input type="checkbox" name="lightswitch" value="yes">Light Switch</label> 

                                <label class="checkbox-inline"><input type="checkbox" name="tape" value="yes">Tape</label>
                                <label class="checkbox-inline"><input type="checkbox" name="belt" value="yes">Belt</label>

                                <label class="checkbox-inline"><input type="checkbox" name="headrest" value="yes">Head rest</label>
                                <label class="checkbox-inline"><input type="checkbox" name="insidedoorlock" value="yes">Inside door Lock</label> 

                                 
                               <label for="numofwrench" class="col-md-4 control-label">Number of Wrenchs</label>

                            <div class="col-md-6">
                            
                                <input id="numofwrench" type="text" class="form-control" name="numofwrench" value="{{$vehiclehandover->numofwrench }}" required autofocus
                                >

                                @if ($errors->has('numofwrench'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numofwrench') }}</strong>
                                    </span>
                                @endif
                            </div>

                                @if ($errors->has('rolename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rolename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                       
                        </div>
                        </div>

         <div class="col-md-4 col-md-offset-2">
                           
                    <div class="panel panel-default">
                <div class="panel-heading">Vehicle Tyers Information</div>
              
                   <div class="panel-body">
                   
                        {{ csrf_field() }}
                       
                </div>

                       <div class="form-group{{ $errors->has('flsidetyretype') ? ' has-error' : '' }}">
                            <label for="flsidetyretype" class="col-md-4 control-label">Front Left Side Tyre Type</label>

                            <div class="col-md-6">
                            
                                <input id="flsidetyretype" type="text" class="form-control" name="flsidetyretype" value="{{$vehiclehandover->flsidetyretype}}" required autofocus
                                >

                                @if ($errors->has('flsidetyretype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('flsidetyretype') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                               <div class="form-group{{ $errors->has('frsidetyretype') ? ' has-error' : '' }}">
                            <label for="frsidetyretype" class="col-md-4 control-label">Front Right Side Tyre Type</label>

                            <div class="col-md-6">
                            
                                <input id="frsidetyretype" type="text" class="form-control" name="frsidetyretype" value="{{ $vehiclehandover->frsidetyretype }}" required autofocus
                                >

                                @if ($errors->has('frsidetyretype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('frsidetyretype') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                               <div class="form-group{{ $errors->has('rlsidetyretype') ? ' has-error' : '' }}">
                            <label for="rlsidetyretype" class="col-md-4 control-label">Rare Left Side Tyre Type</label>

                            <div class="col-md-6">
                            
                                <input id="rlsidetyretype" type="text" class="form-control" name="rlsidetyretype" value="{{ $vehiclehandover->rlsidetyretype}}" required autofocus
                                >

                                @if ($errors->has('rlsidetyretype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rlsidetyretype') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                               <div class="form-group{{ $errors->has('rrsidetyretype') ? ' has-error' : '' }}">
                            <label for="rrsidetyretype" class="col-md-4 control-label">Rare Right Side Tyre Type</label>

                            <div class="col-md-6">
                            
                                <input id="rrsidetyretype" type="text" class="form-control" name="rrsidetyretype" value="{{ $vehiclehandover->rrsidetyretype }}" required autofocus
                                >

                                @if ($errors->has('rrsidetyretype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rrsidetyretype') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                       

                       
                        </div>
                        </div>
             <div class="col-md-4 col-md-offset-2">
                           
                    <div class="panel panel-default">
                <div class="panel-heading">Vehicle Suplimentery Materials Information</div>
              
                   <div class="panel-body">
                   
                        {{ csrf_field() }}
    
                </div>
                       
<div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                          
                                <label class="checkbox-inline"><input type="checkbox" name="standjack" value="yes">Stand Jack</label>
                                <label class="checkbox-inline"><input type="checkbox" name="tyrewrench" value="yes">Tyre Wrench</label>
                                <label class="checkbox-inline"><input type="checkbox" name="jackpicker" value="yes">Jack Picker</label> 

                                <label class="checkbox-inline"><input type="checkbox" name="sparetyre" value="yes">Spare Tyre</label>
                                
                              

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        </div>
                        </div>
                        </div>





                 




                     



                              
                        
                        
                   <div class="col-md-5 col-md-offset-2 text-right">                        
                                <a href="/vehiclehandover" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    save changes
                                </button>
                </div>                
                      </form>

        </div>
    </div>
           

@endsection
