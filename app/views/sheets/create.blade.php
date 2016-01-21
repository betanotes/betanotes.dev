@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-2 text-center">
                <a href="{{{ action('SheetsController@index') }}}">Back to Sheets Index</a>
            </div> <!-- end col-md-2 -->

            <div class="col-md-8">
                
                <h2 class="text-center">Create a New Sheet</h2>
                {{ Form::open(array('action' => 'SheetsController@store')) }}
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                {{ $errors->first('title', '<span class="help-block">:message</span>') }}    

                                {{ Form::label('title', 'Title') }}
                                {{ Form::text('title', null, ['class' => 'form-control']) }}
                            </div>  <!-- end form-group -->
                        </div> <!-- end col-xs-12 -->
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{ $errors->first('public_or_private', '<span class="help-block">:message</span>') }}    

                                <label>Privacy Setting (Choose One): </label>
                                <label class="radiomargin">
                                    <input type="radio" name="public_or_private" id="public_or_private1" value="public"> Public
                                </label>
                                <label class="radiomargin">
                                    <input type="radio" name="public_or_private" id="public_or_private2" value="private"> Private
                                </label>
                            </div> <!-- end form-group -->
                        </div> <!-- end col-xs-6 -->
                    </div> <!-- end row -->
                    <div class="row lines">
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{ $errors->first('clue', '<span class="help-block">:message</span>') }}    

                                {{ Form::label('clue', 'Clue') }}
                                {{ Form::text('clue', null, ['class' => 'form-control']) }}
                            </div> <!-- end form-group -->
                        </div> <!-- end col-xs-6 -->
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{ $errors->first('response', '<span class="help-block">:message</span>') }}    

                                {{ Form::label('response', 'Response') }}
                                {{ Form::text('response', null, ['class' => 'form-control']) }}
                            </div> <!-- end form-group -->
                        </div> <!-- end col-xs-6 -->
                    </div> <!-- end row -->
                    <button id="makeline" class="btn btn-default formmargin" type="button">Make New Clue/Response</button>
                    <button class="btn btn-default formmargin" type="submit">Submit Sheet</button>
                {{ Form::close() }}

            </div> <!-- end col-md-8 -->

        </div> <!-- end row -->
    </div> <!-- end container -->
@stop