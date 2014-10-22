@extends('/layouts/template')

@section('content')

<!-- Users Block Wall -->
<ol class="breadcrumb">
    <li><a href="{{URL::to('/')}}">Home</a></li>
    <li><a href="{{URL::to('/user')}}">{{$user->username }}</a></li>
    <li><a href="{{URL::to('/user/password')}}">password</a></li>
</ol>

<h3 class="wall_title">{{ $user->username }} - Change password</h3>

<!-- if message -->
@if(Session::has('ok'))
          <div class="alert alert-success">{{ Session::get('ok') }}</div>
@endif

<div class="user container-fluid clearfix">
    {{ Form::open(array('url' => 'user/password', 'method' => 'post')) }}
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
                <a href="javascript:history.back()" class="btn btn-default back">Back</a>
                <button type="submit" class="btn btn-primary save">Save</button>
            </div>
        </div>
       
     </div>
    {{ Form::close() }}
</div>

@stop