@extends('layouts.app')
@section('content')
    <div>
        {!! Form::open(['route'=>'hospitals.store']) !!}
        <div class="form-group">
            {!! Form::label('name','病院名') !!}
            {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('prefecture_id','都道府県') !!}
            {!!Form::select('prefecture_id', $prefectures, null, ['class' => 'form-control', 'id' => 'prefecture_id']) !!}
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
            {!! Form::label('animal_id','診察可能なペットの種類') !!}
            @foreach($animals as $id=>$animal)
                <div><p>{{ $animal }}{!!Form::checkbox('animal_id', $id, null) !!}</p></div>
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