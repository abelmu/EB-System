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

<a href="/vehiclemovhome"  class="btn btn-success">Home</a>

    <div class="row">
     <form class="form-horizontal" role="form" method="POST" action="{{ url('/vehiclemovement') }}">
     
         <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Daily Vehicle Movement</div>
                <div class="panel-body">
                   
                        {{ csrf_field() }}

                   

                       <div class="form-group{{ $errors->has('platenumber') ? ' has-error' : '' }}">
                            <label for="platenumber" class="col-md-4 control-label">Plate number</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="platenumber" id="platenumber">
                                 {{$Vehicleinfo=App\Vehicleinfo::all()}}
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
                         <div class="form-group{{ $errors->has('initialkm') ? ' has-error' : '' }}">
                            <label for="initialkm" class="col-md-4 control-label">Initial km
                            Before movement</label>

                            <div class="col-md-6">
                                <input id="initialkm" type="text" class="form-control" name="initialkm" value="{{ old('initialkm') }}" disabled autofocus>

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

                                <input id="finalkm" type="text" class="form-control" name="finalkm" value="{{ old('finalkm') }}" required autofocus>

                                @if ($errors->has('finalkm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('finalkm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>       
                      
                    
                 <div class="form-group{{ $errors->has('initialkm') ? ' has-error' : '' }}">
                            <label for="initialpos" class="col-md-4 control-label">Initial Position </label>

                            <div class="col-md-6">
                                <input id="initialpos" type="text" class="form-control" name="initialpos" value="{{ old('initialpos') }}" autofocus>

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
                                <input id="finalpos" type="text" class="form-control" name="finalpos" value="{{ old('finalpos') }}" required autofocus>

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
                <div class="panel-heading">Daily Vehicle Movement</div>
                <div class="panel-body">

                              <div class="form-group{{ $errors->has('starttime') ? ' has-error' : '' }}">
                            <label for="starttime" class="col-md-4 control-label">Starting Time</label>

                            <div class="col-md-6">
                                 
                                <input id="starttime" type="datetime-local" class="form-control" name="starttime" value="{{ old('starttime') }}" required autofocus>

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
                                <input id="endtime" type="datetime-local" class="form-control" name="endtime" value="{{ old('endtime') }}" required autofocus>

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
                                <select class="selectpicker" name="reqdept" id="reqdept">
                                 {{$Branch=App\Branch::all()}}
                                 <option>
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
                                <input id="numofpeople" type="text" class="form-control" name="numofpeople" value="{{ old('numofpeople') }}" required autofocus>

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
                                <input id="package" type="text" class="form-control" name="package" value="{{ old('package') }}"  autofocus>

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
                                <button type="submit" class="btn btn-primary pull-right clearfix">
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
 
</body>
</html>
@endsection
