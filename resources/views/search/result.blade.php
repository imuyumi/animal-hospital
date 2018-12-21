@extends('layouts.app')
@section('content')
    <div>
        @if($result_count > 0)
            <p>{{ $result_count }}件ヒットしました！</p>       
            @foreach($results as $result)
                <ul>
                   <li>{!! link_to_route('hospitals.show', $result->name, ['id'=> $result->hospital_id] )!!}</li>
                </ul>
            @endforeach
        @else
            <p>条件に合う病院は見つかりませんでした</p>
            <p>条件を変更して再検索してみましょう！</p>
            <a class="btn btn-primary" href="/">検索ページへ戻る</a>
        @endif
    </div>
@endsection