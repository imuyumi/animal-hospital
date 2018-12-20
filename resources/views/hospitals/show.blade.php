@extends('layouts.app')
@section('content')
<div class="col-md-8">
    <div class="panel panel-info">
        <div class="panel-heading"
            <h2 class="panel-title">{{ $hospital->name }}</h2>
        </div>
        <div class="panel-body">
            <p>電話番号：{{ $hospital->tel}}</p>
            <p>都道府県：{{ $hospital->prefecture['prefecture']}}</p>
            <p>住所：{{ $hospital->address}}</p>
            <p>診察できる動物の種類：
                @foreach($hospital->animal_ids as $id)
                    {{ $id->animal . '/'}}
                @endforeach
        </div>
    </div>
    @if(Auth::check())
        <div>
            {!! link_to_route('reviews.create','口コミを投稿する',['id'=>$hospital->id],['class' => 'btn btn-primary'])!!}
        </div>
        <div>
            @if(Auth::user()->admin_flag)
                {!! Form::open(['route' => ['hospitals.destroy', $hospital->id], 'method' => 'delete']) !!}
                    {!! Form::submit('病院を削除する', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                {!! link_to_route('hospitals.edit','病院の情報を編集する',['id'=>$hospital->id],['class' => 'btn btn-info'])!!}
            @else
            @endif
        </div>
    @endif
     {!!link_to_route('hospitals.index','病院一覧へ戻る',null,['class' => 'btn btn-link'])!!}
    <div>
        <h1>{{ $hospital->name }}の口コミ一覧</h1>
           
        <div>
            @if($reviews)
                @foreach($reviews as $review)
                    <p>口コミのタイトル：{{ $review->title }}</p>
                    <p>口コミの内容：{{ $review->content }}</p>
                    <p>診察領域：{{ $review->subject['subject'] }}</p>
                    <p>ペットの種類：{{ $review->animal['animal'] }}</p>
                    <p>5段階評価：{{ $review->value }}</p>
                @endforeach
            @else
                
            @endif
        </div>
    </div>
</div>
@endsection