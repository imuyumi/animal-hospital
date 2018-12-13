@extends('layouts.app')
@section('content')
    <div>
        {!! Form::open(['route'=>'hospitals.store']) !!}
        <div class="form-group">
            {!! Form::label('name','病院名') !!}
            {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('prefecture_code','都道府県') !!}
            {!!Form::select('prefecture_code', $prefectures, null, ['class' => 'form-control', 'id' => 'prefecture_code']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('address','住所') !!}
            {!! Form::text('address',old('address'),['class'=>'form-control']) !!}
        </div>
         <div class="form-group">
            {!! Form::label('tel','電話番号') !!}
            {!! Form::text('tel',old('tel'),['class'=>'form-control']) !!}
        </div> 
        <div class="form-group">
            {!! Form::label('opening_hour','診察時間') !!}
            {!! Form::text('opening_hour',old('opening_hour'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('animal_types','診察可能なペットの種類') !!}
            @foreach($animal_types as $code=>$type)
                <div><p>{{ $type }}{!!Form::checkbox('animal_types', $code, null) !!}</p></div>
            @endforeach
        </div>
         <div class="form-group">
            {!! Form::label('image_name','画像') !!}
            {!! Form::text('image_name',old('image_name'),['class'=>'form-control']) !!}
        </div>
        
        {!! Form::submit('病院を登録',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
@endsection