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

<h3 class="wall_title"> {{ $user->name }} : Management area of your boxes</h3>
<div class="wall adminwall box container-fluid clearfix">
    <div class="row"> 
        <div class="name col-xs-6 col-sm-3 col-md-3">
            <ul class="nav navbar-nav">
              @if(count($boxes)>1)
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-camera"></span> 
                    {{ $boxes[0]->name }} 
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    @foreach($boxes as $box)
                        @if(count($boxes)>1)
                      <li><a href="#">{{$box->name}}</a></li>
                        @endif
                    @endforeach 
                </ul>
               
              </li>
              @else       
                <li class="dropdown">
                    <a>{{$boxes[0]->name}}</a>
                </li>
              @endif
            </ul>
        </div>
        <div class="city number col-xs-6 col-sm-3 col-md-3">
            <li>{{$boxe->country}}</li>
            <li>{{$boxe->city}}</li>
        </div>
        <div class="number col-xs-4 col-sm-2 col-md-2">
          <div class="circle" ><span class="text-muted">{{$boxe->battery}}%</span></div>
          <p>Battery</p>
        </div>
        <div class="number col-xs-4 col-sm-2 col-md-2">
          <div class="circle" ><span class="text-muted">{{$pictureoftheday}}</span></div>
          <p>Pictures, today<p>
        </div>
        <div class="number col-xs-4 col-sm-2 col-md-2">
          <div class="circle" ><span class="text-muted">{{$pictureoftheweek}}</span></div>
          <p>Pictures, week</p>
        </div>
        

          
    </div>

</div>

<div class=" container-fluid clearfix ">
    <div class="row">
        @foreach($pictures as $pict)
        <div class="wall_block box ">
            <div class="wall_image_block"> 
                <div class="hover">

                    <div>
                        <a href="/" >
                            <button type="button" class="btn btn-sm">
                            <span class="glyphicon glyphicon-ban-circle"></span>
                            </button>
                        </a>
                        <a href="/" >
                            <button type="button" class="btn btn-sm">
                                <span class="glyphicon glyphicon-comment"></span>
                            </button>
                        </a>
                        <a href="/" >
                            <button type="button" class="btn btn-sm">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                            </button>
                        </a>
                    </div>

                </div>
                <a href="/test" > 
                    {{ HTML::image('uploads/'.$pict->Picture_url, $pict->name) }}
                </a>
                <div class="img_info">
                    <a href="/" ><p class="name">{{$pict->name}}</p></a>
                    <p class="date border">
                        {{date('d-m-Y', $pict->date)}} | {{date('h:m:s', $pict->date)}}
                    </p>
                    <!-- If like or comment -->
                    <p class="add_wall border">
                        
                        <span class="glyphicon glyphicon-plus-sign"></span><!-- Icone -->
                        <!-- If NOT on the wall -->
                        @if($pict->wall == 0)
                            <a href="/">
                                <span class="walladd">Add to my wall</span>
                            </a>
                        @else
                            <a href="/">
                                <span class="walladd">Remove from my wall</span>
                            </a>
                        @endif
                        
                    </p>
                    <p class="add_comment border">
                        <span class="glyphicon glyphicon-comment"></span><!-- Icone -->
                        <!-- If NO description / legend -->
                        @if($pict->legend=0)
                        <a href="/">
                            <span class="comment">Add description</span>
                        </a>
                        @else
                        <a href="/">
                            <span class="comment">Modify description</span>
                        </a>
                        @endif
                    </p>
                    <p class="delete ">
                        <span class="glyphicon glyphicon-ban-circle"></span><!-- Icone -->
                        <a href="/">
                            <span class="comment">Delete</span>
                        </a>
                    </p>
                </div>     
            </div>    
        </div>
        @endforeach 
       
    </div>
</div>
@stop <!-- /content-->