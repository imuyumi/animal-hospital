@extends('layouts.app')
@section('content')
<div class="col-md-8 col-md-offset-2">
    <h3>動物病院口コミ・検索サイト</h3>
    <h1>anipital</h1>
    <p>全国の動物病院を検索・口コミを投稿できるサイトです</p>
    
        {!! Form::open(['route' => ['search.search'], 'method' => 'post' ]) !!}
        <div class="clearfix search">
            <p>ペットの種類×都道府県で検索</p>
            <div class="top-search">
                    @foreach($animals as $id=>$animal)
                        {!!Form::radio('animal_id', $id, null,['id' => 'animal_id'.$id]) !!}
                        {!! Form::label('animal_id'.$id, $animal ) !!}
                    @endforeach
            </div>
            <div class="search-pref">
                {!! Form::label('prefecture_id','都道府県') !!}
                {!!Form::select('prefecture_id', $prefectures, null, ['class' => 'form-control', 'id' => 'prefecture_id']) !!}
            </div>
            {!! Form::submit('病院を検索',['class'=>'btn btn-info']) !!}
        </div>

            {!! Form::close() !!} 
            {!!link_to_route('hospitals.index','病院一覧を表示', null,['class' => 'btn btn-success'])!!}
</div>
@endsection