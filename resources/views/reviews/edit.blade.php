@extends('layouts.app')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        {!! Form::model($review, ['route'=>['reviews.update', $review->id],'method' => 'put'] ) !!}
        <div class="form-group">
            {!! Form::label('title','口コミのタイトル') !!}
            {!! Form::text('title',old('title'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content','口コミの内容') !!}
            {!! Form::textarea('content',old('content'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('animal_id','ペットの種類') !!}
            @foreach($animals as $id=>$animal)
                <div><p>{{ $animal }}{!!Form::radio('animal_id', $id, null) !!}</p></div>
            @endforeach
        </div>
        <div class="form-group">
            {!! Form::label('subject_id','診察領域') !!}
            {!!Form::select('subject_id', $subjects, null,['class'=>'form-control']) !!}</p>
         </div>
         <div class="form-group">
            {!! Form::label('value','5段階評価') !!}
            <p>1{!!Form::radio('value', '1',['class'=>'form-control']) !!}</p>
            <p>2{!!Form::radio('value', '2',['class'=>'form-control']) !!}</p>
            <p>3{!!Form::radio('value', '3',['class'=>'form-control']) !!}</p>
            <p>4{!!Form::radio('value', '4',['class'=>'form-control']) !!}</p>
            <p>5{!!Form::radio('value', '5',['class'=>'form-control']) !!}</p>
            
         </div>
         {{Form::hidden('hospital_id', $review->hospital_id)}}

        {!! Form::submit('口コミを更新',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
@endsection