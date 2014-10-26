@extends('layouts/template')


@section('content')     <!-- content-->

<!-- Users Block Wall -->
<ol class="breadcrumb">
    <li><a href="{{URL::to('/')}}">Home</a></li>
    <li><a href="{{URL::to('/adminwall')}}">{{$picture->name }}</a></li>
</ol>

<!-- if message -->
@if(Session::has('ok'))
          <div class="alert alert-success">{{ Session::get('ok') }}</div>
@endif
@if(Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif

<div class="wall_show container-fluid clearfix ">    
    <div class="row">
        <div class="picture_block col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="wall box container-fluid clearfix">
                <div class="row">      
         
                    

                    <div class="user_name col-xs-7 col-sm-7 col-md-7">
                        <div>
                            <p>
                                {{ $picture->name }}
                            </p>
                        </div>
                    </div>
                    <div class="number col-xs-3 col-sm-3 col-md-3">
                        <div>
                            <a href="#">
                                <span id="like_num" class="badge pull-right">{{$picture->like}}</span>
                                Likes
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div>
                            <a href="#">
                                <!--if already a like-->
                                @if($thereisalike != 1)
                                    <button id="like" class="like btn btn-danger topbar_logout">I like</button>
                                @else
                                    <button id="like" class="like btn btn-danger topbar_logout">I don't like</button>
                                @endif
                            </a>
                        </div>
                    </div>
                   
                </div>
            </div>
            
            <div>
                <div class="picture">
                    <a href="#" class="thumbnail">
                        {{ HTML::image('uploads/'.$picture->Picture_url, $picture->name) }}
                    </a>
                </div>
            </div>
        </div>
        
        <div class="others_picture_block col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="wall_show_box box container-fluid clearfix">
                <a href="{{URL::to('/wall')}}/{{$user->id}}/1">
                    <div class="row">      
                        <div class="user_image_wall col-xs-6 col-sm-6 col-md-3">
                            @if($user->image)
                                {{ HTML::image('uploads/'.$user->image, '$user->username') }}
                            @else
                                {{ HTML::image('img/user_default.png', 'user_default') }}
                            @endif
                        </div>
                        <div class="user_name col-xs-6 col-sm-6 col-md-9">
                           Others pictures of {{$user->username}} :
                        </div>  
                    </div>
                </a>
            </div>
            
            <div class="row">
               @foreach($pictures as $pict)
                <div class="picture_box col-xs-6 col-md-6">
                  <a href="{{URL::to('/bird')}}/{{$pict->id}}" class="thumbnail">
                    {{ HTML::image('uploads/'.$pict->Picture_url, $pict->name) }}
                  </a>
                </div>
               @endforeach
            </div>
        </div>
        
        <div class="row">
            
            <div class="comment_block col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div id ="comment_display" class="wall_show_box box container-fluid clearfix">
                   <!--legend-->
                    <div class="legend media">
                        <a class="user_image pull-left" href="{{URL::to('/wall')}}/{{$user->id}}/1">
                            @if($user->image)
                                {{ HTML::image('uploads/'.$user->image, '$user->username') }}
                            @else
                                {{ HTML::image('img/user_default.png', 'user_default') }}
                            @endif
                        </a>
                        <div class="media-body">
                            <a href="{{URL::to('/wall')}}/{{$user->id}}/1">
                                <h4 class="media-heading">{{$user->username}}</h4>
                            </a>
                          <p>{{$picture->legend}}</p>
                        </div>
                    </div>
                    <!--foreach comment-->
                    @foreach($comments as $comment)
                    <div class="comment media">
                        <a class="user_image pull-left" href="{{URL::to('/wall')}}/{{$comment->user_id}}/1">
                            @if($comment->image)
                                {{ HTML::image('uploads/'.$comment->image, '$comment->user_name') }}
                            @else
                                {{ HTML::image('img/user_default.png', 'user_default') }}
                            @endif
                        </a>
                        <div class="media-body">
                          <a href="{{URL::to('/wall')}}/{{$comment->user_id}}/1">
                              <h4 class="media-heading">{{$comment->user_name}}</h4>
                          </a>
                          <p>{{$comment->comment}}</p>
                        </div>
                    </div>
                    @endforeach
                    
                 <!-- Button trigger modal -->
                 <h3 class="border-bottom">Add a comment</h3>
                 <button class="comment_submit btn btn-primary" data-toggle="modal" data-target="#myModal">Add a new comment</button>
                 <br/><br/>
                 <small class="text-danger">{{ $errors->first('comment') }}</small>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="myModalLabel">Add a new comment</h3>
                      </div>
                        
                        <!--Add comment windows--> 
                        <div class="modal-body">
                            {{ Form::open(array('url' => 'comment/new/'.$picture->id, 'method' => 'post')) }} 
                                <div class="user container-fluid clearfix">

                                        <div class="form-horizontal" role="form"> 
                                            <div class="form-group ">
                                              <div class="col-sm-9 {{ $errors->has('comment') ? 'has-error has-feedback' : '' }}">
                                                  <small class="text-danger">{{ $errors->first('comment') }}</small>
                                                   {{ Form::textarea('comment', null, array('id' => 'comment_text', 'class' => 'textarea form-control', 'placeholder' => 'Your comment here...')) }}
                                              </div>
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button id='comment_submit' class=" btn btn-primary save">Save</button>
                                </div>
                            {{ Form::close() }}
                        </div>
                      
                  </div>
                </div>
                        
  
            <div class="empty_block col-xs-12 col-sm-12 col-md-8 col-lg-8">
            </div>  
        </div>
        
    </div>
</div>


@stop <!-- /content-->


@section('scripts')

    <script>
        //like function
        $('#like').click(function() {
            
            var textLike = $( "#like" ).text();
               
            if(textLike == 'I like'){   
                $.get( "{{URL::to('/like')}}/{{$picture->id}}", function( data ) {
                    
                    var num = $( "#like_num" ).text();
                    num = parseInt(num);
                    num = num+1;
                    $( "#like_num" ).text(num);
                    $( "#like" ).text("I don't like");

                });
            }
            else{
                $.get( "{{URL::to('/dontlike')}}/{{$picture->id}}", function( data ) {
                    
                    var num = $( "#like_num" ).text();
                    num = parseInt(num);
                    num = num-1;
                    $( "#like_num" ).text(num);
                    $( "#like" ).text("I like");

                });
            }
            
        });

    </script>

@stop <!-- /script-->
