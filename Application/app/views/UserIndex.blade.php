@extends('layouts/template')

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

<div class="wall box container-fluid clearfix">

    <div class="row">
          
        <div class="col-xs-6 col-sm-2 col-md-2">
            <div class="user_image"></div>
        </div>
        <div class="name col-xs-6 col-sm-4 col-md-4">
            <h3>Name</h3>
            <span>Suisse</span>
            <span> | </span>
            <span>Geneva</span>
        </div>
          
        <div class="number col-xs-4 col-sm-2 col-md-2">
          <div class="circle" ><span class="text-muted">10</span></div>
          <p>Likes</p>
        </div>
        <div class="number col-xs-4 col-sm-2 col-md-2">
          <div class="circle" ><span class="text-muted">10</span></div>
          <p>Pict./month</p>
        </div>
        <div class="number col-xs-4 col-sm-2 col-md-2">
          <div class="circle" ><span class="text-muted">10</span></div>
          <p>Pictures<p>
        </div>
          
    </div>

</div>



<div class="col-sm-offset-4 col-sm-4">

        @if(Session::has('ok'))
                <div class="alert alert-success">{{ Session::get('ok') }}</div>
        @endif

        <div class="panel panel-primary">
                <div class="panel-heading">
                        <h3 class="panel-title">Liste des utilisateurs</h3>
                </div>
                <table class="table">
                        <thead>
                                <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)
                            <td>{{ $user->id }}</td>
                            <td class="text-primary"><strong>{{ $user->name }}</strong></td>
                            <td>{{ link_to_route('user.show', 'Voir', array($user->id), array('class' => 'btn btn-success btn-block')) }}</td>
                            <td>{{ link_to_route('user.edit', 'Modifier', array($user->id), array('class' => 'btn btn-warning btn-block')) }}</td>
                            <td>
                                                {{ Form::open(array('method' => 'DELETE', 'route' => array('user.destroy', $user->id))) }}
                                                        {{ Form::submit('Supprimer', array('class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')')) }}
                                                {{ Form::close() }}
                            </td>
                            </tr>
                          @endforeach
                </tbody>
                </table>
        </div>
        {{ link_to_route('user.create', 'Ajouter un utilisateur', null, array('class' => 'btn btn-info pull-right')) }}
        {{ $users->links(); }}
</div>
@stop