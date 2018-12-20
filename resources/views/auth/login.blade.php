@extends('layouts.app')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open(['route'=>'login.post']) !!}
        <div class="form-group">
            {!! Form::label('email','メールアドレス') !!}
            {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','パスワード') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
         </div>
        {!! Form::submit('ログイン',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
@endsection