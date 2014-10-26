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
                <span class="badge pull-right">{{$user_likes}}</span>
                Likes
            </div>
        </div>
        <div class="number col-xs-4 col-sm-3 col-md-3">
            <div>
                <span class="badge pull-right">{{$user_comments}}</span>
                Comments
            </div>
        </div>
        <div class="number col-xs-4 col-sm-3 col-md-3">
            <div>
                <span class="badge pull-right">{{$user_pictures}}</span>
                Pictures
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
            <div id="wall_{{$n}}" class="wall_block col-xs-6 col-sm-4 col-md-3 col-lg-3">
              <div id="wall_size{{$n}}" class="thumbnail">
                <div class="wall_image_block">
                  
                  @if($auth)
                        @if(in_array('like_id'.$pict->id, $like_tab) && $like_tab[0]!=false)
                            <button onclick="likeFunction({{$pict->id}})" class="select_like like btn"id="like_{{$pict->id}}" type="button" >
                        @else
                            <button onclick="likeFunction({{$pict->id}})" class="like btn"id="like_{{$pict->id}}" type="button" >
                        @endif
                   @else
                        <button onclick="redirectFunction()" class="like btn" type="button" >
                   @endif   
                            <span class="glyphicon glyphicon glyphicon-heart"></span>
                        </button>
                    <a href="{{URL::to('/bird')}}/{{$pict->id}}" >
                        {{ HTML::image('uploads/'.$pict->Picture_url, $pict->name) }}
                    </a>
                    <div class="clearfix  img_info">
                        <a href="{{URL::to('/bird')}}/{{$pict->id}}" >
                            <p class="name">{{$pict->name}}</p>
                        </a>
                        <p class="date border">
                            {{date('d-m-Y', $pict->date)}} | {{date('h:m:s', $pict->date)}}
                        </p>
                        @if($pict->comment>0 OR $pict->like>0)
                        <p class="like_comment border">
                            @if($pict->comment>0)
                                <span class="glyphicon glyphicon-comment"></span><!-- Icone -->
                                <span class="comment">{{$pict->comment}}</span>
                            @endif
                            @if($pict->like>0)
                                <span class="glyphicon glyphicon-heart"></span><!-- Icone -->
                                <span class="like">{{$pict->like}}</span>
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



@section('scripts')

    <script>
        //like function
        function likeFunction(pict_id){
            
            if($('#like_'+pict_id).hasClass('select_like')){
                
                $( '#like_'+pict_id ).addClass("load_like");

                $.get( '{{URL::to('/dontlike')}}/'+pict_id, function( data ) {

                    $( '#like_'+pict_id ).removeClass("select_like");
                    $( '#like_'+pict_id ).removeClass("load_like");

                });
            }
            else{

                $.get( '{{URL::to('/like')}}/'+pict_id, function( data ) {

                    $('#like_'+pict_id).addClass("select_like");

                });
            }

        };
        
        function redirectFunction(){
            alert('Please login for add likes');
            window.location.href = "{{URL::to('/login')}}";
        }

    </script>

@stop <!-- /script-->