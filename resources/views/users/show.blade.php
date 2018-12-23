@extends('layouts.app')
@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h2>{{ $user->name }}さんの投稿した口コミ一覧</h2>
        @if ($user->admin_flag)
            {!! link_to_route('hospitals.create','病院を登録する', ['class' => 'btn btn-danger'])!!}
        @endif

        <div>
            @foreach($reviews as $review)
                 <div class="panel panel-info">
                     <div class="panel-heading">
                        <p class="panel-title">{{ $review->name }}<span class="label label-info">{{ $review->created_at->format('Y/m/d') }}</span></p>
                        <p class="panel-title">{{ $review->title }}</p>
                  </div>
                    <div class="panel-body">
                        <p><span class="glyphicon glyphicon-pencil">口コミの内容</p>
                        <p>{{ $review->content }}</p>
                        <p><span class="glyphicon glyphicon-search">診察領域：{{ $review->subject['subject'] }}</p>
                        <p><span class="glyphicon glyphicon-apple"></span>ペットの種類：{{ $review->animal['animal'] }}</p>
                        <p><span class="glyphicon glyphicon glyphicon-star">5段階評価：{{ $review->value }}点</p>
                      
                       {!! link_to_route('reviews.edit','口コミを編集する', ['id'=> $review->id]) !!}
                        {!! Form::open(['route' => ['reviews.destroy', $review->id] , 'method' => 'delete']) !!}
                            {!! Form::submit('口コミを削除する', ['class' => 'col-md-5 btn btn-danger']) !!}
                        {!! Form::close() !!}
                   </div>
                </div>
                @endforeach
        </div>
    </div>
@endsection