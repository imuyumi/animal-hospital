@extends('layouts.app')
@section('content')
    <div>
        <ul>
            <li>病院の名前：{{ $hospital->name}}</li>
            <li>電話番号：{{ $hospital->tel}}</li>
            <li>都道府県：{{ $hospital->prefecture_code}}</li>
            <li>住所：{{ $hospital->address}}</li>
            <li>診察できるペットの種類：{{ $hospital->animal_types}}</li>
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
@endsection