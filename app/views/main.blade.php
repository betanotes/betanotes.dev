@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row maintop">
            <div class="col-md-5 col-md-offset-1">
                <h1>Take Notes, Be Social.</h1>
                <h3>It's going to be sweet.</h3>
                <a  class="btn btn-edit" role="button" href="{{{ action('UsersController@showsignup') }}}">Sign Up</a>
            </div> <!-- end col-md-5 -->
            <div class="col-md-5">
                <div class="mainnotey">
                    <span class="noteyspan">Hello! I'm 'Notey' the note!</span>
                </div>
            </div> <!-- end col-md-5 -->
        </div> <!-- end row maintop -->

        <div class="row mainmiddle">
            <h1>Your Content, Anywhere!</h1>
            <div class="col-md-4">
                <div class="middle1">
                    <img src="/img/vote.gif" class="img-responsive img-inline" alt="Responsive image">
                    <h3>Vote Up Your Favorites!</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div> <!-- end col-md-4 -->
            <div class="col-md-4">
                <div class="middle2">
                    <img src="/img/share.gif" class="img-responsive img-inline" alt="Responsive image">
                    <h3>Share Your Notes with Friends!</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div> <!-- end col-md-4 -->
            <div class="col-md-4">
                <div class="middle3">
                    <img src="/img/meet.gif" class="img-responsive img-inline" alt="Responsive image">
                    <h3>Form Study Groups!</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div> <!-- end col-md-4 -->
        </div> <!-- end row mainmiddle -->

        <div class="row mainlast">
            <div class="col-md-10 col-md-offset-1">
                <h3>Best of all,</h3>
                <h1>IT'S FREE!</h1>
                <img src="/img/services.gif" class="img-responsive img-inline" alt="Responsive image">
                <p><em>Take Notes, Create Study Sheets, Play Matching Games, Collaborate, Vote, Share, Social Study-s!</em> Social Notes, YAY!</p>
                <span>* All illustrations are original and were made for this project.</span>
            </div> <!-- end col-md-10 -->
        </div> <!-- end row mainlast -->

    </div> <!-- end container-fluid -->

    

@stop