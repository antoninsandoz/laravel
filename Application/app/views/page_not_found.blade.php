@extends('layouts/template')

@section('content')
    <h1 class="page_not_fund"> Page not found !</h1>
    <div class="user container-fluid clearfix">
        <div class="row">
        
            <div class="col-xs-12 col-sm-6 col-md-6">
               <div class="box box-form">
                   <h4>Sorry this page does not exist.</h4>
                    <h4>Please use the menu on the right to continue your naviagation.</h4>
               </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="box box-form-right ">
                    <button type="button" class="btn btn-primary btn-lg btn-block">Menu 1</button>
                    <button type="button" class="btn btn-default btn-lg btn-block">Menu 2</button>
                    <button type="button" class="btn btn-primary btn-lg btn-block">Menu 3</button>
                    <button type="button" class="btn btn-default btn-lg btn-block">Menu 4</button>
                    <button type="button" class="btn btn-primary btn-lg btn-block">Menu 5</button>
                    <button type="button" class="btn btn-default btn-lg btn-block">Menu 6</button>
                </div>
            </div>
        </div>

    </div>
@stop