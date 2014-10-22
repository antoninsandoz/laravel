@extends('/layouts/template')

@section('content')

    <h3 class="wall_title">Login or Create a new account</h3>

    @if(Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    @if(Session::has('ok'))
        <div class="alert alert-success">{{ Session::get('ok') }}</div>
    @endif

    <div class="user container-fluid clearfix">
        <div class="row"> 
            {{ Form::open(array('url' => 'login', 'method' => 'post')) }}
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="box box-form">
                        <h3 class="border-bottom">Log in</h3>
                        <div class="form-horizontal" role="form">
                            <div class="form-group">
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                <label for="image" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9 {{ $errors->has('email') ? 'has-error' : '' }}">
                                    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <small class="text-danger">{{ Session::get('pass') }}</small>
                                <label for="image" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9 {{ Session::has('pass') ? 'has-error' : '' }}">
                                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-btn">
                        <div class="user_button">
                            <a href="javascript:history.back()">
                                <button class="btn btn-default back">Back</button>
                            </a>
                            <button type="submit" class="btn btn-primary save">Log in</button>
                        </div>
                    </div>    
                </div>
            {{ Form::close() }}

            {{ Form::open(array('url' => 'user/new', 'method' => 'post')) }}
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="box box-form ">
                        <h3 class="border-bottom">create a new account</h3>
                        <div class="form-horizontal" role="form">
                            <div class="form-group">
                              <label for="username" class="col-sm-3 control-label">Username</label>                    
                              <div class="col-sm-9 {{ $errors->has('username') ? 'has-error has-feedback' : '' }}">
                                  <small class="text-danger">{{ $errors->first('username') }}</small>
                                  {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Your Username')) }}
                              </div>
                            </div>
                            <div class="form-group">
                                  <small class="text-danger">{{ $errors->first('email_new') }}</small>
                                  <label for="image" class="col-sm-3 control-label">Email</label>
                                  <div class="col-sm-9 {{ $errors->has('email_new') ? 'has-error' : '' }}">
                                      {{ Form::email('email_new', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
                                  </div>
                          </div>
                          <div class="form-group">
                              <small class="text-danger">{{ $errors->first('password_new') }}</small>
                              <label for="image" class="col-sm-3 control-label">Password</label>
                              <div class="col-sm-9 {{ Session::has('password_new') ? 'has-error' : '' }}">
                                  {{ Form::password('password_new', array('class' => 'form-control', 'placeholder' => 'Password')) }}
                              </div>
                          </div>
                          <div class="form-group">
                              <small class="text-danger">{{ $errors->first('password_new2') }}</small>
                              <label for="image" class="col-sm-3 control-label">Password2</label>
                              <div class="col-sm-9 {{ Session::has('password_new2') ? 'has-error' : '' }}">
                                  {{ Form::password('password_new2', array('class' => 'form-control', 'placeholder' => 'Retype password')) }}
                              </div>
                          </div> 
                          <div class="form-group">
                            <label for="Languages_iso" class="col-sm-3 control-label">Languages</label>
                            <div class="col-sm-9 {{ $errors->has('Languages_iso') ? 'has-error has-feedback' : '' }}">
                              {{ Form::select('Languages_iso', array('en' => 'English','de' => 'German', 'fr' => 'French'), null, array('class' => 'form-control')) }}
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
                          <div class="form-group">
                            <label for="sex" class="col-sm-3 control-label">Sex</label>
                             <div class="col-sm-9 {{ $errors->has('sex') ? 'has-error has-feedback' : '' }}">
                                <div class="checkbox">
                                    <label>
                                      {{Form::radio('sex', 'women', true)}}
                                      Women
                                    </label>
                                    <label>
                                      {{Form::radio('sex', 'men')}}
                                      Men
                                    </label>
                                    <label>
                                      {{Form::radio('sex', 'unspecified')}}
                                      Unspecified
                                    </label>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="box box-btn">
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
    </div>
  



@stop