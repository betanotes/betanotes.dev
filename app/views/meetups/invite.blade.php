@extends('layouts.master')

@section('content')

<div class="container containermargins">
    <div class="row">
        <div class="col-md-2 col-xs-12 text-center">
            <img src="/img/meet.gif" class="img-responsive img-inline img-margintop meetshowimg" alt="Responsive image">
            <a class="btn btn-back" href="{{{action('MeetupsController@showmeetup', array($meetup->id))}}}">Back to Your Groups</a>
        </div>
        
        <div class="col-md-8 col-xs-12 text-center">
            
            <h3>Enter an email address to invite someone to join this Social Study!</h3>
            {{Form::open(array('method' => "POST", 'action' => array('MeetupsController@inviteguest', $meetup->id)))}}
                <div class="form-group">
                    <label class="control-label" for "email"></label>
                    <input type="text" class="form-control" name="email">
                </div>
                <button class="btn btn-edit signmarginbottom">Invite!</button>
            {{Form::close()}}
        </div>
    </div>
</div>

@stop