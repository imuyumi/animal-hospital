@extends('layouts.app')
@section('content')
    <div class="col-md-8">
        <h1>{{ $user->name }}さんの投稿した口コミ一覧</h1>
        @if ($user->admin_flag)
            {{link_to_route('hospitals.create','病院を登録する')}}
        @endif

        <div>
            @foreach($reviews as $review)
                 <div class="panel panel-info">
                     <div class="panel-heading">
                        <p class="panel-title">{{ $review->name }}の口コミ<span class="badge">{{ $review->created_at->format('Y/m/d') }}</span></p>
                        <p>診察領域：{{ $review->subject['subject'] }}/ペットの種類：{{ $review->animal['animal'] }}/5段階評価：{{ $review->value }}</p>
                    </div>
                    <div class="panel-body">
                        <p>口コミの内容</p>
                        <p>{{ $review->content }}</p>
                    
                    </div>
                </div>
                @endforeach
        </div>
    </div>
@endsection