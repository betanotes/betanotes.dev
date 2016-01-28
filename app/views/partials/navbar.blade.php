{{-- Upper Navbar --}}
<div class="container-fluid">
    <div class="row text-center uppernavbar">

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <a href="{{{action('HomeController@showWelcome')}}}">
                        <img src="/img/logo2.gif" class="img-responsive img-inline" alt="Responsive image">
                        {{-- Social Notes<br>Life is a test. Ace it! --}}
                    </a>
                </div> {{-- end col-md-3 --}}
                <div class="col-md-4 paddingtop  hidden-sm hidden-xs">
                    <form class="form-horizontal" method="GET" action="{{{ action('FeedController@showMain') }}}">
                        <div class="col-xs-8">
                            <input type="text" id="search" class="form-control" name="search">
                        </div>
                        <button class="btn btn-standard" type="submit">Search</button>
                    </form>
                </div> {{-- end col-md-4 --}}
                <div class="col-md-5 paddingtop  hidden-sm hidden-xs">

                    @if(Auth::check())
                        <a class="navbarwords" href="{{{action('HomeController@dashboard')}}}">Welcome, {{{Auth::user()->firstname}}} {{{Auth::user()->lastname}}}!</a>
                        
                    @else
                        <a class="navbarwords" href="{{{action('UsersController@showsignup')}}}">Sign Up</a>
                    @endif
                    <a class="navbarwords" href="{{{action('FeedController@showMain')}}}">Public Feed</a>
                    @if(Auth::check())
                        <a class="navbarwords" href="{{{action('UsersController@logout')}}}">Log Out</a>
                    @else
                        <a class="navbarwords" href="{{{action('UsersController@showlogin')}}}">Log In</a>
                    @endif
                </div> {{-- end col-md-5 --}}

                {{-- Alt Mobile Navbar for mobile views --}}
                <div class="col-sm-12 col-xs-12 hidden-md hidden-lg mobilenavmargin">
                    <form class="form-horizontal">
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="search">
                        </div>
                        <button class="btn btn-standard">Search</button>
                    </form>
                </div> {{-- end col-sm-12 --}}
                <div class="col-sm-12 col-xs-12 hidden-md hidden-lg mobilenavmargin">
                    <a class="navbarwords" href="">Public Feed</a>
                    @if(Auth::check())
                        <a class="navbarwords" href="{{{action('HomeController@dashboard')}}}"> Welcome, {{{Auth::user()->firstname}}}!</a>
                    @else
                        <a class="navbarwords" href="{{{action('UsersController@showsignup')}}}">Sign Up</a>
                    @endif
                    @if(Auth::check())
                        <a class="navbarwords" href="{{{action('UsersController@logout')}}}">Log Out</a>
                    @else
                        <a class="navbarwords" href="{{{action('UsersController@showlogin')}}}">Log In</a>
                    @endif
                </div> {{-- end col-sm-12 --}}
                {{-- End mobile navbar view --}}

    </div> <!-- end row -->
</div> <!-- end container-fluid -->

{{-- Start Lower/Dashboard Navbar --}}
@if(Auth::check())
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 text-center dashboardnavbar">
                <a href="{{{action('HomeController@dashboard')}}}"><div class="col-md-3"<?php if(Request::url() == "http://betanotes.dev/dashboard") {?>style="background-color: #f68735"<?php }?>>
                    Your Dashboard
                </div></a>
                <a href="{{{action('NotesController@index')}}}"><div class="col-md-3"<?php if(Request::url() == "http://betanotes.dev/notes") {?>style="background-color: #f68735"<?php }?>>
                    Your Study Notes
                </div></a>
                <a href="{{{action('SheetsController@index')}}}"><div class="col-md-3"<?php if(Request::url() == "http://betanotes.dev/sheets") {?>style="background-color: #f68735"<?php }?>>
                    Your Study Sheets
                </div></a>
                <a href="{{{action('MeetupsController@index')}}}"><div class="col-md-3"<?php if(Request::url() == "http://betanotes.dev/socialstudy") {?>style="background-color: #f68735"<?php }?>>
                    Your Social Study Groups
                </div></a>
            </div> {{-- end col-md-12 --}}

        </div> {{-- end row --}}
    </div> {{-- end container-fluid --}}
@endif