@extends('shared.master')

@section('title')
Add New Info
@endsection

@section('content')
<h1>New info Form</h1>
@if($error == 'matched')
    <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        The EmailID or Phone number allready exist.
    </div>   
@elseif($error == 'Added')
    <div class="alert alert-success" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Success:</span>
        The new info is added.
    </div>
@endif

{!! Form::open(array('url' => 'addinfo', 'class' => 'form', 'method' => 'POST')) !!}
    <div class="form-group">
        {!! Form::label('name','Name', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
                {!! Form::text('name', null, array('required', 
                                                   'class'=>'form-control', 
                                                   'placeholder'=>'Enter Your Name')) !!}
            </div>
    </div>

    <div class="form-group">
        {!! Form::label('gender', 'Gender', array('class' => 'col-sm-2 control-label')) !!}
        {!! Form::radio('gender', 'male', true) !!} male 
        {!! Form::radio('gender', 'female') !!} female  
    </div>
    <div class="form-group">
        {!! Form::label('phonenum', 'Phone number', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            @if($error == 'matched')
                {!! Form::number('phonenum', null, array('required', 
                                                         'class' => 'form-control error', 
                                                         'placeholder' => 'Enter Your Phone Number')) !!}
            @else
                {!! Form::number('phonenum', null, array('required', 
                                                          'class' => 'form-control', 
                                                          'placeholder' => 'Enter Your Phone Number')) !!}
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', 'E-mail Address', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            @if($error == 'matched')
                {!! Form::email('email', null, array('required', 
                                                     'class' => 'form-control error', 
                                                     'placeholder' => 'Enter Your Email Address')) !!}
            @else
                {!! Form::email('email', null, array('required', 
                                                     'class' => 'form-control', 
                                                     'placeholder' => 'Enter Your Email Address')) !!}
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('address', 'Address', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('address', null, array('required', 
                                                  'class' => 'form-control', 
                                                  'placeholder' => 'Enter Your Address')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('nationality', 'Nationality', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('nationality', null,  array('required',
                                                       'id' => 'nationality',
                                                       'class' => 'form-control', 
                                                       'placeholder'=>'Enter Your Nationality ')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('dob', 'Date of Birth', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::date('dob', null,  array('required',
                                               'id' => 'dob',
                                               'class' => 'form-control',
                                               'onchange' => 'chk_dob()' )) !!}
        <span id="confirmMessage" class="confirmMessage"></span>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('education', 'Education', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-8">
            {!! Form::text('education', null,  array('required',
                                                     'id' => 'education',
                                                     'class' => 'form-control',
                                                     'placeholder'=>'Enter Your Last Education')) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::number('percentage', null, array('id' =>'percentage',
                                                       'class'=>'form-control',
                                                       'placeholder'=>'Percentage', 
                                                       'min' => '0', 
                                                       'max' => '100', 
                                                       'onkeyup' => 'chk_percentage()')) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('modeofcont', 'Mode Of Contact', array('class' => ' col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::radio('modeofcont', 'phone') !!} Phone
            {!! Form::radio('modeofcont', 'email', true) !!} Email
        </div>
    </div>

    <div class="form-group">
        <div class = 'col-sm-offset-2 col-sm-10'>
            {!! Form::submit('Add Info',  array('id' => 'submit',
                                                'class' => 'btn btn-primary',
                                                'disabled' => true)) !!}
        </div>
    </div>
{!! Form::close() !!} 
@endsection
