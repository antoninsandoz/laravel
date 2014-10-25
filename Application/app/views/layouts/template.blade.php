<html> 
    <head>
        
        <!-- If you cannot adjust the HTTP headers in your server config. -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="en-GB" />
        <!-- HTML 5 version -->
        <meta charset="utf-8" />

        <!-- Favicon and Apple touch icon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />

        <!-- Meta header -->
        <title>titre</title>
        
        <meta name="title" content="meta_title" />
        <meta name="description" content="meta_desctiption" />
        <meta name="keywords" content="meta_keywords" />
        <meta name="author" content="meta_author" />
        <meta name="copyright" content="meta_copyright" />

        <!-- Stylesheets -->
        {{ HTML::style('css/bootstrap.min.css'); }}
        {{ HTML::style('css/bootstrap-theme.min.css'); }}
        {{ HTML::style('css/all.css'); }}
        
        
        
        
    </head>
    
    <body>
        
        <!-- Top Bar Navigation-->
        @include('TopBar')
        
        <!-- Main content-->
        <div class="main container clearfix">
            @yield('content')
        </div>

        <!-- Footer -->
        <div class="footer" role="navigation">
            <div class="container">
                <div class="link">
                    <a href="#">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span>Link</span>
                    </a>
                    <a href="#">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span>Link</span>
                    </a>
                    <a href="#">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span>Link</span>
                    </a>
                    <a href="#">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span>Link</span>
                    </a>
                </div>    
                <a class="logo_footer navbar-brand" href="#">Brand</a>
            </div>
        </div>  
   
    </body>
    
<!-- JavaScript sources -->
{{ HTML::script('js/jquery-2.1.1.min.js'); }}
{{ HTML::script('js/bootstrap.min.js'); }}

<!-- Script Ajax personal -->
@yield('scripts')
    
</html>
    
    
    
