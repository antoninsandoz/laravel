@extends('layouts/template')

@section('content')     <!-- content-->

<!-- Users Block Wall -->
<ol class="breadcrumb">
    <li><a href="{{URL::to('/')}}">Home</a></li>
    <li><a href="{{URL::to('/adminwall')}}">{{$user->username }} - Admin</a></li>
</ol>

<!-- Users Block Wall -->
<h3 class="wall_title"> {{ $user->username }} : Management area of your boxes</h3>

<div class="adminwall  wall box container-fluid clearfix">
    <div class="row">      
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="select_box">
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
        </div>
        <div class="number col-xs-4 col-sm-3 col-md-3">
            <div>
                <a href="#">
                    <span class="badge pull-right">{{$boxe->battery}}%</span>
                    Battery
                </a>
            </div>
        </div>
        <div class="number col-xs-4 col-sm-3 col-md-3">
            <div>
                <a href="#">
                    <span class="badge pull-right">{{$pictureoftheday}}</span>
                    Pictures, today
                </a>
            </div>
        </div>
        <div class="number col-xs-4 col-sm-3 col-md-3">
            <div>
                <a href="#">
                    <span class="badge pull-right">{{$pictureoftheweek}}</span>
                    Pictures, week
                </a>
            </div>
        </div>
    </div>
</div>

<div class=" container-fluid clearfix ">
    <div id="wall" class="row">
        <?php $n = 0 ?>
        @foreach($pictures as $pict)      
        <?php $n++ ?>
        <div id="wall_{{$n}}" class="wall_block col-xs-6 col-sm-4 col-md-3 col-lg-3">
            <div class="wall_block box">
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
                                @if($pict->wall == 0)    
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                @else
                                <span class="glyphicon glyphicon-minus-sign"></span>
                                </button>
                                @endif
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


                            <!-- If NOT on the wall -->
                            @if($pict->wall == 0)
                                <span class="glyphicon glyphicon-plus-sign"></span><!-- Icone -->
                                <a href="/">
                                    <span class="walladd">Add to my wall</span>
                                </a>
                            @else 
                                <span class="glyphicon glyphicon-minus-sign"></span><!-- Icone -->
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
        </div>
        @endforeach 

    </div>
</div>

{{ HTML::script('js/adminwall.js'); }}

@stop <!-- /content-->