@extends('layouts/template')


@section('content')     <!-- content-->

<!-- Users Block Wall -->
<ol class="breadcrumb">
    <li><a href="{{URL::to('/')}}">Home</a></li>
    <li><a href="{{URL::to('/adminwall')}}">{{$user->username }} - birds</a></li>
</ol>

<!-- Users Block Wall -->
<h3 class="wall_title">Discover all BirdsWink of {{ $user->username }} !</h3>
<div class="wall box container-fluid clearfix">
    <div class="row">      
        <div class="col-xs-6 col-sm-1 col-md-1">
            <div class="user_image">
                @if($user->image)
                <img src='{{URL::to('/uploads/')}}/{{$user->image}}' />
                @else
                <img src='{{URL::to('/img/')}}/user_default.png' />
                @endif
            </div>
        </div>
        <div class="name col-xs-6 col-sm-2 col-md-2">
            <h4>{{$user->username}}</h4>
            <span>{{ $user->country }}</span>
        </div>  

        <div class="number col-xs-4 col-sm-3 col-md-3">
            <div>
                <a href="#">
                    <span class="badge pull-right">{{$user_likes}}</span>
                    Likes
                </a>
            </div>
        </div>
        <div class="number col-xs-4 col-sm-3 col-md-3">
            <div>
                <a href="#">
                    <span class="badge pull-right">{{$user_comments}}</span>
                    Comments
                </a>
            </div>
        </div>
        <div class="number col-xs-4 col-sm-3 col-md-3">
            <div>
                <a href="#">
                    <span class="badge pull-right">{{$user_pictures}}</span>
                    Pictures
                </a>
            </div>
        </div>
    </div>
</div>
     
<div class=" container-fluid clearfix ">    
    <div id="wall" class="row">
    @if($allpictures != false)
        <?php $n = 0 ?>
        @foreach($allpictures as $pict)
        @if($pict->wall == 1)
        <?php $n++ ?>
            <div id="wall_{{$n}}" class="wall_block col-xs-6 col-sm-4 col-md-3 col-lg-3     
            <?php   if($n % 5 == 0){echo 'fifth_image ';}
                    if($n % 4 == 0){echo 'fourth_image ';} 
                    if($n % 3 == 0){echo 'third_image ';} 
                    if($n % 2 == 0){echo 'second_image ';} ?> ">
              <div id="wall_size{{$n}}" class="thumbnail">
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
                            @if($pict->comment>0)
                            <a href="/">
                                <span class="glyphicon glyphicon-comment"></span><!-- Icone -->
                                <span class="comment">{{$pict->comment}}</span>
                            </a>
                            @endif
                            @if($pict->like>0)
                            <a href="/" >
                                <span class="glyphicon glyphicon-heart"></span><!-- Icone -->
                                <span class="like">{{$pict->like}}</span>
                            </a>
                            @endif
                        </p>
                        @endif
                        @if($pict->legend)
                        <!-- If user legend -->
                        <p class="legend">{{$pict->legend}}</p>
                        @endif
                    </div>     
                </div>    
              </div>
            </div>

            @endif
            @endforeach
        @else
        <br/>
        <div class="alert alert-danger" role="alert">
            <p> No pictures found !</p>
        </div>
        @endif
    </div>
</div> 

<div class="wall_pagination">
    <ul class="pagination pagination-lg">
      <li @if($pagination==1) class="disabled" @endif><a href="{{URL::to('/wall/'.$user->id.'/'.($pagination-1))}}">&laquo;</a></li>
      @for ($i = 0; $i < $nbofpage; $i++)
        <li @if($pagination==$i+1) class="active" @endif><a href="{{URL::to('/wall/'.$user->id.'/'.($i+1))}}">{{$i+1}} </a></li>
      @endfor
      <li @if($pagination==$nbofpage) class="disabled" @endif><a href="{{URL::to('/wall/'.$user->id.'/'.($pagination+1))}}">&raquo</a></li>
    </ul>
</div>        
    {{ HTML::script('js/wall.js'); }}

@stop <!-- /content-->