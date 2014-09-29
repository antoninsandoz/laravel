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


@section('content')     <!-- content-->

<!-- Users Block Wall -->

<h3 class="wall_title">Discover all BirdsWink of {{ $user->name }} !</h3>

<div class="wall box container-fluid clearfix">

    <div class="row">
          
        <div class="col-xs-6 col-sm-2 col-md-2">
            <div class="user_image"></div>
        </div>
        
        <div class="name col-xs-6 col-sm-4 col-md-4">
            <h4>{{ $user->name }}</h4>
            <span>{{ $user->country }}</span>
            <span> | </span>
            <span>{{ $user->city }}</span>
        </div>
        
        <div class="number col-xs-4 col-sm-2 col-md-2">
          <div class="circle" ><span class="text-muted">{{$user_likes}}</span></div>
          <p>Likes</p>
        </div>
        <div class="number col-xs-4 col-sm-2 col-md-2">
          <div class="circle" ><span class="text-muted">{{$user_comments}}</span></div>
          <p>Comments</p>
        </div>
        <div class="number col-xs-4 col-sm-2 col-md-2">
          <div class="circle" ><span class="text-muted">{{$user_pictures}}</span></div>
          <p>Pictures<p>
        </div>
          
    </div>

</div>

<!-- If no images -->
<!--
<div class=" box container-fluid clearfix ">
    <p class="message_box bg-primary">Sorry they are no images to display</p>
</div>
-->

<div class=" container-fluid clearfix ">
    <div class="row">
        @foreach($allpictures as $pict)
        <div class="wall_block box ">
            <div class="wall_image_block"> 
                <a href="/" >
                    <div class="hover">
                        <div>
                            <a href="/" >
                                <button type="button" class="btn btn-sm">
                                    <span class="glyphicon glyphicon glyphicon-heart"></span>
                                </button>
                            </a>
                            <a href="/" >    
                                <button type="button" class="btn btn-sm">
                                    <span class="glyphicon glyphicon glyphicon-comment"></span>
                                </button>
                            </a>
                        </div>
                    </div>
                    {{ HTML::image('uploads/'.$pict->Picture_url, $pict->name) }}
                </a>
                <div class="img_info">
                    <a href="/" ><p class="name">{{$pict->name}}</p></a>
                    <p class="date border">
                        {{date('d-m-Y', $pict->date)}} | {{date('h:m:s', $pict->date)}}
                    </p>
                    @if($pict->comment>0 OR $pict->like>0)
                    <p class="like_comment border">
                        <!-- if comment -->
                        <a href="/">
                            <span class="glyphicon glyphicon-comment"></span><!-- Icone -->
                            <span class="comment">{{$pict->comment}}</span>
                        </a>
                        <!-- if like -->
                        <a href="/" >
                            <span class="glyphicon glyphicon-heart"></span><!-- Icone -->
                            <span class="like">{{$pict->like}}</span>
                        </a>
                    </p>
                    @endif
                    @if($pict->legend)
                    <!-- If user legend -->
                    <p class="legend">{{$pict->legend}}</p>
                    @endif
                </div>     
            </div>    
        </div>
        @endforeach 
       
    </div>
</div>

@stop <!-- /content-->