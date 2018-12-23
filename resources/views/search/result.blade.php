@extends('layouts.app')
@section('content')
<div class="col-md-6 col-md-offset-3">
    @if($result_count > 0)
    <h2>{{ $result_count }}件ヒットしました</h2>       
        @foreach($results as $result)
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h2 class="panel-title">{{ $result->name }}</h2>
                {!! link_to_route('hospitals.show', '詳細を見る', ['id'=> $result->hospital_id ]) !!}
            </div>
            <div class="panel-body">
                <p>住所：{{ $result->prefecture['prefecture']}}{{ $result->address}}</p>
                <p>電話番号：{{ $result->tel}}</p>
                <p>口コミ<span class="badge">{{ $result->get_reviews($result->hospital_id)->count() }}</span></p>
            </div>
        </div>
        @endforeach
    @else
    <div class="col-md-8 col-md-offset-2">
        <p>条件に合う病院は見つかりませんでした</p>
        <p>条件を変更して再検索してみましょう！</p>
        <a class="btn btn-primary" href="/">検索ページへ戻る</a>
    </div>
    @endif
</div>
@endsection