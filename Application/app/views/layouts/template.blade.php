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

              @yield('topbar')
              
            </div><!-- /.container-fluid -->
        </nav>
        
        <!-- Main content-->
        <div class="main container clearfix">
            @yield('content')
        </div>

        <!-- Footer -->
        <div class="footer clearfix">
            <div class="container">
              
              <ul class="nav navbar-nav">
                   <li><a href="#">Link</a></li>
                   <li><a href="#">Link</a></li>
                   <li><a href="#">Link</a></li>
                   <li><a href="#">Link</a></li>
                   <li><a href="#">Link</a></li>
              </ul>
              <a class="logo_footer navbar-brand" href="#">Brand</a>
            </div>
        </div>   
   
    </body>
    
<!-- JavaScript sources -->
{{ HTML::script('js/jquery-2.1.1.min.js'); }}
{{ HTML::script('js/bootstrap.min.js'); }}
    
</html>
    
    
    
