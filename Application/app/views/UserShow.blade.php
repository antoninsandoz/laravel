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


@section('content')

<!-- Users Block Wall -->

<h3 class="wall_title">{{ $user->username }}</h3>

<div class="user container-fluid clearfix">
    <div class="row">      
       <div class="col-xs-12 col-sm-6 col-md-6">
           <div class="box box-form ">
                <h3 class="border-bottom">Account</h3>
                <form class="form-horizontal" role="form">
                  <div class="form-group border-bottom">
                    <label for="image" class="col-sm-3 control-label">image</label>
                    <div class="col-sm-9 user_image">
                      <img src='../img/user_default.png' />
                    </div>
                    <button type="button" class="btn_image btn btn-default">Change image</button>
                  </div>  
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="inputEmail" value="{{$user->email}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <a class="chage_password" href ="./">
                            <button type="button" class="btn btn-default">Change password</button>
                        </a>
                    </div>
                  </div>

                </form>
          </div> 
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="box box-form-right ">
                <h3 class="border-bottom">Informations</h3>
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label for="inputUsername" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputUsername" value="{{$user->username}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputLanguages" class="col-sm-3 control-label">Languages</label>
                    <div class="col-sm-9">
                      <select class="form-control">
                        <!--foreach + if -->
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputUsername" class="col-sm-3 control-label">Country</label>
                    <div class="col-sm-9">
                        <select class="form-control">
                          <!--foreach + if http://api.geonames.org/countryInfo?username=demo-->
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                    </div>
                  </div>
                 <!--Add groupe for all children foreach + if http://api.geonames.org/children?geonameId=2660717&username=antoninsandoz-->  
                  <div class="form-group">
                    <label for="inputUsername" class="col-sm-3 control-label">City</label>
                    <div class="col-sm-9">
                      <select class="form-control">
                        <!--foreach + if http://api.geonames.org/children?geonameId=2660717&username=antoninsandoz-->  
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputUsername" class="col-sm-3 control-label">Sex</label>
                    <div class="col-sm-9">
                        <div class="checkbox">
                            
                            <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="women" > <!-- if for checked-->
                              Women
                            </label>
                            <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="men" > <!-- if for checked-->
                              Men
                            </label>
                            <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="unspecified"  checked> <!-- if for checked-->
                              Unspecified
                            </label>
                        </div>
                    </div>
                  </div>
                  
                </form>
            </div>   
        </div>
        <div class="box col-xs-12 col-sm-12 col-md-12">
            <div class="user_button">
                <button  class="btn btn-default">Canceled</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
     </div>
</div>


@stop