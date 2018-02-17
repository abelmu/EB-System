@extends('layouts.app')
  
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>
        
    </title>

    
</head>
<body>



@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif

<div class="container">

<a href="/cityvehiclemovhome"  class="btn btn-success">Home</a>

    <div class="row">
     <form class="form-horizontal" role="form" method="POST"  action="/cityvehiclemovement/{{$cityvehiclemovement->id}}">
     
         <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Daily City Vehicle Movement</div>
                <div class="panel-body">
                   
                        {{method_field ('PUT')}}
                        {{ csrf_field() }}

                   

                       <div class="form-group{{ $errors->has('platenumber') ? ' has-error' : '' }}">
                            <label for="platenumber" class="col-md-4 control-label">Plate number</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="platenumber" id="platenumber">
                                 {{$Vehicleinfo=App\Vehicleinfo::all()}}
                                 <option value={{$cityvehiclemovement->platenumber}}>{{$cityvehiclemovement->platenumber}}
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
                                <option value={{$cityvehiclemovement->drivername}}>
                                  {{$cityvehiclemovement->drivername}}
                                </option>
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
                         <div class="form-group{{ $errors->has('initialkm') ? ' has-error' : '' }}">
                            <label for="initialkm" class="col-md-4 control-label">Initial km
                            Before movement</label>

                            <div class="col-md-6">
                                <input id="initialkm" type="text" class="form-control" name="initialkm" value="{{$cityvehiclemovement->initialkm }}" disabled autofocus>

                                @if ($errors->has('initialkm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('initialkm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>      

                                <div class="form-group{{ $errors->has('initialkm') ? ' has-error' : '' }}">
                            <label for="initialkm" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="initialkm" type="hidden" class="form-control" name="initialkm" value="{{$cityvehiclemovement->initialkm }}"  autofocus>

                                @if ($errors->has('initialkm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('initialkm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                   

  
          

                         <div class="form-group{{ $errors->has('finalkm') ? ' has-error' : '' }}">
                            <label for="finalkm" class="col-md-4 control-label">Final km After movement </label>

                            <div class="col-md-6">

                                <input id="finalkm" type="text" class="form-control" name="finalkm" value="{{$cityvehiclemovement->finalkm}}" required autofocus>

                                @if ($errors->has('finalkm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('finalkm') }}</strong>
                                    </span>
                                @endif
                            </div>
                                         <div class="form-group{{ $errors->has('diffkm') ? ' has-error' : '' }}">
                            <label for="diffkm" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="diffkm" type="hidden" class="form-control" name="diffkm" value="{{$cityvehiclemovement->differencekm }}"  autofocus>

                                @if ($errors->has('diffkm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('diffkm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                        </div>       
                            <div class="form-group{{ $errors->has('diffkm') ? ' has-error' : '' }}">
                            <label for="diffkm" class="col-md-4 control-label">Difference km
                            Before movement</label>

                            <div class="col-md-6">
                                <input id="diffkm" type="text" class="form-control" name="diffkm" value="{{$cityvehiclemovement->differencekm }}" readonly="readonly" autofocus>

                                @if ($errors->has('diffkm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('diffkm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   


                    
                 <div class="form-group{{ $errors->has('initialkm') ? ' has-error' : '' }}">
                            <label for="initialpos" class="col-md-4 control-label">Initial Position </label>

                            <div class="col-md-6">
                                <input id="initialposition" type="text" class="form-control" name="initialposition" value="{{$cityvehiclemovement->initialposition}}" autofocus>

                                @if ($errors->has('initialpos'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('initialpos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                      

  
          

                         <div class="form-group{{ $errors->has('finalpos') ? ' has-error' : '' }}">
                            <label for="finalpos" class="col-md-4 control-label">Final Position</label>

                            <div class="col-md-6">
                                <input id="finalposition" type="text" class="form-control" name="finalposition" value="{{$cityvehiclemovement->finalposition}}" required autofocus>

                                @if ($errors->has('finalpos'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('finalpos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>      
                   
                        </div>
                        
                          
                    
                </div>
            </div>
            <div class="col-md-6 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Daily City Vehicle Movement</div>
                <div class="panel-body">

                              <div class="form-group{{ $errors->has('starttime') ? ' has-error' : '' }}">
                            <label for="starttime" class="col-md-4 control-label">Starting Time</label>

                            <div class="col-md-6">
                                 
                                <input id="startingtime" type="datetime-local" class="form-control" name="startingtime" value="{{$cityvehiclemovement->startingtime}}" required autofocus>

                                @if ($errors->has('starttime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('starttime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 



                              <div class="form-group{{ $errors->has('endtime') ? ' has-error' : '' }}">
                            <label for="endtime" class="col-md-4 control-label">Ending Time </label>

                            <div class="col-md-6">
                                <input id="endtime" type="datetime-local" class="form-control" name="endtime" value="{{$cityvehiclemovement->endtime}}" required autofocus>

                                @if ($errors->has('endtime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('endtime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                

                          <div class="form-group{{ $errors->has('reqdept') ? ' has-error' : '' }}">
                            <label for="reqdept" class="col-md-4 control-label">Requester Department</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="reqdepartment" id="reqdepartment">
                                 {{$Branch=App\Branch::all()}}
                                 <option value={{$cityvehiclemovement->reqdepartment}}>
                                 {{$cityvehiclemovement->reqdepartment}}
                                   </option>
                                 @foreach($Branch as $bname)
                                  <option value={{$bname->branchname}}>{{$bname->branchname}}
                                   </option>
                                  
                                @endforeach
                                  
                                </select>


                                @if ($errors->has('reqdept'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reqdept') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('numofpeople') ? ' has-error' : '' }}">
                            <label for="numofpeople" class="col-md-4 control-label">Number of People</label>

                            <div class="col-md-6">
                                <input id="numberofpeople" type="text" class="form-control" name="numberofpeople" value="{{$cityvehiclemovement->numberofpeople}}" required autofocus>

                                @if ($errors->has('numofpeople'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numofpeople') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>             
                        

                            <div class="form-group{{ $errors->has('package') ? ' has-error' : '' }}">
                            <label for="package" class="col-md-4 control-label">Package size in Kg</label>

                            <div class="col-md-6">
                                <input id="package" type="text" class="form-control" name="package" value="{{$cityvehiclemovement->package}}"  autofocus>

                                @if ($errors->has('package'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('package') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                   
          
       
      



</div>  
</div>  
</div>  

            </div>
                      
                    </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                 <a href="/cityvehiclemovhome" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    save changes
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
</div>
 
</body>
</html>
@endsection
