@extends('/layouts/template')

@section('topbar')

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">
    <li class="active"><a href="#">Link</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li class="divider"></li>
        <li><a href="#">Separated link</a></li>
        <li class="divider"></li>
        <li><a href="#">One more separated link</a></li>
      </ul>
    </li>
  </ul>
  <form class="navbar-form navbar-right" role="form">
      <div class="form-group">
        <input type="text" placeholder="Email" class="form-control">
      </div>
      <div class="form-group">
        <input type="password" placeholder="Password" class="form-control">
      </div>
      <button type="submit" class="btn btn-success">Sign in</button>
  </form>
</div><!-- /.navbar-collapse -->

@stop

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
		<br>
		@if(Session::has('error'))
			<div class="alert alert-danger">{{ Session::get('error') }}</div>
		@endif		
		<div class="panel panel-primary">	
			<div class="panel-heading">Connectez-vous !</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{{ Form::open(array('url' => 'login', 'method' => 'post', 'class' => 'form-horizontal panel')) }}	
                                          <small class="text-danger">{{ $errors->first('email') }}</small>
					  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					  	{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
					  </div>
					  <small class="text-danger">{{ Session::get('pass') }}</small>
					  <div class="form-group {{ Session::has('pass') ? 'has-error' : '' }}">
					  	{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
					  </div>
				
						{{ Form::submit('Envoyer', array('class' => 'btn btn-primary pull-right')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
		{{ link_to('password/remind', 'J\'ai oublié mon mot de passe !', array('class' => 'btn btn-warning pull-right')) }}
	</div>
@stop