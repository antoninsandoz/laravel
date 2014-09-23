<html> 
    <head>
        <!-- If you cannot adjust the HTTP headers in your server config. -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="en-GB" />
        <!-- HTML 5 version -->
        <meta charset="utf-8" />

        <title>Patrick Janser - Curriculum vitae / Résumé</title>

        <meta name="description" content="Patrick Janser's curriculum vitae" />
        <meta name="author" content="Patrick Janser" />
        <meta name="copyright" content="© Patrick Janser" />
        <meta name="keywords" content="Patrick Janser, CV, curriculum, vitae, resume" />

        <meta name="og:type" content="website" />
        <meta name="og:title" content="Patrick Janser's curriculum vitae" />
        <meta name="og:url" content="http://patrickjanser.ch/cv/" />
        <meta name="og:image" content="http://patrickjanser.ch/cv/images/patrick-janser.jpg?v1" />

        <!-- Dublin Core meta tags are not so important as before -->
        <meta name="DC.Title" lang="en" content="Patrick Janser's curriculum vitae" />
        <meta name="DC.Date.created" scheme="DCTERMS.W3CDTF" content="2013-06-10" />
        <meta name="DC.Date.modified" scheme="DCTERMS.W3CDTF" content="2013-06-12" />
        <!-- Not very useful, but just as an example -->
        <meta name="revisit-after" content="14 days" />

        <!-- Favicon and Apple touch icon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
        
        <!-- Stylesheets -->
        {{ HTML::style('css/bootstrap.min.css'); }}
        {{ HTML::style('css/bootstrap-theme.min.css'); }}
        {{ HTML::style('css/all.css'); }}

        
    </head>
    
    <nav class="navbar navbar-default" role="navigation">
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

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
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
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Link</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    
    <body>
       
        <div class="container ">
            @yield('content')
        </div>

    </body>
    
    <!-- JavaScript sources -->
    {{ HTML::script('js/jquery-2.1.1.min.js'); }}
    {{ HTML::script('js/bootstrap.min.js'); }}
    
</html>