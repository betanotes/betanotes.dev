{{-- Upper Navbar --}}
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12 text-center uppernavbar">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <a href="{{{action('HomeController@showWelcome')}}}">
                        <img src="/img/minilogo.gif" class="img-responsive img-inline" alt="Responsive image">
                        {{-- Social Notes<br>Life is a test. Ace it! --}}
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <form class="form-horizontal">
                        <div class="col-xs-8 inputmargin">
                            <input type="text" class="form-control" name="search">
                        </div>
                        <button class="btn btn-standard">Search</button>
                    </form>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <a class="navbarwords" href="">Public Feed</a>
                    @if(Auth::check())
                        <a class="navbarwords" href="{{{action('HomeController@dashboard')}}}">{{{Auth::user()->firstname}}} {{{Auth::user()->lastname}}} is logged in!</a>
                    @else
                        <a class="navbarwords" href="{{{action('UsersController@showsignup')}}}">Sign Up</a>
                    @endif
                    @if(Auth::check())
                        <a class="navbarwords" href="{{{action('UsersController@logout')}}}">Log Out</a>
                    @else
                        <a class="navbarwords" href="{{{action('UsersController@showlogin')}}}">Log In</a>
                    @endif
                </div>
            </div> <!-- end row -->
        </div> <!-- end col-md-14-->

    </div> <!-- end row -->
</div> <!-- end container-fluid -->

{{-- Lower Navbar --}}
@if(Auth::check())
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 text-center dashboardnavbar">
                <a href="{{{action('HomeController@dashboard')}}}"><div class="col-md-3"<?php if(Request::url() == "http://betanotes.dev/dashboard") {?>style="background-color: #f68735"<?php }?>>
                    Dashboard
                </div></a>
                <a href="{{{action('NotesController@index')}}}"><div class="col-md-3"<?php if(Request::url() == "http://betanotes.dev/notes") {?>style="background-color: #f68735"<?php }?>>
                    Notes
                </div></a>
                <a href="{{{action('SheetsController@index')}}}"><div class="col-md-3"<?php if(Request::url() == "http://betanotes.dev/sheets") {?>style="background-color: #f68735"<?php }?>>
                    Study Sheets
                </div></a>
                <a href="{{{action('MeetupsController@index')}}}"><div class="col-md-3"<?php if(Request::url() == "http://betanotes.dev/socialstudy") {?>style="background-color: #f68735"<?php }?>>
                    Social Study-s
                </div></a>
            </div>

        </div>
    </div>
@endif