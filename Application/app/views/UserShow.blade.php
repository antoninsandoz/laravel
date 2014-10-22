@extends('/layouts/template')

@section('content')

<!-- Users Block Wall -->
<ol class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/user">{{$user->username }}</a></li>
</ol>

<h3 class="wall_title">{{ $user->username }}</h3>

<!-- if message -->
@if(Session::has('ok'))
          <div class="alert alert-success">{{ Session::get('ok') }}</div>
@endif
@if(Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif

<div class="user container-fluid clearfix">
    {{ Form::open(array('url' => 'user/', 'method' => 'post')) }}
    <div class="row"> 
        
       <div class="col-xs-12 col-sm-6 col-md-6">
           <div class="box box-form-left ">
                <h3 class="border-bottom">Account</h3>
                <div class="form-horizontal" role="form">
                  <div class="form-group border-bottom">
                    <label for="image" class="col-sm-3 control-label">image</label>
                    <div class="col-sm-9 user_image">
                        @if($user->image)
                        <img src='./uploads/{{$user->image}}' />
                        @else
                        <img src='./img/user_default.png' />
                        @endif
                    </div>
                    <a href="/userimage/{{$user->id}}"><button type="button" class="btn_image btn btn-default">Change image</button></a>
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
                    <a href="/password" ><button type="button" class="btn_image btn btn-default">Change password</button></a>
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
                <a href="javascript:history.back()">
                    <button class="btn btn-default back">Back</button>
                </a>
                <button type="submit" class="btn btn-primary save">Save</button>
            </div>
        </div>
     </div>
    {{ Form::close() }}
</div>

@stop