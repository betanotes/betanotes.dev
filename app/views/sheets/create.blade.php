@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-2 text-center">
                <a  class="btn btn-back" role="button" href="{{{ action('SheetsController@index') }}}">Back</a>
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
                                    <input type="radio" name="public_or_private" id="public_or_private1" value="public" <?php if (!empty(Input::old()['public_or_private']) && (Input::old()['public_or_private']) == 'private'): ?> checked <?php endif ?> > Public
                                </label>
                                <label class="radiomargin">
                                    <input type="radio" name="public_or_private" id="public_or_private2" value="private" <?php if (!empty(Input::old()['public_or_private']) && (Input::old()['public_or_private']) == 'private'): ?> checked <?php endif ?> > Private
                                </label>
                            </div> <!-- end form-group -->
                        </div> <!-- end col-xs-6 -->
                    </div> <!-- end row -->
                    <div class="row lines">
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{ $errors->first('clue', '<span class="help-block">:message</span>') }}    

                                {{ Form::label('clue', 'Clue1') }}
                                {{ Form::text('clue', null, ['class' => 'form-control']) }}
                            </div> <!-- end form-group -->
                        </div> <!-- end col-xs-6 -->
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{ $errors->first('response', '<span class="help-block">:message</span>') }}    

                                {{ Form::label('response', 'Response1') }}
                                {{ Form::text('response', null, ['class' => 'form-control']) }}
                            </div> <!-- end form-group -->
                        </div> <!-- end col-xs-6 -->
                        @if (Input::old('cluesArray'))
                            <?php $clueTitle = 'Clue'; ?>
                            <?php $responseTitle = 'Response'; ?>
                            <?php $i = 2; ?>
                            @foreach (Input::old('cluesArray') as $key => $value)
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for='clue'>{{{ $clueTitle . $i }}}</label>
                                        <input class='form-control' name='cluesArray[]' type='text' value="{{{ $value }}}">
                                    </div> <!-- end form-group -->
                                </div> <!-- end col-xs-6 -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for='response'>{{{ $responseTitle . $i }}}</label>
                                        <input class='form-control' name='responsesArray[]' type='text' value="{{{ Input::old('responsesArray')[$key] }}}">
                                    </div> <!-- end form-group -->
                                </div> <!-- end col-xs-6 -->
                                <?php $i = $i + 1; ?>
                            @endforeach
                        @endif
                    </div> <!-- end row -->
                    <button id="makeline" class="btn btn-standard formmargin" type="button">New Row</button>
                    <button class="btn btn-create formmargin" type="submit">Submit</button>
                {{ Form::close() }}
            </div> <!-- end col-md-8 -->

        </div> <!-- end row -->
    </div> <!-- end container -->
@stop