
<!-- Navigation bar -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class=" nav navbar-nav">
                <li class="active"><a href="#">Link</a></li>
                
            </ul>
            @if(!Auth::check())
                {{ Form::open(array('url' => 'login', 'method' => 'post', 'class' => 'navbar-form navbar-right')) }}
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
                    </div>
                    <small class="text-danger">{{ $errors->first('pass') }}</small>
                    <div class="form-group {{ $errors->has('pass') ? 'has-error' : '' }}">
                        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                {{ Form::close() }}
            @else
                <a href="{{URL::to('/logout')}}" ><button class="btn btn-danger topbar_logout">Log out</button></a>
                <ul class="user-nav nav navbar-nav">
                    <li class=""><a href="{{URL::to('adminwall')}}/{{$user->id}}">Admin</a></li>
                    <li class=""><a href="{{URL::to('wall')}}/{{$user->id}}/1">My birds</a></li>
                    <li class="dropdown">
                        <a href='#' class="nav-user_image dropdown-toggle" data-toggle="dropdown">
                            @if($user->image)
                                {{ HTML::image('uploads/'.$user->image, '$user->username') }}
                            @else
                                {{ HTML::image('img/user_default.png', 'user_default') }}
                            @endif
                            {{$user->username}}
                            
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>                              
                                <a href="{{URL::to('/user')}}">My user profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">My box(es)</a></li>
                        </ul>
                    </li>
                </ul>
                
            @endif
            
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

