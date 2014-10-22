
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
            @endif
            
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

