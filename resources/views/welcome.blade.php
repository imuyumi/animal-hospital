@extends('layouts.app')
@section('content')
    <h1>animal-hospital-searching</h1>
    <div>
        {!! Form::open(['method' => 'GET'],['route'=>'hospitals.index']) !!}
        <div class="form-group">
            {!! Form::label('animal_types','ペットの種類') !!}
                @foreach($animal_types as $code=>$type)
                    <p>{{ $type }}{!!Form::checkbox('animal_types', $code, null) !!}</p>
                @endforeach
        </div>
        <div class="form-group">
            {!! Form::label('prefecture_code','都道府県') !!}
            {!!Form::select('prefecture_code', $prefectures, null, ['class' => 'form-control', 'id' => 'prefecture_code']) !!}
        </div>
        {!! Form::submit('病院を検索',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
    {!!link_to_route('hospitals.index','病院一覧')!!}
     
@endsection