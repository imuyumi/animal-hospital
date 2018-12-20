@extends('layouts.app')
@section('content')
    <h1>動物病院口コミ・検索サイト</h1>
    <div>
        {!! Form::open(['route' => ['search.search'], 'method' => 'post' ]) !!}
        <div class="form-group col-md-6">
            {!! Form::label('animal_id','ペットの種類') !!}
                @foreach($animals as $id=>$animal)
                    <p>{{ $animal }}{!!Form::radio('animal_id', $id, null) !!}</p>
                @endforeach
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('prefecture_id','都道府県') !!}
            {!!Form::select('prefecture_id', $prefectures, null, ['class' => 'form-control', 'id' => 'prefecture_id']) !!}
        </div>
            {!! Form::submit('病院を検索',['class'=>'btn btn-info']) !!}
            {!! Form::close() !!} 
            {!!link_to_route('hospitals.index','病院一覧を表示', null,['class' => 'btn btn-success'])!!}
    </div>

     
@endsection