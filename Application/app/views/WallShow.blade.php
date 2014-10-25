@extends('layouts/template')


@section('content')     <!-- content-->

<!-- Users Block Wall -->
<ol class="breadcrumb">
    <li><a href="{{URL::to('/')}}">Home</a></li>
    <li><a href="{{URL::to('/adminwall')}}">{{$picture->name }}</a></li>
</ol>

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
                        <a class="user_image pull-left" href="{{URL::to('/wall')}}/{{$user->id}}">
                            @if($user->image)
                                {{ HTML::image('uploads/'.$user->image, '$user->username') }}
                            @else
                                {{ HTML::image('img/user_default.png', 'user_default') }}
                            @endif
                        </a>
                        <div class="media-body">
                          <h4 class="media-heading">{{$user->username}}</h4>
                          <p>{{$picture->legend}}</p>
                        </div>
                    </div>
                    <!--foreach comment-->
                    <div class="comment media">
                        <a class="user_image pull-left" href="#">
                          <img class="media-object" src="{{URL::to('/img/')}}/user_default.png" alt="...">
                        </a>
                        <div class="media-body">
                          <h4 class="media-heading">Media heading</h4>
                          <p>comment comment comment comment comment comment comment comment comment comment comment comment </p>
                        </div>
                    </div>
                    <!--Add comment-->
                    
                    <div class="comment media">
                        <br/>
                        <div class="user container-fluid clearfix">
                            
                                <h3 class="border-bottom">Add a comment</h3>
                                <div class="form-horizontal" role="form"> 
                                    <div class="form-group ">
                                      <div class="col-sm-9 {{ $errors->has('comment') ? 'has-error has-feedback' : '' }}">
                                          <small class="text-danger">{{ $errors->first('comment') }}</small>
                                           {{ Form::textarea('comment', null, array('id' => 'comment_text', 'class' => 'textarea form-control', 'placeholder' => 'Your comment here...')) }}
                                      </div>
                                    </div>
                                </div>
                                <button id='comment_submit' class="comment_submit btn btn-primary save">Save</button>
                            
                            
                                
                              
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
                $.get( "../like/1", function( data ) {
                    
                    var num = $( "#like_num" ).text();
                    num = parseInt(num);
                    num = num+1;
                    $( "#like_num" ).text(num);
                    $( "#like" ).text("I don't like");

                });
            }
            else{
                $.get( "../dontlike/1", function( data ) {
                    
                    var num = $( "#like_num" ).text();
                    num = parseInt(num);
                    num = num-1;
                    $( "#like_num" ).text(num);
                    $( "#like" ).text("I like");

                });
            }
            
        });
            
        //comment function
        $('#comment_submit').click(function() {          
            alert('salut');
            
            $.post('comment/new/{{$picture->id}}', 'test=true' ,callback, 'text');
            
            function callback(test){
                console.log('Success!'+test);
            }
            
            

        });

        
    </script>

@stop <!-- /script-->
