@extends('layouts.app')

@section('content')



@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<div class="container">
<a href="/suphome"  class="btn btn-success">Home</a><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">AddNewSupplier</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/suppliers') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('suppliercode') ? ' has-error' : '' }}">
                            <label for="suppliercode" class="col-md-4 control-label">SupplierCode</label>

                            <div class="col-md-6">
                                <input id="suppliercode" type="text" class="form-control" name="suppliercode" value="{{ old('suppliercode') }}" required autofocus>

                                @if ($errors->has('suppliercode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('suppliercode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('suppliername') ? ' has-error' : '' }}">
                            <label for="suppliername" class="col-md-4 control-label">SupplierName</label>

                            <div class="col-md-6">
                                <input id="suppliername" type="text" class="form-control" name="suppliername" value="{{ old('suppliername') }}" required autofocus>

                                @if ($errors->has('suppliername'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('suppliername') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telno1') ? ' has-error' : '' }}">
                            <label for="telno1" class="col-md-4 control-label">TelephoneNo(1)</label>

                            <div class="col-md-6">
                                <input id="telno1" type="text" class="form-control" name="telno1" value="{{ old('telno1') }}" required autofocus>

                                @if ($errors->has('telno1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telno1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('telno2') ? ' has-error' : '' }}">
                            <label for="telno2" class="col-md-4 control-label">TelephoneNo(2)</label>

                            <div class="col-md-6">
                                <input id="telno2" type="text" class="form-control" name="telno2" value="{{ old('telno2') }}" required autofocus>

                                @if ($errors->has('telno2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telno2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                       <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
                            <label for="fax" class="col-md-4 control-label">Fax No</label>

                            <div class="col-md-6">
                                <input id="fax" type="text" class="form-control" name="fax" value="{{ old('fax') }}" required autofocus>

                                @if ($errors->has('fax'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fax') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pbox') ? ' has-error' : '' }}">
                            <label for="pbox" class="col-md-4 control-label">PO BOX</label>

                            <div class="col-md-6">
                                <input id="pbox" type="text" class="form-control" name="pbox" value="{{ old('pbox') }}" required autofocus>

                                @if ($errors->has('pbox'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pbox') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                              <div class="form-group{{ $errors->has('woreda') ? ' has-error' : '' }}">
                            <label for="woreda" class="col-md-4 control-label">woreda</label>

                            <div class="col-md-6">
                                <input id="woreda" type="text" class="form-control" name="woreda" value="{{ old('woreda') }}" required autofocus>

                                @if ($errors->has('woreda'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('woreda') }}</strong>
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
