@extends('layouts.app')
@section('content')
<div class="col-md-8 col-md-offset-2">
    <h3>動物病院口コミ・検索サイト</h3>
    <h1>anipital</h1>
    <p>全国の動物病院を検索・口コミを投稿できるサイトです</p>
    <div>
        {!! Form::open(['route' => ['search.search'], 'method' => 'post' ]) !!}
        <div class="form-group col-md-4">
            {!! Form::label('animal_id','ペットの種類') !!}
                @foreach($animals as $id=>$animal)
                    <p>{{ $animal }}{!!Form::radio('animal_id', $id, null) !!}</p>
                @endforeach
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('prefecture_id','都道府県') !!}
            {!!Form::select('prefecture_id', $prefectures, null, ['class' => 'form-control', 'id' => 'prefecture_id']) !!}
        </div>
        <div class="col-md-8 col-md-offset-2">
            {!! Form::submit('病院を検索',['class'=>'col-md-4 btn btn-info btn-lg']) !!}
            {!! Form::close() !!} 
            {!!link_to_route('hospitals.index','病院一覧を表示', null,['class' => 'col-md-4 btn btn-success btn-lg'])!!}
        </div>
    </div>

</div>     
@endsection