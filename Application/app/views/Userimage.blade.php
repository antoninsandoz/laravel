@extends('/layouts/template')

@section('content')
    <br>
	<div class="col-sm-offset-4 col-sm-4">
		<div class="panel panel-info">
			<div class="panel-heading">Envoi d'une photo</div>
			<div class="panel-body"> 
				@if(Session::has('error'))
					<div class="alert alert-danger">{{ Session::get('error') }}</div>
				@endif
                                <!-- if message -->
                                @if(Session::has('ok'))
                                          <div class="alert alert-success">{{ Session::get('ok') }}</div>
                                @endif
				{{ Form::open(array('url' => 'userimage/', 'files' => true)) }}
					<small class="text-danger">{{ $errors->first('image') }}</small>
					<div class="form-group {{ $errors->has('nom') ? 'has-error has-feedback' : '' }}">
						{{ Form::file('image', array('class' => 'form-control')) }}
					</div>
					{{ Form::submit('Envoyer !', array('class' => 'btn btn-info pull-right')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop