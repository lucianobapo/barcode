@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">BarCode Generator</div>

                <div class="panel-body">
                    @if(isset($code))
                        <div class="well">
                            <img src="data:image/png;base64,{{ $codeImage }}" alt="barcode"/>
                            <div style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif">{{ $code }}</div>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/code') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">Number for code:</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus>

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Generate
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
