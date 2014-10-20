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

<!-- Users Block Wall -->
<ol class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/user/{{$user->id}}">{{$user->username }}</a></li>
</ol>

<h3 class="wall_title">{{ $user->username }}</h3>

<!-- if message -->
@if(Session::has('ok'))
          <div class="alert alert-success">{{ Session::get('ok') }}</div>
@endif

<div class="user container-fluid clearfix">
    {{ Form::open(array('url' => 'user/' . $user->id, 'method' => 'put')) }}
    <div class="row">   
       
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="box box-form ">
                <h3 class="border-bottom">Change your password</h3>
                <div class="form-horizontal" role="form">
                  <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9 {{ $errors->has('password') ? 'has-error has-feedback' : '' }}">
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                         {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Your password')) }}
                    </div>
                    <br>
                    <br>
                    <label for="password2" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9 {{ $errors->has('password2') ? 'has-error has-feedback' : '' }}">
                        <small class="text-danger">{{ $errors->first('password2') }}</small>
                        {{ Form::password('password2', array('class' => 'form-control', 'placeholder' => 'Retype your password')) }}
                    </div>
                  </div>
                </div>
          </div> 
        </div>
        
        <div class="box col-xs-12 col-sm-12 col-md-12">
            <div class="user_button">
                <button class="btn btn-default">Canceled</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
       
     </div>
    {{ Form::close() }}
</div>

@stop