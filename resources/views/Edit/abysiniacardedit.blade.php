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
                <div class="panel-heading"> Update Abysinia Card For City Work</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/abysiniacards/{{ $abysiniacard->id }}">
                         {{ method_field ('PUT')}}
                        {{ csrf_field() }}




                       <div class="form-group{{ $errors->has('platenumber') ? ' has-error' : '' }}">
                            

                         <div class="form-group{{ $errors->has('platenumber') ? ' has-error' : '' }}">
                            <label for="platenumber" class="col-md-4 control-label">Plate number</label>

                            <div class="col-md-6">
                                <select class="selectpicker" name="platenumber" id="platenumber"   >
                                 {{$Vehicleinfo=App\Vehicleinfo::all()}}
                               <option value={{$abysiniacard->platenumber}}>
                               {{$abysiniacard->platenumber}}
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
<p class="text-left"></p>
                                        <div class="form-group{{ $errors->has('abysiniacard') ? ' has-error' : '' }}">
                            <label for="abysiniacard" class="col-md-4 control-label">Abysinia Card</label>

                            <div class="col-md-6">
                            
                                <input id="abysiniacard" type="text" class="form-control" name="abysiniacard" value="{{$abysiniacard->abysiniacard }}" required autofocus
                                >

                                @if ($errors->has('abysiniacard'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('abysiniacard') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>


               
                       

                  

              

                                   <div class="form-group{{ $errors->has('orderdate') ? ' has-error' : '' }}">
                            <label for="orderdate" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                            
                                <input id="orderdate" type="date" class="form-control" name="orderdate" value="{{$abysiniacard->orderdate }}" required autofocus 
                                >

                                @if ($errors->has('orderdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('orderdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>


                        <div class="form-group">
                             <div class="col-md-8 col-md-offset-4">
                                <a href="/abysiniahome" class="btn btn-danger">Cancel</a>
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
@endsection
