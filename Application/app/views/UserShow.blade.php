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
       
       <div class="col-xs-12 col-sm-6 col-md-6">
           <div class="box box-form ">
                <h3 class="border-bottom">Account</h3>
                <div class="form-horizontal" role="form">
                  <div class="form-group border-bottom">
                    <label for="image" class="col-sm-3 control-label">image</label>
                    <div class="col-sm-9 user_image">
                      <img src='../img/user_default.png' />
                    </div>
                    <button type="button" class="btn_image btn btn-default">Change image</button>
                  </div>  
                  <div class="form-group border-bottom">
                    <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9 {{ $errors->has('email') ? 'has-error has-feedback' : '' }}">
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                        {{ Form::email('email', $user->email, array('class' => 'form-control', 'value' => $user->email)) }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <a href="/password/{{$user->id}}" ><button type="button" class="btn_image btn btn-default">Change password</button></a>
                  </div>
                </div>
          </div> 
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="box box-form-right ">
                <h3 class="border-bottom">Informations</h3>
                <div class="form-horizontal" role="form">
                  <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>                    
                    <div class="col-sm-9 {{ $errors->has('username') ? 'has-error has-feedback' : '' }}">
                        <small class="text-danger">{{ $errors->first('username') }}</small>
                        {{ Form::text('username', $user->username, array('class' => 'form-control', 'value' => $user->username)) }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Languages_iso" class="col-sm-3 control-label">Languages</label>
                    <div class="col-sm-9 {{ $errors->has('Languages_iso') ? 'has-error has-feedback' : '' }}">
                      {{ Form::select('Languages_iso', array('en' => 'English','de' => 'German', 'fr' => 'French'), $user->Languages_iso, array('class' => 'form-control')) }}
                    </div>
                  </div>
                  <!--To modify for Add all coountry-->
                  <!--foreach + if http://api.geonames.org/countryInfo?username=demo-->
                  <div class="form-group">
                    <label for="country" class="col-sm-3 control-label">Country</label>
                    <div class="col-sm-9 {{ $errors->has('country') ? 'has-error has-feedback' : '' }}">
                        {{ Form::select('country', array('Switzerland' => 'Switzerland'), 'Switzerland', array('class' => 'form-control')) }}
                    </div>
                  </div>
                  
                 <!--Add groupe for all children foreach + if http://api.geonames.org/children?geonameId=2660717&username=antoninsandoz-->  
                 <!--foreach + if http://api.geonames.org/children?geonameId=2660717&username=antoninsandoz-->
                 <!-- Not use for the moment  
                 <div class="form-group">
                    <label for="inputUsername" class="col-sm-3 control-label">City</label>
                    <div class="col-sm-9">
                      <select class="form-control">   
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div>
                 -->
                  <div class="form-group">
                    <label for="sex" class="col-sm-3 control-label">Sex</label>
                     <div class="col-sm-9 {{ $errors->has('sex') ? 'has-error has-feedback' : '' }}">
                        <div class="checkbox">
                            <label>
                              @if($user->sex == 'women')
                              {{Form::radio('sex', 'women', true)}}
                              @else
                              {{Form::radio('sex', 'women')}}
                              @endif
                              Women
                            </label>
                            <label>
                              @if($user->sex == 'men')
                              {{Form::radio('sex', 'men', true)}}
                              @else
                              {{Form::radio('sex', 'men')}}
                              @endif
                              Men
                            </label>
                            <label>
                              @if($user->sex == 'unspecified')
                              {{Form::radio('sex', 'unspecified', true)}}
                              @else
                              {{Form::radio('sex', 'unspecified')}}
                              @endif
                              Unspecified
                            </label>
                        </div>
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