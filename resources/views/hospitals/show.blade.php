@extends('layouts.app')
@section('content')
    <div>
        <ul>
            <li>病院の名前：{{ $hospital->name}}</li>
            <li>病院のid：{{ $hospital->id}}</li>
            <li>電話番号：{{ $hospital->tel}}</li>
            <li>都道府県：{{ $hospital->prefecture['prefecture']}}</li>
            <li>住所：{{ $hospital->address}}</li>
            <li>診察できるペットの種類：{{ $hospital->animal_id}}</li>
        </ul>
    </div>
    @if(Auth::check())
        <div>
            {!! link_to_route('reviews.create','口コミを投稿する',['id'=>$hospital->id])!!}
        </div>
        <div>
            @if(Auth::user()->admin_flag)
            {!! Form::open(['route' => ['hospitals.destroy', $hospital->id], 'method' => 'delete']) !!}
                {!! Form::submit('病院を削除する', ['class' => 'btn btn-danger btn-xs']) !!}
            {!! Form::close() !!}
            @else
            @endif
        </div>
    @endif
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
            @endif
        </div>
    </div>
@endsection