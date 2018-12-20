@extends('layouts.app')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open(['route'=>'signup.post']) !!}
        <div class="form-group">
            {!! Form::label('name','お名前') !!}
            {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','メールアドレス') !!}
            {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','パスワード') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>
           <div class="form-group">
            {!! Form::label('password_confirmation','確認用パスワード') !!}
            {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
        </div>
        {!! Form::submit('会員登録',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
@endsection