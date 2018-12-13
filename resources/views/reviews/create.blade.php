@extends('layouts.app')
@section('content')
    <div>
        {!! Form::open(['route'=>'reviews.store']) !!}
        <div class="form-group">
            {!! Form::label('title','口コミのタイトル') !!}
            {!! Form::text('title',old('title'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content','口コミの内容') !!}
            {!! Form::textarea('content',old('content'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('animal_types','ペットの種類') !!}
            @foreach($animal_types as $code=>$type)
                <div><p>{{ $type }}{!!Form::checkbox('animal_types', $code, null) !!}</p></div>
            @endforeach
        </div>
        <div class="form-group">
            {!! Form::label('hospital_subject','診察領域') !!}
            {!!Form::select('hospital_subject', $hospital_subjects, null,['class'=>'form-control']) !!}</p></div>
         </div>
         <div class="form-group">
            {!! Form::label('value','5段階評価') !!}
            <p>1{!!Form::radio('value', '1',['class'=>'form-control']) !!}</p>
            <p>2{!!Form::radio('value', '2',['class'=>'form-control']) !!}</p>
            <p>3{!!Form::radio('value', '3',['class'=>'form-control']) !!}</p>
            <p>4{!!Form::radio('value', '4',['class'=>'form-control']) !!}</p>
            <p>5{!!Form::radio('value', '5',['class'=>'form-control']) !!}</p>
            
         </div>

        {!! Form::submit('口コミを投稿',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
@endsection